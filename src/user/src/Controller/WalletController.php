<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use Doctrine\ORM\EntityManagerInterface;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\Common\Repository\UserRepository;
use App\Entity\User;

/**
 * Class WalletController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/user", name="api_user_")
 */
class WalletController extends SymfonyAbstractController
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
     * @param Request $request
     * @param UserRepository $userRepository
     * @param EntityManagerInterface $entityManager
     *
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/wallet/add", name="wallet_add", methods={"POST"})
     */
    public function addWallet(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('publicKey', $data) || !array_key_exists('wallet', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        if ($userRepository->findOneBy(['wallet' => $data['wallet']]) instanceof User) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::WALLET_EXIST));
        }

        /** @var User $user */
        $user = $this->getUser();

        if (!empty($user->getWallet())) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }

        $user->setEnabled(true);
        $user->setWallet($data['wallet']);
        $user->setWallet($data['publicKey']);

        $entityManager->flush();

        return new JsonResponse(['status' => 'success'], 200);
    }
}
