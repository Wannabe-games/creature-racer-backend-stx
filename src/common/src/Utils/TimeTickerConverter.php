<?php
namespace App\Common\Utils;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class TimeTickerConverter
 */
class TimeTickerConverter
{
    /**
     * @param $tick
     *
     * @return float
     */
    public static function TicksToTime($tick): float
    {

        return floor(($tick - 621355968000000000) / 10000000);

    }

    /**
     * @param $time
     *
     * @return string
     */
    public static function TimeToTicks($time): string
    {

        return number_format(($time * 10000000) + 621355968000000000 , 0, '.', '');

    }
}
