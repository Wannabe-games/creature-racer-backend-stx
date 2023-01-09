<?php

namespace App\Controller;

use App\Common\Enum\UserReferralPoolStatus;
use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Document\UserReferralPoolRepository;
use App\Common\Repository\ReferralNftRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Stacks\ReferralContractManager;
use App\Document\Log\PaymentLog;
use App\Document\UserReferralPool;
use App\Entity\ReferralNft;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class rNftController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/contract", name="api_contract_")
 */
class rNftController extends SymfonyAbstractController
{
    /**
     * @param string $refCode
     * @param ReferralNftRepository $referralNftRepository
     *
     * @return JsonResponse
     *
     * @Route("/validate/ref-code/{refCode}", name="ref_code", methods={"GET"})
     */
    public function validateRefCode(
        string $refCode,
        ReferralNftRepository $referralNftRepository
    ): JsonResponse {
        $referralNft = $referralNftRepository->findOneBy(
            [
                'refCode' => $refCode
            ]
        );

        return new JsonResponse(['unique' => empty($referralNft)]);
    }

    /**
     * @param Request $request
     * @param ReferralNftRepository $referralNftRepository
     * @param EntityManagerInterface $entityManager
     *
     * @return JsonResponse
     *
     * @Route("/rnft", name="rnft", methods={"POST"})
     */
    public function rNftAction(
        Request $request,
        ReferralNftRepository $referralNftRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('refCode', $data) || !array_key_exists('rNftHash', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $referralNft = $referralNftRepository->findOneBy(
            [
                'refCode' => $data['refCode']
            ]
        );

        if (!empty($referralNft)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::REF_CODE_EXIST));
        }

        $referralNft = new ReferralNft();
        $referralNft->setOwner($this->getUser());
        $referralNft->setRefCode($data['refCode']);
        $referralNft->setHash($data['rNftHash']);

        $entityManager->persist($referralNft);
        $entityManager->flush();

        return new JsonResponse(['status' => 'success']);
    }

    /**
     * @param ReferralContractManager $referralContractManager
     *
     * @return JsonResponse
     *
     * @Route("/rnft/increment-invitations", name="rnft-increment-invitations", methods={"GET"})
     */
    public function incrementInvitations(ReferralContractManager $referralContractManager): JsonResponse
    {
        $referralContractManager->incrementInvitations($this->getUser());

        return new JsonResponse(['status' => 'success']);
    }

    /**
     * @param UserReferralPoolRepository $userReferralPoolRepository
     *
     * @return JsonResponse
     *
     * @Route("/rnft/invitees", name="rnft-invitees", methods={"GET"})
     */
    public function invitees(
        UserReferralPoolRepository $userReferralPoolRepository
    ): JsonResponse {
        $result = [];
        if (!empty($this->getUser()->getMyReferralNft())) {
            /** @var User $user */
            foreach ($this->getUser()->getMyReferralNft()->getUsers() as $user) {
                $userResult['wallet'] = $user->getWallet();
                $userResult['nick'] = $user->getNick();

                /** @var UserReferralPool $referralPoolLog */
                $referralPoolLog = $userReferralPoolRepository->findOneBy(
                    [
                        'user' => $user->getFromReferralNft()->getOwner()->getId(),
                        'status' => UserReferralPoolStatus::CRON_VERIFICATION,
                        'received' => false
                    ]
                );
                $userResult['pool'] = 0;

                /** @var PaymentLog $paymentLog */
                foreach ($referralPoolLog->getPaymentLogs() as $paymentLog) {
                    if ($paymentLog->getUserWallet() == $user->getWallet()) {
                        $userResult['pool'] += $paymentLog->getUserReferralPool();
                    }
                }

                $result[] = $userResult;
            }
        }

        return new JsonResponse($result);
    }
}
