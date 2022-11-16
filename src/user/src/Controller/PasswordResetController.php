<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use App\Common\Repository\UserRepository;

/**
 * Class PasswordResetController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/user/password", name="api_user_password_")
 */
class PasswordResetController extends SymfonyAbstractController
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
     * @param UserRepository           $userRepository
     *
     * @return JsonResponse
     *
     * @Route("/wallet", name="wallet", methods={"POST"})
     */
    public function byWallet(
        Request $request,
        JWTTokenManagerInterface $JWTManager,
        UserRepository $userRepository
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (
            !key_exists('wallet', $data) ||
            !key_exists('signature', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }
        $user = $userRepository->findOneBy(
            [
                'wallet' => $data['wallet'],
                'signature' => $data['signature']
            ]
        );

        if (is_null($user)) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::ACCOUNT_EXIST));
        }

        return new JsonResponse(['token' => $JWTManager->create($user) ], 201);
    }

    /**
     * @param Request                  $request
     * @param JWTTokenManagerInterface $JWTManager
     * @param UserRepository           $userRepository
     * @param MailerInterface          $mailer
     *
     * @return JsonResponse
     *
     * @Route("/email", name="email", methods={"POST"})
     */
    public function byEmail(
        Request $request,
        JWTTokenManagerInterface $JWTManager,
        UserRepository $userRepository,
        MailerInterface $mailer
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (!key_exists('email', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }
        $user = $userRepository->findOneBy(
            [
                'email' => $data['email'],
            ]
        );

        if (is_null($user)) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::ACCOUNT_EXIST));
        }

        $token = $JWTManager->create($user);

//        $email = (new Email())
//            ->from('hello@example.com')
//            ->to('you@example.com')
//            ->cc('cc@example.com')
//            ->bcc('bcc@example.com')
//            ->replyTo('fabien@example.com')
//            ->priority(Email::PRIORITY_HIGH)
//            ->subject('Time for Symfony Mailer!')
//            ->text('Sending emails is fun again!')
//            ->html('<p>Change password:</p> <a href="'.$token.'">'.$token.'</a>');
//
//        $mailer->send($email);
        return new JsonResponse(['statue' => 'success' ], 201);
    }
}
