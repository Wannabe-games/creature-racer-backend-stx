<?php

namespace App\Command;

use App\Common\Service\Stacks\CreatureNftContractManager;
use App\Common\Service\Stacks\ReferralNftContractManager;
use App\Common\Service\Stacks\ReferralPoolContractManager;
use App\Common\Service\Stacks\RewardPoolContractManager;
use App\Common\Service\Stacks\StakingContractManager;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContractTestCommand extends Command
{
    private const REFERRAL_NFT_MINT_CODE = 'rNFT_test';
    private const CREATURE_NFT_MINT_PARAMS = [314159, 7, 1, 1, 1, 1, 1, 1673445045, 30000, 'https://app-dev.creatureracer.com/api/contract/creature/frog/metadata.json', '029fb154a570a1645af3dd43c3c668a979b59d21a46dd717fd799b13be3b2a0dc7'];
    private const REFERRAL_POOL_WITHDRAW_PARAMS = ['ST3NBRSFKX28FQ2ZJ1MAKX58HKHSDGNV5N7R21XCP', 1000000, 1];
    private const REWARD_POOL_WITHDRAW_PARAMS = ['ST3NBRSFKX28FQ2ZJ1MAKX58HKHSDGNV5N7R21XCP', 1000000, 1, 1];

    public function __construct(
        private ContainerInterface $container,
        private EntityManagerInterface $entityManager,
        private CreatureNftContractManager $signManager,
        private ReferralNftContractManager $referralNftContractManager,
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

        $output->writeln('Chain provider url: ' . ($this->container->getParameter('chain_provider_url') ?: 'https://stacks-node-api.mainnet.stacks.co'));
        $output->writeln('Contracts version: ' . $this->container->getParameter('contract_version'));
        $output->writeln('User wallet: ' . $user->getWallet());

        $output->writeln('');

        $output->writeln('Creature');
        $output->writeln('========');
        $output->writeln('signMint: ' . $this->signManager->signMint(self::CREATURE_NFT_MINT_PARAMS, $verbose));

        $output->writeln('');

        $output->writeln('Referral NFT');
        $output->writeln('=============');
        $output->writeln('signMint: ' . $this->referralNftContractManager->signMint(self::REFERRAL_NFT_MINT_CODE, $verbose));
//        $output->writeln('mint: ' . $this->referralNftContractManager->mint(self::REFERRAL_NFT_MINT_CODE, $verbose));
//        $output->writeln('specialMint: ' . $this->referralNftContractManager->specialMint(self::REFERRAL_NFT_MINT_CODE, $verbose));

        $output->writeln('');

        $output->writeln('Referral Pool');
        $output->writeln('=============');
        $output->writeln('getBalance: ' . $this->referralPoolContractManager->getBalance($verbose));
        $output->writeln('getWithdrawCount: ' . $this->referralPoolContractManager->getWithdrawCount($user->getWallet(), $verbose));
        $output->writeln('signWithdraw: ' . $this->referralPoolContractManager->signWithdraw(self::REFERRAL_POOL_WITHDRAW_PARAMS, $verbose));

        $output->writeln('');

        $output->writeln('Reward Pool');
        $output->writeln('===========');
        $output->writeln('getCurrentCycle: ' . $this->rewardPoolContractManager->getCurrentCycle($verbose));
        $output->writeln('getBalance: ' . $this->rewardPoolContractManager->getBalance($verbose));
        $output->writeln('getCollectedCycleBalance: ' . $this->rewardPoolContractManager->getCollectedCycleBalance($this->rewardPoolContractManager->getCurrentCycle()));
        $output->writeln('getCycleBalance: ' . $this->rewardPoolContractManager->getCycleBalance($this->rewardPoolContractManager->getCurrentCycle(), $verbose));
        $output->writeln('getWithdrawCount: ' . $this->rewardPoolContractManager->getWithdrawCount($user->getWallet(), $verbose));
        $output->writeln('signWithdraw: ' . $this->rewardPoolContractManager->signWithdraw(self::REWARD_POOL_WITHDRAW_PARAMS, $verbose));

        $output->writeln('');

        $output->writeln('Staking');
        $output->writeln('=======');
        $output->writeln('getCurrentCycle: ' . $this->stakingContractManager->getCurrentCycle($verbose));
        $output->writeln('getTotalShare: ' . $this->stakingContractManager->getTotalShare($verbose));
        $output->writeln('getUserShare: ' . $this->stakingContractManager->getUserShare($user->getWallet(), $verbose));
        $output->writeln('getUserStakingPower: ' . $this->stakingContractManager->getUserStakingPower($user->getWallet()));

        return Command::SUCCESS;
    }
}
