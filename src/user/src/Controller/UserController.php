<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\ReferralNftRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Stacks\ReferralNftContractManager;
use App\DTO\UserSerializer;
use Doctrine\ORM\EntityManagerInterface;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
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
     * @param Request $request
     * @param JWTTokenManagerInterface $JWTManager
     * @param UserManager $userManager
     * @param UserRepository $userRepository
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/registry", name="registry", methods={"POST"})
     */
    public function registry(
        Request $request,
        JWTTokenManagerInterface $JWTManager,
        UserManager $userManager,
        UserRepository $userRepository
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $userId = $userManager->createUser($data);
        $user = $userId ? $userRepository->find($userId) : null;

        if ($user instanceof User) {
            $user->setEnabled(false);
        }

        if (is_null($user)) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::ACCOUNT_EXIST));
        }

        return new JsonResponse(['token' => $JWTManager->create($user)], 201);
    }

    /**
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param UserSerializer $userSerializer
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/current", name="current", methods={"POST","GET"})
     */
    public function currentAction(
        Request $request,
        SerializerInterface $serializer,
        UserSerializer $userSerializer
    ): JsonResponse {
        if ('POST' === $request->getMethod()) {
            $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

            $user = $userSerializer->unserialize($data, $this->getUser());

            return new JsonResponse($serializer->serialize($user, 'json', ['groups' => 'api']), 200, [], true);
        }

        if ('GET' === $request->getMethod()) {
            return new JsonResponse($serializer->serialize($this->getUser(), 'json', ['groups' => 'apiGet']), 200, [], true);
        }

        throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
    }

    /**
     * @param Request $request
     * @param ReferralNftRepository $referralNftRepository
     * @param EntityManagerInterface $entityManager
     * @param ReferralNftContractManager $referralNftContractManager
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/referral/add", name="referral_add", methods={"POST"})
     */
    public function addReferralCode(
        Request $request,
        EntityManagerInterface $entityManager,
        ReferralNftRepository $referralNftRepository,
        ReferralNftContractManager $referralNftContractManager
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('refCode', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $referralNft = $referralNftRepository->findOneBy(['refCode' => $data['refCode']]);

        if (empty($referralNft)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        /** @var User $user */
        $user = $this->getUser();

        if ($user->getFromReferralNft() !== null) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }

        $user->setFromReferralNft($referralNft);

        $referralNftContractManager->incrementInvitations($this->getUser()?->getFromReferralNft()?->getRefCode(), $this->getUser()?->getWallet());

        $entityManager->flush();

        return new JsonResponse(['status' => 'success'], 200);
    }
}
