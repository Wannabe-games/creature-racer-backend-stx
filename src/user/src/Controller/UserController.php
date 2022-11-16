<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\ReferralNftRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Ethereum\ReferralContractManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use App\Common\Service\User\UserManager;
use App\Common\Repository\UserRepository;
use App\Entity\User;

/**
 * Class UserController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/user", name="api_user_")
 */
class UserController extends SymfonyAbstractController
{
    /**
     * @var TranslatorInterface
     */
    private TranslatorInterface $translator;

    /**
     * SecurityController constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param Request                  $request
     * @param JWTTokenManagerInterface $JWTManager
     * @param UserManager              $userManager
     * @param UserRepository           $userRepository
     *
     * @return JsonResponse
     *
     * @Route("/registry", name="registry", methods={"POST"})
     */
    public function registry(
        Request $request,
        JWTTokenManagerInterface $JWTManager,
        UserManager $userManager,
        UserRepository $userRepository
    ): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $userId = $userManager->createUser($data);
        $user = $userId ? $userRepository->find($userId) : null;
        
        if ($user instanceof User) {
            $user->setEnabled(false);
        }

        if (is_null($user)) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::ACCOUNT_EXIST));
        }

        return new JsonResponse(['token' => $JWTManager->create($user) ], 201);
    }

    /**
     * @param Request             $request
     * @param SerializerInterface $serializer
     * @param \App\DTO\User       $userDTO
     *
     * @return JsonResponse
     *
     * @Route("/current", name="current", methods={"POST","GET"})
     */
    public function currentAction(
        Request $request,
        SerializerInterface $serializer,
        \App\DTO\User $userDTO
    ): JsonResponse {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $user = $userDTO->unserialize($data, $this->getUser());

            return new JsonResponse($serializer->serialize($user, 'json', ['groups' => 'api']), 200, [], true);

        } elseif ($request->getMethod() == 'GET') {

            return new JsonResponse($serializer->serialize($this->getUser(), 'json', ['groups' => 'apiGet']), 200, [], true);
        }
    }

    /**
     * @param Request                 $request
     * @param ReferralNftRepository   $referralNftRepository
     * @param EntityManagerInterface  $entityManager
     * @param ReferralContractManager $referralContractManager
     *
     * @return JsonResponse
     *
     * @Route("/referral/add", name="referral_add", methods={"POST"})
     *
     * @return JsonResponse
     */
    public function addReferralCode(
        Request $request,
        ReferralNftRepository $referralNftRepository,
        EntityManagerInterface $entityManager,
        ReferralContractManager $referralContractManager
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (!key_exists('refCode', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        } else {
            $referralNft = $referralNftRepository->findOneBy(
                [
                    'refCode' => $data['refCode'],
                ]
            );

            if (!empty($user)) {
                throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::WALLET_EXIST));
            }
        }

        /** @var User $user */
        $user = $this->getUser();

        if (empty($user->getFromReferralNft())) {
            $user->setFromReferralNft($referralNft);

            $referralContractManager->incrementInvitations($this->getUser());

            $entityManager->flush();

            return new JsonResponse(['status' => 'success'], 200);
        } else {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }
    }
}
