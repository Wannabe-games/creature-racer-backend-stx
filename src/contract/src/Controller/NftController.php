<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Game\CreatureManager;
use App\Common\Service\Stacks\CreatureNftContractManager;
use App\Common\Service\Stacks\SignManager;
use App\DTO\NftUserCreature;
use App\Entity\Creature\CreatureUser;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\OptimisticLockException;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class NftController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/contract", name="api_contract_")
 */
class NftController extends SymfonyAbstractController
{
    /**
     * SecurityController constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(private TranslatorInterface $translator)
    {
    }

    /**
     * @param Request $request
     * @param CreatureUserRepository $creatureUserRepository
     * @param CreatureNftContractManager $creatureNftContractManager
     * @param NftUserCreature $nftUserCreature
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/sign/creature", name="sign_creature", methods={"POST"})
     */
    public function creatures(
        Request $request,
        CreatureUserRepository $creatureUserRepository,
        CreatureNftContractManager $creatureNftContractManager,
        NftUserCreature $nftUserCreature
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('creatureId', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }

        if (empty($creatureUser = $creatureUserRepository->findOneBy(['uuid' => $data['creatureId']]))) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::CREATURE_NOT_EXIST));
        }

        /** @var CreatureUser $creatureUser */
        if ($creatureUser->getUser()->getId() !== $this->getUser()->getId()) {
            throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
        }

        $message = $nftUserCreature->toStringMessage($creatureUser);
        $signature = $creatureNftContractManager->signMint($message);

        $result = array_merge(
            [
                'signature' => $signature
            ],
            $nftUserCreature->serialize($creatureUser)
        );

        return new JsonResponse($result);
    }

    /**
     * @param Request $request
     * @param CreatureUserRepository $creatureUserRepository
     * @return JsonResponse
     *
     * @throws ORMException
     * @throws OptimisticLockException
     *
     * @Route("/creature/nft/name", name="creature_nft_name", methods={"POST"})
     */
    public function nftNameAction(
        Request $request,
        CreatureUserRepository $creatureUserRepository
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (
            !key_exists('contract', $data) ||
            !key_exists('royalties', $data) ||
            !key_exists('name', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $nft = $creatureUserRepository->findOneBy(
            [
                'contract' => $data['contract'],
            ]
        );

        if (empty($nft)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }
        /** @var CreatureUser $nft */
        if ($nft->getUser()->getId() != $this->getUser()->getId()) {
            throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
        }

        $nft->setNftName($data['name']);
        $nft->setRoyalties($data['royalties']);

        $creatureUserRepository->save($nft);

        return new JsonResponse(['status' => 'success']);
    }

    /**
     * @param Request $request
     * @param CreatureManager $creatureManager
     * @return JsonResponse
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     *
     * @Route("/creature/stake", name="stake", methods={"POST"})
     */
    public function stakeAction(Request $request, CreatureManager $creatureManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (
            !key_exists('creatureId', $data) ||
            !key_exists('stake', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $id = $creatureManager->stakeCreature($this->getUser(), $data['creatureId'], $data['stake']);

        return new JsonResponse(['creatureId' => $id]);
    }
}
