<?php

namespace App\Security\Handler;

use App\Entity\User;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

/**
 * Class LogoutHandler
 *
 * @package App\Security\Handler
 */
class LogoutHandler implements LogoutHandlerInterface
{
    /**
     * @var RouterInterface
     */
    private RouterInterface $router;

    /**
     * @var TagAwareCacheInterface
     */
    private TagAwareCacheInterface $userActivityCachePool;

    /**
     * LogoutHandler constructor.
     *
     * @param RouterInterface        $router
     * @param TagAwareCacheInterface $userActivityCachePool
     */
    public function __construct(RouterInterface $router, TagAwareCacheInterface $userActivityCachePool)
    {
        $this->router = $router;
        $this->userActivityCachePool = $userActivityCachePool;
    }


    /**
     * @param Request        $request
     * @param Response       $response
     * @param TokenInterface $token
     *
     * @return RedirectResponse
     * @throws InvalidArgumentException
     */
    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        if (!$token instanceof AnonymousToken) {
            $user = $token->getUser();

            if ($user instanceof User) {
                $this->userActivityCachePool->delete(CacheEnum::USER_ACTIVITY_PREFIX . $user->getId());
            }
        }
    }
}
