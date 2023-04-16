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
use Symfony\Contracts\Translation\TranslatorInterface;

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
     * SecurityController constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(private TranslatorInterface $translator)
    {
    }

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
        /** @var UserReferralPool $withdrawDocument */
        $withdrawDocument = $documentManager->getRepository(UserReferralPool::class)->findForWithdraw($this->getUser()->getId());

        if (empty($withdrawDocument)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $withdrawId = $documentManager->getRepository(UserReferralPool::class)->findNextCountForWithdraw($this->getUser()->getId());

        $signedParameters = [
            'ownerPublicKey' => $this->getUser()?->getPublicKey(),
            'amount' => $withdrawDocument->getMyReward(),
            'withdrawId' => $withdrawId,
        ];
        $signature = $referralPoolContractManager->signWithdraw($signedParameters);

        $withdrawDocument->setWithdrawId($withdrawId);
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
}
