<?php

namespace App\EventSubscriber;

use App\Common\Service\Api\ApiResponseManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class ApiResponseSubscriber
 *
 * @package App\EventSubscriber
 *
 * @author Michał Wadas <michal@mklit.pl>
 */
class ApiResponseSubscriber implements EventSubscriberInterface
{
    const ACCESS_CONTROL_EXPOSE_HEADERS = 'Access-Control-Expose-Headers';
    const ACCESS_CONTROL_ALLOW_ORIGIN = 'Access-Control-Allow-Origin';
    const DEFAULT_ACCESS_CONTROL_EXPOSE_HEADERS = 'Link,Content-Range';
    const DEFAULT_ACCESS_CONTROL_EXPOSE_METHODS = 'Access-Control-Allow-Methods';

    /**
     * @param ResponseEvent $event
     */
    public function onKernelResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();

        $originHeader = $response->headers->get(self::ACCESS_CONTROL_EXPOSE_HEADERS);

        if (strpos($originHeader, self::DEFAULT_ACCESS_CONTROL_EXPOSE_HEADERS) == false) {
            if (strlen($originHeader) > 0) {
                $originHeader .= ',';
            }
            $originHeader .= self::DEFAULT_ACCESS_CONTROL_EXPOSE_HEADERS;
        }

        // @todo Remove line below in first release
        $response->headers->set(self::ACCESS_CONTROL_ALLOW_ORIGIN,'*');
        $response->headers->set(self::DEFAULT_ACCESS_CONTROL_EXPOSE_METHODS,'GET, POST, PUT, PATCH, OPTIONS');

        if (!$response->headers->has(ApiResponseManager::TEMP_HEADER) || empty($response->headers->get(ApiResponseManager::TEMP_HEADER))) {
            $response->headers->set(self::ACCESS_CONTROL_EXPOSE_HEADERS,$originHeader);

            return;
        }

        $tempHeader = $response->headers->get(ApiResponseManager::TEMP_HEADER);
        $response->headers->remove(ApiResponseManager::TEMP_HEADER);

        $response->headers->set(self::ACCESS_CONTROL_EXPOSE_HEADERS,$originHeader.','.$tempHeader);
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => ['onKernelResponse',10000]
        ];
    }
}