<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Document\UserShare;
use App\Entity\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\UuidV6;

/**
 * Class UserController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/portal", name="api_portal_")
 */
class UserController extends SymfonyAbstractController
{

    /**
     * @param Request         $request
     * @param DocumentManager $documentManager
     *
     * @return Response
     *
     * @Route("/user/image", name="user_image", methods={"POST", "GET"})
     */
    public function userImageAction(
        Request $request,
        DocumentManager $documentManager
    ): Response {
        $data = [];
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
        } elseif ($request->getMethod() == 'GET') {
            $userImage = $request->get('userImage', '');
            $hash = $request->get('hash', '');

            if (!empty($userImage)) {
                $data['userImage'] = $userImage;
            } elseif (!empty($hash)) {
                $data['hash'] = $hash;
            }
        }

        if (
            !key_exists('userImage', $data) &&
            !key_exists('hash', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        if (key_exists('userImage', $data)) {
            $image = $data['userImage'];
        } elseif (key_exists('hash', $data)) {
            /** @var UserShare $share */
            $share = $documentManager->getRepository(UserShare::class)->findOneBy([
                'hash' => $data['hash'],
            ]);

            if (empty($share)) {
                throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
            } else {
                $image = $share->getShare();
            }
        }

        return new Response(base64_decode($image), 200, ['Content-Type' => 'image/png']);
    }

    /**
     * @param User            $user
     * @param Request         $request
     * @param DocumentManager $documentManager
     *
     * @return JsonResponse
     *
     * @throws \Doctrine\ODM\MongoDB\MongoDBException
     *
     * @Route("/user/image-url/{user}", name="user_image_url", methods={"POST"})
     */
    public function userImageUrlAction(
        User $user,
        Request $request,
        DocumentManager $documentManager
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (!key_exists('userImage', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }
        /** @var UserShare $share */
        $share = $documentManager->getRepository(UserShare::class)->findOneBy([
            'user' => $user->getId(),
        ]);


        if (empty($share)) {
            $hash = md5(UuidV6::generate());

            $share = new UserShare();
            $share->setHash($hash);
            $share->setUser($user->getId());

            $documentManager->persist($share);
        }
        $share->setShare($data['userImage']);
        $documentManager->flush();

        return new JsonResponse(['url' => '/api/portal/user/image?hash='.$share->getHash()]);
    }
}
