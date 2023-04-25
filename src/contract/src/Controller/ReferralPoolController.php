<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Stacks\ReferralPoolContractManager;
use App\Document\UserReferralPool;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\LockException;
use Doctrine\ODM\MongoDB\Mapping\MappingException;
use Doctrine\ODM\MongoDB\MongoDBException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ReferralPoolController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/contract", name="api_contract_")
 */
class ReferralPoolController extends SymfonyAbstractController
{
    /**
     * @param DocumentManager $documentManager
     * @param ReferralPoolContractManager $referralPoolContractManager
     * @return JsonResponse
     *
     * @throws LockException
     * @throws MappingException
     * @throws MongoDBException
     *
     * @Route("/referral-pool/withdraw", name="referral_pool_withdraw", methods={"GET"})
     */
    public function withdraw(
        DocumentManager $documentManager,
        ReferralPoolContractManager $referralPoolContractManager
    ): JsonResponse {
        /** @var UserReferralPool $userReferralPool */
        $userReferralPool = $documentManager->getRepository(UserReferralPool::class)->findForWithdraw($this->getUser()->getId());

        if (null === $userReferralPool) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $withdrawId = $documentManager->getRepository(UserReferralPool::class)->findNextCountForWithdraw($this->getUser()->getId());

        $signedParameters = [
            'ownerPublicKey' => $this->getUser()?->getPublicKey(),
            'amount' => $userReferralPool->getMyReward(),
            'withdrawId' => $withdrawId,
        ];
        $signature = $referralPoolContractManager->signWithdraw($signedParameters);

        $userReferralPool->setWithdrawId($withdrawId);
        $documentManager->flush();

        return new JsonResponse(
            array_merge(
                [
                    'signature' => $signature,
                ],
                $signedParameters
            )
        );
    }

    /**
     * @param string $id
     * @param DocumentManager $documentManager
     * @return JsonResponse
     *
     * @throws LockException
     * @throws MappingException
     * @throws MongoDBException
     *
     * @Route("/referral-pool/withdraw/received/{id}", name="reward_pool_withdraw_status_received", methods={"PUT"})
     */
    public function withdrawReceived(
        string $id,
        DocumentManager $documentManager
    ): JsonResponse {
        /** @var UserReferralPool $userReferralPool */
        $userReferralPool = $documentManager->getRepository(UserReferralPool::class)->find($id);

        if (null === $userReferralPool) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        if ($userReferralPool->getUserId() !== $this->getUser()->getId()) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }

        $userReferralPool->setReceived(true);
        $documentManager->flush();

        return new JsonResponse(['status' => 'done']);
    }
}
