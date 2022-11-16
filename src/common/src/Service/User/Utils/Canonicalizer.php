<?php
/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace App\Common\Service\User\Utils;

use const MB_CASE_LOWER;
use function mb_convert_case;
use function mb_detect_encoding;

class Canonicalizer implements CanonicalizerInterface
{

    /**
     * {@inheritdoc}
     */
    public function canonicalize($string)
    {
        if (null === $string) {
            return;
        }

        $encoding = mb_detect_encoding($string);
        $result = $encoding ? mb_convert_case($string, MB_CASE_LOWER, $encoding) : mb_convert_case($string, MB_CASE_LOWER);

        return $result;
    }
}
