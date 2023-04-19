<?php

namespace App\Service;

use App\Document\UserRewardPool;
use DateInterval;
use DateTime;

/**
 * Class RewardPoolManager
 */
class RewardPoolManager
{
    /**
     * @param array|UserRewardPool[] $userRewardPools
     * @param int $startCycle
     * @param int $endCycle
     * @return array
     */
    public function prepareRewardList(array $userRewardPools, int $startCycle = 1, int $endCycle = 1): array
    {
        $date = new DateTime();
        $result = [];

        for ($cycle = $startCycle; $cycle >= $endCycle; --$cycle) {
            $result[$cycle] = [
                'id' => null,
                'cycle' => $cycle,
                'myStakingPower' => 0,
                'myReward' => 0,
                'totalRewardPool' => 0,
                'isReceived' => false,
                'withdrawId' => null,
                'date' => $date->format('Y-m-d'),
            ];

            $date->sub(new DateInterval('P1D'));
        }

        foreach ($userRewardPools as $cycleDetails) {
            $cycle = $cycleDetails->getCycle();

            if ($cycle > $startCycle || $cycle < $endCycle) {
                continue;
            }

            $result[$cycle]['id'] = $cycleDetails->getId();
            $result[$cycle]['myStakingPower'] = (float)$cycleDetails->getMyStakingPower();
            $result[$cycle]['myReward'] = $cycleDetails->getMyReward();
            $result[$cycle]['totalRewardPool'] = $cycleDetails->getTotalRewardPool();
            $result[$cycle]['isReceived'] = $cycleDetails->isReceived();
            $result[$cycle]['withdrawId'] = $cycleDetails->getWithdrawId();
        }

        return array_values($result);
    }
}
