<?php

namespace App\Controller;

use App\Common\Enum\CreatureTypes;
use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureRepository;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Game\CreatureManager;
use App\DTO\CreatureSerializer;
use App\DTO\UserCreatureSerializer;
use App\Entity\Creature\Creature;
use App\Entity\Creature\CreatureUser;
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
     * @param CreatureSerializer $creatureSerializer
     * @return JsonResponse
     *
     * @Route("/creatures", name="creatures", methods={"GET"})
     */
    public function creatures(CreatureRepository $creatureRepository, CreatureSerializer $creatureSerializer): JsonResponse
    {
        $result = [];

        foreach ($creatureRepository->findBy([], ['id' => 'asc']) as $creature) {
            $result[] = $creatureSerializer->serialize($creature);
        }

        usort($result, static function ($a, $b) {
            return strcmp($a['priceUSD'], $b['priceUSD']);
        });

        return new JsonResponse($result);
    }

    /**
     * @param CreatureRepository $creatureRepository
     * @param CreatureSerializer $creatureSerializer
     * @return JsonResponse
     *
     * @Route("/register/creatures", name="creatures-register", methods={"GET"})
     */
    public function creaturesRegistration(CreatureRepository $creatureRepository, CreatureSerializer $creatureSerializer): JsonResponse
    {
        /** @var Creature[] $creatures */
        $creatures = $creatureRepository->findBy(['tier' => 1], ['id' => 'asc']);

        $isRegistration = (int)$this->getUser()?->getCreatures()->count() === 0;
        $fromReferral = (bool)$this->getUser()?->getFromReferralNft();
        $result = [];

        foreach ($creatures as $creature) {
            $creatureDTO = $creatureSerializer->serialize($creature);

            if ($isRegistration && ($fromReferral || CreatureTypes::CREATURE_TYPE_BOAR === $creature->getType())) {
                $creatureDTO['priceStacks'] = 0;
                $creatureDTO['priceGold'] = 0;
                $creatureDTO['priceUSD'] = 0;
            }

            $result[] = $creatureDTO;
        }

        usort($result, static function ($a, $b) {
            return strcmp($a['priceUSD'], $b['priceUSD']);
        });

        return new JsonResponse($result);
    }

    /**
     * @param Request $request
     * @param CreatureUserRepository $creatureUserRepository
     * @param UserCreatureSerializer $userCreatureDto
     * @return JsonResponse
     *
     * @Route("/user-creatures", name="user_creatures", methods={"GET"})
     */
    public function getUserCreatures(
        Request $request,
        CreatureUserRepository $creatureUserRepository,
        UserCreatureSerializer $userCreatureDto
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
     * @param UserCreatureSerializer $userCreatureDto
     * @param CreatureUserRepository $creatureUserRepository
     * @return JsonResponse
     *
     * @Route("/user-creatures/details/{creatureId}", name="user_creatures_details", methods={"GET"})
     */
    public function getUserCreaturesDetails(
        string $creatureId,
        UserCreatureSerializer $userCreatureDto,
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
     * @return JsonResponse
     * @throws Exception
     *
     * @Route("/buy-creature", name="buy_creature", methods={"POST"})
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
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/upgrade-creature", name="upgrade_creature", methods={"POST"})
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
     * @return JsonResponse
     *
     * @Route("/active-in-game", name="active_in_game", methods={"POST"})
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
     * @return JsonResponse
     * @throws Exception
     *
     * @Route("/upgrade/skip-waiting", name="upgrade_skip_waiting", methods={"POST"})
     *
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
