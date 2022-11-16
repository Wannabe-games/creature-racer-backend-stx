<?php

namespace App\EventSubscriber;

use App\Common\Exception\Api\ApiException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ApiExceptionSubscriber
 *
 * @package App\EventSubscriber
 *
 * @author Michał Wadas <michal@mklit.pl>
 */
class ApiExceptionSubscriber implements EventSubscriberInterface
{
    /**
     * @param ExceptionEvent $event
     */
    public function onKernelException(ExceptionEvent $event)
    {
        $e = $event->getThrowable();

        if ($e instanceof ApiException) {
            $apiWrapper = $e->getApiExceptionWrapper();

            $response = new JsonResponse(
                $apiWrapper->toArray(),
                $apiWrapper->getStatusCode()
            );
        } elseif ($e instanceof MethodNotAllowedHttpException) {
            $response = new JsonResponse(
                ['message' => $e->getMessage()],
                400
            );
        } elseif ($e instanceof \Throwable) {
            $response = new JsonResponse(
                ['message' => $e->getMessage()],
                500
            );
        } else {
            return;
        }

        $response->headers->set('Content-Type', 'application/problem+json');
        $event->setResponse($response);
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException'
        ];
    }
}