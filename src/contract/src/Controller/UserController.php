<?php

namespace App\Controller;

use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Ethereum\RewardPoolContractManager;
use App\Common\Service\Ethereum\StakingContractManager;
use App\Entity\User;
use App\Common\Service\CreatureFileNameManager;
use Endroid\QrCode\Writer\Result\ResultInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

/**
 * Class UserController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/contract", name="api_contract_")
 */
class UserController extends SymfonyAbstractController
{
    /**
     * @param CreatureFileNameManager $creatureFileNameManager
     * @param TranslatorInterface $translator
     */
    public function __construct(
        private CreatureFileNameManager $creatureFileNameManager,
        private TranslatorInterface $translator
    ) {
    }

    /**
     * @param User $user
     * @param StakingContractManager $stakingContractManager
     * @param RewardPoolContractManager $poolContractManager
     * @param ContainerInterface $container
     *
     * @return JsonResponse
     *
     * @throws \Exception
     *
     * @Route("/user/card/{user}", name="user_card", methods={"GET"})
     */
    public function userCardAction(
        User $user,
        StakingContractManager $stakingContractManager,
        RewardPoolContractManager $poolContractManager,
        ContainerInterface $container
    ): JsonResponse {
        $resultQR = $this->getResultQR($container, $user);

        $result['poolShare'] = $stakingContractManager->getTotalShare();
        $result['rewardPool'] = $poolContractManager->getCollectedCycleBalanceInMatic($poolContractManager->getCurrentCycle());
        $result['nick'] = $user->getNick();
        $result['referralCode'] = $user->getMyReferralNft() ? $user->getMyReferralNft()->getRefCode() : null;
        $result['referralLevel'] = $user->getMyReferralNft() ? $user->getMyReferralNft()->getUsers()->count() : null;
        $result['qrCode'] = $resultQR->getDataUri();
        $result['avatar'] = $this->creatureFileNameManager->getFileName($user->getPlayer()->getActiveAnimalCreatureType()) . '.png';

        return new JsonResponse($result);
    }

    /**
     * @param CreatureUserRepository $creatureUserRepository
     * @param StakingContractManager $stakingContractManager
     * @param RewardPoolContractManager $RewardPoolContractManager
     *
     * @return JsonResponse
     *
     * @Route("/user/statistic", name="user_statistic", methods={"GET"})
     *
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function activeInGameAction(
        CreatureUserRepository $creatureUserRepository,
        \App\Common\Service\Stacks\StakingContractManager $stakingContractManager,
        \App\Common\Service\Stacks\RewardPoolContractManager $poolContractManager
    ): JsonResponse {
        $result['totalPoolShare'] = round($stakingContractManager->getTotalShare() / 1000000000000000000, 2);
        $result['myPoolShare'] = round($stakingContractManager->getUserShare($this->getUser()->getWallet()) / $stakingContractManager->getTotalShare() * 100, 2);
        $result['rewardPool'] = round($poolContractManager->getCollectedCycleBalance($poolContractManager->getCurrentCycle()), 2);
        $result['referralLevel'] = $this->getUser()->getMyReferralNft() ? $this->getUser()->getMyReferralNft()->getUsers()->count() : null;
        $result['readyToUpgrade'] = $creatureUserRepository->readyToUpgradeCount($this->getUser());
        $result['totalStaked'] = $creatureUserRepository->isStackedCount($this->getUser());
        $result['mintedInTotal'] = $creatureUserRepository->mintedCount($this->getUser());
        $result['expiresSoon'] = $creatureUserRepository->expiredSoonCount($this->getUser());

        return new JsonResponse($result);
    }

    /**
     * @param User $user
     * @param StakingContractManager $stakingContractManager
     * @param RewardPoolContractManager $poolContractManager
     * @param ContainerInterface $container
     *
     * @return JsonResponse
     *
     * @throws \Exception
     *
     * @Route("/user/qr-code/{user}", name="user_qr_code_card", methods={"GET"})
     */
    public function userQrCode(
        User $user,
        ContainerInterface $container
    ): Response {
        return new Response(base64_decode(str_replace('data:image/png;base64,', '', $this->getResultQR($container, $user)->getDataUri())), 200, ['Content-Type' => 'image/png']);
    }

    /**
     * @param ContainerInterface $container
     * @param User $user
     *
     * @return \Endroid\QrCode\Writer\Result\ResultInterface
     *
     * @throws \Exception
     */
    protected function getResultQR(
        ContainerInterface $container,
        User $user
    ): ResultInterface {
        $qrColors = [
//            new Color(30, 246, 223),
//            new Color(139, 223, 145),
//            new Color(246, 201, 68),
            new Color(180, 123, 151),
            new Color(103, 32, 248),
        ];
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($container->getParameter('qr_code_referral_redirect_address') . ($user->getMyReferralNft() ? '?referralcode=' . $user->getMyReferralNft()->getRefCode() : ''))
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(100)
            ->setMargin(0)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor($qrColors[rand(0, (count($qrColors) - 1))])
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(__DIR__ . '/../../public/cr_logo.png')
            ->setResizeToWidth(35);
//
//        // Create generic label
//        $label = Label::create('')
//            ->setTextColor(new Color(0, 0, 0));

        return $writer->write($qrCode, $logo);
    }
}
