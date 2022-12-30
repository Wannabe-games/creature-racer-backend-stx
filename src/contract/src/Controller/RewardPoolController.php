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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class RewardPoolController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/contract", name="api_contract_")
 */
class RewardPoolController extends SymfonyAbstractController
{
    const API_MAX_PER_PAGE_DEFAULT = 10;

    /**
     * SecurityController constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(private TranslatorInterface $translator) {}

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
    ): JsonResponse
    {
        return new JsonResponse([
            'rewardPool' => $rewardPoolContractManager->getCollectedCycleBalance($rewardPoolContractManager->getCurrentCycle()),
            'userReward' => round(($stakingContractManager->getUserReward($this->getUser()->getWallet())*100), 2).'%',
            'activeReferral' => $this->getUser()->getMyReferralNft() ? $this->getUser()->getMyReferralNft()->getUsers()->count() : null,
            'usersDailyAmount' => rand(10,1000000)
        ]);
    }

    /**
     * @param Request           $request
     * @param DocumentManager   $documentManager
     * @param RewardPoolManager $rewardPoolManager
     *
     * @return JsonResponse
     *
     * @Route("/reward-pool/user/list", name="reward_pool_user_list", methods={"GET"})
     */
    public function userList(
        Request $request,
        DocumentManager $documentManager,
        RewardPoolManager $rewardPoolManager
    ): JsonResponse {
        $page = $request->query->getInt('page', 1);
        $itemsPerPage = $request->query->getInt('itemsPerPage', self::API_MAX_PER_PAGE_DEFAULT);

        $result = $documentManager->getRepository(UserRewardPool::class)->findUserRewardPoolCycles(
            $this->getUser()->getId(),
            $itemsPerPage,
            $page ? ($page - 1) * $itemsPerPage : null
        );

        return new JsonResponse($rewardPoolManager->prepareRewardList($result, $this->getUser()->getId()));
    }

    /**
     * @param string                    $id
     * @param DocumentManager           $documentManager
     * @param RewardPoolContractManager $rewardPoolContractManager
     *
     * @return JsonResponse
     *
     * @throws \Doctrine\ODM\MongoDB\LockException
     * @throws \Doctrine\ODM\MongoDB\Mapping\MappingException
     *
     * @Route("/reward-pool/withdraw/{id}", name="reward_pool_withdraw", methods={"GET"})
     */
    public function withdraw(
        string $id,
        DocumentManager $documentManager,
        RewardPoolContractManager $rewardPoolContractManager
    ): JsonResponse {
        /** @var UserRewardPool $withdrawDocument */
        $withdrawDocument = $documentManager->getRepository(UserRewardPool::class)->find($id);

        if (empty($withdrawDocument))  {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }
        if ($withdrawDocument->getUser() != $this->getUser()->getId()) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }

        if (empty($withdrawDocument->getWithdrawId()))  {
            $count = ((int)$rewardPoolContractManager->getWithdrawCount($this->getUser()->getWallet()))+1;
            $withdrawDocument->setWithdrawId($count);
        } else {
            $count = $withdrawDocument->getWithdrawId();
        }

        $cycle = (int)$withdrawDocument->getCycle();
        $signature = $rewardPoolContractManager->signWithdraw($this->getUser()->getWallet(), $withdrawDocument->getMyReward(), $count, $cycle);

        $withdrawDocument->setStatus(UserRewardPoolStatus::PENDING);
        $documentManager->flush();

        return new JsonResponse([
            'amount' => $withdrawDocument->getMyReward(),
            'withdrawId' => $count,
            'cycle' => $cycle,
            'signature' => $signature
        ]);
    }

    /**
     * @param string          $id
     * @param DocumentManager $documentManager
     *
     * @return JsonResponse
     *
     * @throws \Doctrine\ODM\MongoDB\LockException
     * @throws \Doctrine\ODM\MongoDB\Mapping\MappingException
     *
     * @Route("/reward-pool/withdraw/received/{id}", name="reward_pool_withdraw_status_received", methods={"PUT"})
     */
    public function withdrawReceived(
        string $id,
        DocumentManager $documentManager
    ): JsonResponse {
        /** @var UserRewardPool $withdrawDocument */
        $withdrawDocument = $documentManager->getRepository(UserRewardPool::class)->find($id);

        if (empty($withdrawDocument))  {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }
        if ($withdrawDocument->getUser() != $this->getUser()->getId()) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }
        $withdrawDocument->setIsReceived(true);
        $documentManager->flush();

        return new JsonResponse(['status' => 'done']);
    }
}
