<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureRepository;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Game\CreatureManager;
use App\DTO\Creature;
use App\DTO\UserCreature;
use App\Entity\Creature\CreatureUser;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Exception;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CreaturesController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/portal", name="api_portal_")
 */
class CreaturesController extends SymfonyAbstractController
{
    public const API_MAX_PER_PAGE_DEFAULT = 20;

    /**
     * @param CreatureRepository $creatureRepository
     * @param Creature $creatureDTO
     *
     * @return JsonResponse
     *
     * @Route("/creatures", name="creatures", methods={"GET"})
     */
    public function creatures(CreatureRepository $creatureRepository, Creature $creatureDTO): JsonResponse
    {
        $result = [];

        foreach ($creatureRepository->findBy([], ['id' => 'asc']) as $creature) {
            $result[] = $creatureDTO->serialize($creature);
        }

        return new JsonResponse($result);
    }

    /**
     * @param CreatureRepository $creatureRepository
     * @param Creature $creatureDTO
     *
     * @return JsonResponse
     *
     * @Route("/register/creatures", name="creatures-register", methods={"GET"})
     */
    public function creaturesRegistration(CreatureRepository $creatureRepository, Creature $creatureDTO): JsonResponse
    {
        $result = [];
        $creatures = $creatureRepository->findBy(
            [
                'tier' => 1,
            ]
        );

        foreach ($creatures as $creature) {
            $result[] = $creatureDTO->serialize($creature);
        }

        return new JsonResponse($result);
    }

    /**
     * @param Request $request
     * @param CreatureUserRepository $creatureUserRepository
     * @param UserCreature $userCreatureDto
     *
     * @return JsonResponse
     *
     * @Route("/user-creatures", name="user_creatures", methods={"GET"})
     */
    public function getUserCreatures(
        Request $request,
        CreatureUserRepository $creatureUserRepository,
        UserCreature $userCreatureDto
    ): JsonResponse {
        $resultCreatures = [];

        $page = $request->query->getInt('page', 1);
        $itemsPerPage = $request->query->getInt('itemsPerPage', self::API_MAX_PER_PAGE_DEFAULT);

        $creatures = $creatureUserRepository->getCreatureUserForUser(
            user:   $this->getUser(),
            offset: $page ? ($page - 1) * $itemsPerPage : null,
            limit:  $itemsPerPage
        );

        /** @var CreatureUser $creatureUser */
        foreach ($creatures as $creatureUser) {
            $resultCreatures[] = $userCreatureDto->serialize($creatureUser);
        }

        $result['creatures'] = $resultCreatures;
        $result['mintPrice'] = $this->getParameter('mint_price');
        $result['maxResults'] = $this->getUser()->getCreatures()->count();

        return new JsonResponse($result);
    }

    /**
     * @param string $creatureId
     * @param UserCreature $userCreatureDto
     * @param CreatureUserRepository $creatureUserRepository
     *
     * @return JsonResponse
     *
     * @Route("/user-creatures/details/{creatureId}", name="user_creatures_details", methods={"GET"})
     */
    public function getUserCreaturesDetails(
        string $creatureId,
        UserCreature $userCreatureDto,
        CreatureUserRepository $creatureUserRepository
    ): JsonResponse {
        if (empty($creatureUser = $creatureUserRepository->findOneBy(['uuid' => $creatureId]))) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::CREATURE_NOT_EXIST));
        }
        /** @var CreatureUser $creatureUser */
        if (
            $creatureUser->getUser()->getId() != $this->getUser()->getId() ||
            $creatureUser->isStaked()
        ) {
            throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
        }

        return new JsonResponse(['creature' => $userCreatureDto->serializeDetails($creatureUser)]);
    }

    /**
     * @param Request $request
     * @param CreatureManager $creatureManager
     *
     * @return JsonResponse
     *
     * @Route("/buy-creature", name="buy_creature", methods={"POST"})
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function buyCreatureAction(Request $request, CreatureManager $creatureManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (
            !key_exists('type', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $id = $creatureManager->buyCreature($this->getUser(), $data['type']);

        return new JsonResponse(['creatureId' => $id]);
    }

    /**
     * @param Request $request
     * @param CreatureManager $creatureManager
     *
     * @return JsonResponse
     *
     * @Route("/upgrade-creature", name="upgrade_creature", methods={"POST"})
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     * @throws JsonException
     */
    public function upgradeAction(Request $request, CreatureManager $creatureManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (
            !key_exists('creatureId', $data) ||
            !key_exists('type', $data) ||
            !key_exists('level', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $id = $creatureManager->upgradeCreature($this->getUser(), $data['creatureId'], $data['type'], $data['level']);

        return new JsonResponse(['creatureId' => $id]);
    }

    /**
     * @param Request $request
     * @param CreatureManager $creatureManager
     *
     * @return JsonResponse
     *
     * @Route("/active-in-game", name="active_in_game", methods={"POST"})
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function activeInGameAction(Request $request, CreatureManager $creatureManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (
            !key_exists('creatureId', $data) ||
            !key_exists('isActive', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $id = $creatureManager->activeCreatureInGame($this->getUser(), $data['creatureId'], $data['isActive']);

        return new JsonResponse(['creatureId' => $id]);
    }

    /**
     * @param Request $request
     * @param CreatureManager $creatureManager
     *
     * @return JsonResponse
     *
     * @Route("/upgrade/skip-waiting", name="upgrade_skip_waiting", methods={"POST"})
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     * @throws Exception
     */
    public function skipWaitingTime(Request $request, CreatureManager $creatureManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (
            !key_exists('creatureId', $data) ||
            !key_exists('upgradeType', $data) ||
            !key_exists('hash', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        if ($data['upgradeType'] == 'all') {
            $id = $creatureManager->skipAllUpgradeTime($this->getUser(), $data['creatureId'], $data['upgradeType']);
        } else {
            $id = $creatureManager->skipUpgradeTime($this->getUser(), $data['creatureId'], $data['upgradeType']);
        }

        return new JsonResponse(['creatureId' => $id]);
    }
}
