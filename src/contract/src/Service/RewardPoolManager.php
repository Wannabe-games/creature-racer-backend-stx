<?php
namespace App\Service;

/**
 * Class RewardPoolManager
 */
class RewardPoolManager
{
    /**
     * @param array $userRewardPools
     * @param int   $userId
     *
     * @return array
     */
    public function prepareRewardList(array $userRewardPools, int $userId): array
    {
        $date = new \DateTime();
        $result = [];

        for ($i = 0; $i < 7; ++$i) {
            if (key_exists($i, $userRewardPools)) {
                $result[] = [
                    'id' => $userRewardPools[$i]->getId(),
                    'myReward' => round($userRewardPools[$i]->getMyReward()/1000000000000000000, 2),
                    'myStakingPower' => round($userRewardPools[$i]->getMyStakingPower(), 2),
                    'totalRewardPool' => round($userRewardPools[$i]->getTotalRewardPool()/1000000000000000000, 2),
                    'user' => $userId,
                    'isReceived' =>  $userRewardPools[$i]->isReceived(),
                    'withdrawId' =>  $userRewardPools[$i]->getWithdrawId(),
                    'date' => $userRewardPools[$i]->getTimestamp()->format('Y-m-d'),
                ];

                $date = $userRewardPools[$i]->getTimestamp();
            } else {
                $result[] = [
                    'id' => null,
                    'myReward' => null,
                    'myStakingPower' => null,
                    'totalRewardPool' => null,
                    'user' => $userId,
                    'isReceived' =>  null,
                    'withdrawId' =>  null,
                    'date' => $date->format('Y-m-d'),
                ];

            }
            $date->sub(new \DateInterval('P1D'));
        }

        return $result;
    }

}
