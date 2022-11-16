<?php

namespace App\Common\Service\Api;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @author Michał Wadas <michal@mklit.pl>
 */
class ApiResponseManager
{
    const TEMP_HEADER = 'Temp-Header';

    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;

    /**
     * @var ContainerInterface
     */
    protected ContainerInterface $container;

    /**
     * ApiResponseManager constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param ContainerInterface     $container
     */
    public function __construct(EntityManagerInterface $entityManager, ContainerInterface $container)
    {
        $this->entityManager = $entityManager;
        $this->container = $container;
    }

    /**
     * Create json response with data in headers where
     * array key is the headers key
     *
     * @param null  $data
     * @param null  $dataToHeaders
     * @param array $headers
     * @param int   $status
     * @param bool  $json
     *
     * @return JsonResponse
     */
    public function createJsonResponse($data = null, $dataToHeaders = null, array $headers = [], int $status = 200, bool $json = false): JsonResponse
    {
        $dataInHeaders = $this->createDataHeaders($dataToHeaders);

        return new JsonResponse($data, $status, array_merge($headers, $dataInHeaders), $json);
    }

    /**
     * @param null $data
     *
     * @return array
     */
    protected function createDataHeaders($data = null): array
    {
        if (is_null($data)) {

            return [];
        }
        $accessControlExposeHeaders = '';

        foreach ($data as $key => $value) {
            $accessControlExposeHeaders .= $key.',';
        }
        $accessControlExposeHeaders = substr($accessControlExposeHeaders , 0 , -1);

        $data[self::TEMP_HEADER] = $accessControlExposeHeaders;

        return $data;
    }
}