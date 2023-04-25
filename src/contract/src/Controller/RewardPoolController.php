<?php

namespace App\Controller;

use App\Common\Enum\UserRewardPoolStatus;
use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Stacks\RewardPoolContractManager;
use App\Common\Service\Stacks\StakingContractManager;
use App\Service\RewardPoolManager;
use App\Document\UserRewardPool;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\LockException;
use Doctrine\ODM\MongoDB\Mapping\MappingException;
use Doctrine\ODM\MongoDB\MongoDBException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RewardPoolController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/contract", name="api_contract_")
 */
class RewardPoolController extends SymfonyAbstractController
{
    const API_MAX_PER_PAGE_DEFAULT = 7;

    /**
     * @param CreatureUserRepository $creatureUserRepository
     * @param StakingContractManager $stakingContractManager
     * @param RewardPoolContractManager $rewardPoolContractManager
     * @return JsonResponse
     *
     * @Route("/calculator", name="calculator", methods={"GET"})
     */
    public function creatures(
        CreatureUserRepository $creatureUserRepository,
        StakingContractManager $stakingContractManager,
        RewardPoolContractManager $rewardPoolContractManager
    ): JsonResponse {
        return new JsonResponse(
            [
                'rewardPool' => $rewardPoolContractManager->getCollectedCycleBalance($rewardPoolContractManager->getCurrentCycle()),
                'userReward' => round(($stakingContractManager->getUserStakingPower($this->getUser()->getWallet()) * 100), 2) . '%',
                'activeReferral' => $this->getUser()->getMyReferralNft() ? $this->getUser()->getMyReferralNft()->getUsers()->count() : null,
                'usersDailyAmount' => rand(10, 1000000)
            ]
        );
    }

    /**
     * @param Request $request
     * @param DocumentManager $documentManager
     * @param RewardPoolManager $rewardPoolManager
     * @param RewardPoolContractManager $rewardPoolContractManager
     * @return JsonResponse
     *
     * @Route("/reward-pool/user/list", name="reward_pool_user_list", methods={"GET"})
     */
    public function userList(
        Request $request,
        DocumentManager $documentManager,
        RewardPoolManager $rewardPoolManager,
        RewardPoolContractManager $rewardPoolContractManager
    ): JsonResponse {
        $page = $request->query->getInt('page', 1);
        $maxItems = $request->query->getInt('itemsPerPage', self::API_MAX_PER_PAGE_DEFAULT);

        $startCycle = $rewardPoolContractManager->getCurrentCycle() - $maxItems * ($page - 1);
        $endCycle = max($startCycle - $maxItems + 1, 1);

        $result = $documentManager->getRepository(UserRewardPool::class)
            ->findUserRewardPoolCycles($this->getUser()?->getId(), $startCycle, $endCycle);

        return new JsonResponse($rewardPoolManager->prepareRewardList($result, $startCycle, $endCycle));
    }

    /**
     * @param string $id
     * @param DocumentManager $documentManager
     * @param RewardPoolContractManager $rewardPoolContractManager
     * @return JsonResponse
     *
     * @throws LockException
     * @throws MappingException
     * @throws MongoDBException
     *
     * @Route("/reward-pool/withdraw/{id}", name="reward_pool_withdraw", methods={"GET"})
     */
    public function withdraw(
        string $id,
        DocumentManager $documentManager,
        RewardPoolContractManager $rewardPoolContractManager
    ): JsonResponse {
        /** @var UserRewardPool $userRewardPool */
        $userRewardPool = $documentManager->getRepository(UserRewardPool::class)->find($id);

        if (null === $userRewardPool) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }
        if ($userRewardPool->getUserId() !== $this->getUser()->getId()) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }

        if (null === $userRewardPool->getWithdrawId()) {
            $withdrawId = ($rewardPoolContractManager->getWithdrawCount($this->getUser()->getWallet())) + 1;
            $userRewardPool->setWithdrawId($withdrawId);
        } else {
            $withdrawId = $userRewardPool->getWithdrawId();
        }

        $signedParameters = [
            'ownerPublicKey' => $this->getUser()?->getPublicKey(),
            'amount' => $userRewardPool->getMyReward(),
            'withdrawId' => $withdrawId,
            'cycle' => (int)$userRewardPool->getCycle(),
        ];
        $signature = $rewardPoolContractManager->signWithdraw($signedParameters);

        $userRewardPool->setStatus(UserRewardPoolStatus::PENDING);
        $documentManager->flush();

        return new JsonResponse(
            array_merge(
                [
                    'signature' => $signature,
                ],
                $signedParameters
            )
        );
    }

    /**
     * @param string $id
     * @param DocumentManager $documentManager
     * @return JsonResponse
     *
     * @throws LockException
     * @throws MappingException
     * @throws MongoDBException
     *
     * @Route("/reward-pool/withdraw/received/{id}", name="reward_pool_withdraw_status_received", methods={"PUT"})
     */
    public function withdrawReceived(
        string $id,
        DocumentManager $documentManager
    ): JsonResponse {
        /** @var UserRewardPool $userRewardPool */
        $userRewardPool = $documentManager->getRepository(UserRewardPool::class)->find($id);

        if (null === $userRewardPool) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        if ($userRewardPool->getUserId() !== $this->getUser()->getId()) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }

        $userRewardPool->setReceived(true);
        $documentManager->flush();

        return new JsonResponse(['status' => 'done']);
    }
}
