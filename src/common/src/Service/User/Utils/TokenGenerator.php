<?php

namespace App\Common\Service\User\Utils;

use Exception;

/**
 * Class TokenGenerator
 * @package App\Service\User\Utils
 */
class TokenGenerator
{
    /**
     * @throws Exception
     */
    public function generateToken()
    {
        return rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');
    }
}
