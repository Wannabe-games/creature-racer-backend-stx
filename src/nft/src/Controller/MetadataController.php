<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Repository\ReferralNftRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\NftMetadataManager;
use App\Entity\Creature\CreatureUser;
use App\Entity\ReferralNft;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MetadataController
 *
 * @package App\Controller
 *
 * @Route(path="/api/nft", name="api_fnt_")
 */
class MetadataController extends SymfonyAbstractController
{
    /**
     * @param int                    $id
     * @param CreatureUserRepository $creatureUserRepository
     * @param NftMetadataManager     $metadataManager
     *
     * @return JsonResponse
     *
     * @Route("/metadata/{id}", name="metadata", methods={"GET"})
     *
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function metadataAction(
        int $id,
        CreatureUserRepository $creatureUserRepository,
        NftMetadataManager $metadataManager
    ): JsonResponse
    {
        /** @var CreatureUser $creatureUser */
        $creatureUser = $creatureUserRepository->findOneBy(['contract' => $id]);

        if (empty($creatureUser)) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::CREATURE_NOT_EXIST));
        }

        return new JsonResponse($metadataManager->getNFTMetadata($creatureUser));
    }

    /**
     * @param int                   $id
     * @param ReferralNftRepository $referralNftRepository
     *
     * @return JsonResponse
     *
     * @Route("/referral/metadata/{id}", name="referral_metadata", methods={"GET"})
     *
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function referralMetadataAction(
        int $id,
        ReferralNftRepository $referralNftRepository
    ): JsonResponse
    {
        /** @var ReferralNft $referral */
        $referral = $referralNftRepository->findOneBy(['rNftId' => $id]);

        if (empty($referral)) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::RNFT_NOT_EXIST));
        }

        return new JsonResponse(
            [
                'name' => $referral->getRefCode(),
                'description' => "rNFT Invite & Earn</br></br>This is a Referral Code for Creature Racer - Race and Earn mobile game.</br></br>It works like this: mint your Referral NFT (rNFT) and hold it in your wallet. Now, show your friends new gaming possibilities.</br></br>Give them your unique referral code, to use while creating an account in Creature Racer and get a percentage of what they spend while playing the game. The more people you invite, the more you can earn. Don’t wait, invite your mother, brother, sister! Let everyone play for your success, and yes if you want you can always sell your rNFT and mint a new one</br></br>If you are buying this rNFT it means that probably it gives some nice profit to the owner, or it just looks cool!</br></br>Learn more: <a href=\"https://www.creatureracer.com\">www.creatureracer.com</a>",
                'image' => 'https://api.'.$this->getParameter('base_url').'/api/contract/user/qr-code/'.$referral->getOwner()->getId()
            ]
        );
    }
}
