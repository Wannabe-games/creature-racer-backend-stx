<?php

namespace App\EventSubscriber;

use App\Common\Exception\Api\ApiException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiExceptionSubscriber implements EventSubscriberInterface
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $e = $event->getThrowable();

        if ($e instanceof ApiException) {
            $apiWrapper = $e->getApiExceptionWrapper();
            $responseData = $apiWrapper->toArray();
            $statusCode = $apiWrapper->getStatusCode();
        } else {
            $responseData = ['message' => $e->getMessage()];
            if (isset($_ENV['APP_DEBUG'])) {
                $responseData['file'] = $e->getFile();
                $responseData['line'] = $e->getLine();
                $responseData['trace'] = $e->getTrace();
            }
            $statusCode = $e instanceof MethodNotAllowedHttpException ? 400 : 500;
        }

        $response = new JsonResponse($responseData, $statusCode);
        $response->headers->set('Content-Type', 'application/problem+json');
        $event->setResponse($response);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException'
        ];
    }
}
