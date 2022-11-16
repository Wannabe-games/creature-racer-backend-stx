<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
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
     * @param Request        $request
     * @param UserRepository $userRepository
     * @param EntityManagerInterface $entityManager
     *
     * @return JsonResponse
     *
     * @Route("/wallet/add", name="wallet_add", methods={"POST"})
     *
     * @return JsonResponse
     */
    public function addWallet(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (
//            !key_exists('signature', $data) ||
            !key_exists('wallet', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        } else {
            $user = $userRepository->findOneBy(
                [
                    'wallet' => $data['wallet'],
//                    'signature' => $data['signature']
                ]
            );

            if (!empty($user)) {
                throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::WALLET_EXIST));
            }
        }

        /** @var User $user */
        $user = $this->getUser();

        if (empty($user->getWallet())) {
            $user->setEnabled(true);
            $user->setWallet($data['wallet']);

            if (key_exists('signature', $data)) {
                $user->setWallet($data['signature']);
            }

            $entityManager->flush();

            return new JsonResponse(['status' => 'success'], 200);
        } else {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }
    }
}
