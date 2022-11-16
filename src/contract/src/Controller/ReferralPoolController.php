<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Ethereum\ReferralPoolContractManager;
use App\Document\UserReferralPool;
use Doctrine\ODM\MongoDB\DocumentManager;
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
    public function __construct(private TranslatorInterface $translator) {}

    /**
     * @param DocumentManager           $documentManager
     * @param ReferralPoolContractManager $referralPoolContractManager
     *
     * @return JsonResponse
     *
     * @throws \Doctrine\ODM\MongoDB\LockException
     * @throws \Doctrine\ODM\MongoDB\Mapping\MappingException
     *
     * @Route("/referral-pool/withdraw", name="referral_pool_withdraw", methods={"GET"})
     */
    public function withdraw(
        DocumentManager $documentManager,
        ReferralPoolContractManager $referralPoolContractManager
    ): JsonResponse {
        /** @var UserReferralPool $withdrawDocument */
        $withdrawDocument = $documentManager->getRepository(UserReferralPool::class)->findForWithdraw($this->getUser()->getId());

        if (empty($withdrawDocument))  {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        if (!empty($withdrawDocument->getWithdrawId()))  {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::WITHDRAW_EXECUTED));
        }

        $count = $documentManager->getRepository(UserReferralPool::class)->findNextCountForWithdraw($this->getUser()->getId());

        $signature = $referralPoolContractManager->getSignWithdraw($withdrawDocument->getMyReward(), $count);

        $withdrawDocument->setWithdrawId($count);
        $documentManager->flush();

        return new JsonResponse([
            'amount' => $withdrawDocument->getMyReward(),
            'withdrawId' => $count,
            'signature' => $signature
        ]);
    }
}
