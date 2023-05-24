<?php

namespace App\Controller;

use App\Common\Enum\UserReferralPoolStatus;
use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Document\UserReferralPoolRepository;
use App\Common\Repository\ReferralNftRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Stacks\ReferralNftContractManager;
use App\Document\ContractLog;
use App\Document\UserReferralPool;
use App\Entity\ReferralNft;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use JsonException;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
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
     * @param string $refCode
     * @param ContainerInterface $container
     * @param ReferralNftRepository $referralNftRepository
     * @return JsonResponse
     * @throws ApiErrorException
     *
     * @Route("/validate/special-ref-code/{refCode}", name="special_ref_code", methods={"GET"})
     */
    public function validateSpecialRefCode(
        string $refCode,
        ContainerInterface $container,
        ReferralNftRepository $referralNftRepository
    ): JsonResponse {
        $referralNft = $referralNftRepository->findOneBy(['refCode' => $refCode]);

        if (null !== $referralNft) {
            return new JsonResponse(
                [
                    'unique' => false,
                    'paymentUrl' => null,
                ]
            );
        }

        $userHasCreatures = (int)$this->getUser()?->getCreatures()->count() > 0;

        $stripe = new StripeClient($container->getParameter('stripe_api_secret_key'));

        $paymentLink = $stripe->paymentLinks->create(
            [
                'line_items' => [
                    [
                        'price' => $userHasCreatures ? $container->getParameter('stripe_price_default') : $container->getParameter('stripe_price_promo'),
                        'quantity' => 1
                    ]
                ],
                'metadata' => [
                    'userId' => $this->getUser()->getId(),
                    'refCode' => $refCode
                ],
                'after_completion' => [
                    'type' => 'redirect',
                    'redirect' => [
                        'url' => $container->getParameter('base_url') . ($userHasCreatures ?
                                '/referrals?order_confirmation={CHECKOUT_SESSION_ID}' :
                                '/register/step3?order_confirmation={CHECKOUT_SESSION_ID}'
                            ),
                    ],
                ],
            ]
        );

        return new JsonResponse(
            [
                'unique' => true,
                'paymentUrl' => $paymentLink->url,
            ]
        );
    }

    /**
     * @param Request $request
     * @param ReferralNftRepository $referralNftRepository
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     * @throws JsonException
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
        $referralNft->setMintHash($data['rNftHash']);
        $referralNft->setTransferHash($data['rNftHash']);

        $entityManager->persist($referralNft);
        $entityManager->flush();

        return new JsonResponse(['status' => 'success']);
    }

    /**
     * @param UserReferralPoolRepository $userReferralPoolRepository
     *
     * @return JsonResponse
     *
     * @Route("/rnft/invitees", name="rnft-invitees", methods={"GET"})
     */
    public function invitees(UserReferralPoolRepository $userReferralPoolRepository): JsonResponse
    {
        $result = [];

        /** @var User $user */
        foreach ($this->getUser()?->getMyReferralNft()?->getUsers() ?? [] as $fromUser) {
            /** @var UserReferralPool $userReferralPool */
            $userReferralPool = $userReferralPoolRepository->findOneBy(
                [
                    'fromUserId' => $fromUser->getId(),
                    'status' => UserReferralPoolStatus::CRON_VERIFICATION,
                    'received' => false
                ]
            );

            $userResult['wallet'] = $fromUser->getWallet();
            $userResult['nick'] = $fromUser->getNick();
            $userResult['pool'] = $userReferralPool?->getMyReward() ?? 0;

            $result[] = $userResult;
        }

        return new JsonResponse($result);
    }

    /**
     * @param ReferralNft|null $referralNft
     * @param ContainerInterface $container
     * @return JsonResponse
     *
     * @Route("/rnft/{refCode}/metadata.json", name="rnft-metadata-json", methods={"GET"})
     */
    public function getMetadataJson(?ReferralNft $referralNft, ContainerInterface $container): JsonResponse
    {
        if (null === $referralNft) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::RNFT_NOT_EXIST));
        }

        $result = [
            "title" => "Creature Racer rNFT",
            "type" => "object",
            "properties" => [
                "name" => [
                    "type" => "string",
                    "description" => "rNFT"
                ],
                "description" => [
                    "type" => "string",
                    "description" => "Creature Racer NFT used for referrals."
                ],
                "image" => [
                    "type" => "string",
                    "description" => $container->getParameter('base_url') . $container->getParameter('base_path') . '/user/qr-code/' . $referralNft->getOwner()?->getId()
                ]
            ]
        ];

        return new JsonResponse($result);
    }
}
