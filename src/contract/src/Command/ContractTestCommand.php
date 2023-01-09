<?php

namespace App\Command;

use App\Common\Service\Stacks\CreatureNftContractManager;
use App\Common\Service\Stacks\ReferralPoolContractManager;
use App\Common\Service\Stacks\RewardPoolContractManager;
use App\Common\Service\Stacks\StakingContractManager;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContractTestCommand extends Command
{
    private const CREATURE_NFT_MINT_MESSAGE = '314159 7 1 1 1 1 1 1673445045 30000 029fb154a570a1645af3dd43c3c668a979b59d21a46dd717fd799b13be3b2a0dc7';
    private const REFERRAL_POOL_WITHDRAW_MESSAGE = '1000000 1';
    private const REWARD_POOL_WITHDRAW_MESSAGE = 'ST3NBRSFKX28FQ2ZJ1MAKX58HKHSDGNV5N7R21XCP 1000000 1 1';

    public function __construct(
        private ContainerInterface $container,
        private EntityManagerInterface $entityManager,
        private CreatureNftContractManager $signManager,
        private ReferralPoolContractManager $referralPoolContractManager,
        private RewardPoolContractManager $rewardPoolContractManager,
        private StakingContractManager $stakingContractManager
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:contract-test';

    protected function configure(): void
    {
        $this->setDescription('Open staking cycle.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $verbose = (bool)$input->getOption('verbose');

        /** @var User $user */
        $user = $this->entityManager->getRepository(User::class)->find(1);

        $output->writeln('Chain provider url: ' . $this->container->getParameter('chain_provider_url'));
        $output->writeln('User wallet: ' . $user->getWallet());

        $output->writeln('');

        $output->writeln('Creature');
        $output->writeln('========');
        $output->writeln('signMint: ' . $this->signManager->signMint(self::CREATURE_NFT_MINT_MESSAGE, $verbose));

        $output->writeln('');

        $output->writeln('Referral Pool');
        $output->writeln('=============');
        $output->writeln('getBalance: ' . $this->referralPoolContractManager->getBalance($verbose));
        $output->writeln('signWithdraw: ' . $this->referralPoolContractManager->signWithdraw(self::REFERRAL_POOL_WITHDRAW_MESSAGE, $verbose));

        $output->writeln('');

        $output->writeln('Reward Pool');
        $output->writeln('===========');
        $output->writeln('getCurrentCycle: ' . $this->rewardPoolContractManager->getCurrentCycle($verbose));
        $output->writeln('getBalance: ' . $this->rewardPoolContractManager->getBalance($verbose));
        $output->writeln('getCollectedCycleBalance: ' . $this->rewardPoolContractManager->getCollectedCycleBalance($this->rewardPoolContractManager->getCurrentCycle()));
        $output->writeln('getCycleBalance: ' . $this->rewardPoolContractManager->getCycleBalance($this->rewardPoolContractManager->getCurrentCycle(), $verbose));
        $output->writeln('getWithdrawCount: ' . $this->rewardPoolContractManager->getWithdrawCount($user->getWallet(), $verbose));
        $output->writeln('signWithdraw: ' . $this->rewardPoolContractManager->signWithdraw(self::REWARD_POOL_WITHDRAW_MESSAGE, $verbose));

        $output->writeln('');

        $output->writeln('Staking');
        $output->writeln('=======');
        $output->writeln('getCurrentCycle: ' . $this->stakingContractManager->getCurrentCycle($verbose));
        $output->writeln('getTotalShare: ' . $this->stakingContractManager->getTotalShare($verbose));
        $output->writeln('getUserShare: ' . $this->stakingContractManager->getUserShare($user->getWallet(), $verbose));
        $output->writeln('getUserReward: ' . $this->stakingContractManager->getUserReward($user->getWallet()));

        return Command::SUCCESS;
    }
}
