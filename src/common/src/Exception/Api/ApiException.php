<?php

namespace App\Common\Exception\Api;

use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiException extends HttpException
{
    /**
     * @var ApiExceptionWrapper 
     */
    private $apiExceptionWrapper;

    public function __construct(ApiExceptionWrapper $apiExceptionWrapper, \Exception $previous = null, array $headers = array(), $code = 0)
    {
        $this->apiExceptionWrapper = $apiExceptionWrapper;
        $statusCode = $apiExceptionWrapper->getStatusCode();
        $message = $apiExceptionWrapper->getTitle();
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }

    /**
     * @return ApiExceptionWrapper
     */
    public function getApiExceptionWrapper(): ApiExceptionWrapper
    {
        return $this->apiExceptionWrapper;
    }
}