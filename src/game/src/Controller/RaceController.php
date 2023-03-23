<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Repository\Game\LobbyRepository;
use App\Common\Repository\Game\RaceRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Entity\Game\Player;
use App\Entity\Creature\CreatureUser;
use App\Entity\Game\Race;
use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use JsonException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class RaceController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/game", name="api_game_")
 */
class RaceController extends SymfonyAbstractController
{
    /**
     * @param Request $request
     * @param CreatureUserRepository $creatureUserRepository
     * @param LobbyRepository $lobbyRepository
     * @param RaceRepository $raceRepository
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/race/start", name="race_start", methods={"POST"})
     */
    public function actionRaceStart(
        Request $request,
        CreatureUserRepository $creatureUserRepository,
        LobbyRepository $lobbyRepository,
        RaceRepository $raceRepository
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('creatureUserId', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }

        if (!($creatureUser = $creatureUserRepository->findOneBy(['uuid' => $data['creatureUserId']]))) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::CREATURE_NOT_EXIST));
        }

        if (isset($data['lobbyId']) && !($lobby = $lobbyRepository->findOneBy(['uuid' => $data['lobbyId']]))) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::LOBBY_NOT_EXIST));
        }

        $race = new Race();
        $race->setCreatureUser($creatureUser);
        $race->setLobby($lobby ?? null);
        $raceRepository->save($race);

        return new JsonResponse(['raceId' => $race->getId()]);
    }

    /**
     * @param Request $request
     * @param RaceRepository $raceRepository
     * @return JsonResponse
     * @throws JsonException
     * @Route("/race/finish", name="race_finish", methods={"POST"})
     */
    public function actionRaceFinish(
        Request $request,
        RaceRepository $raceRepository
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('raceId', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }
        /** @var $race Race */
        if (!($race = $raceRepository->find($data['raceId']))) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::CREATURE_NOT_EXIST));
        }

        if (array_key_exists('betScore', $data)) {
            $race->setScore($data['betScore']);
        }

        $race->setFinishedAt(new DateTime());

        /** @var Player $player */
        $player = $this->getUser()->getPlayer();
        $player->addGold($data['maxScore'] ?? 0);

        $raceRepository->flush();

        return new JsonResponse(['status' => 'ok']);
    }

    /**
     * @param User|null $user
     * @param Request $request
     * @param RaceRepository $raceRepository
     * @return JsonResponse
     * @throws JsonException
     * @Route("/wallet/{id}/race/finish", name="race_finish_by_wallet_id", methods={"GET", "POST"})
     * @ParamConverter("user", options={"mapping": {"id": "wallet"}})
     */
    public function actionRaceFinishByWalletAction(
        ?User $user,
        Request $request,
        RaceRepository $raceRepository
    ): JsonResponse {
        if (null === $user) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('raceId', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }
        /** @var $race Race */
        if (!($race = $raceRepository->find($data['raceId']))) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::CREATURE_NOT_EXIST));
        }

        if (array_key_exists('betScore', $data)) {
            $race->setScore($data['betScore']);
        }

        $race->setFinishedAt(new DateTime());

        /** @var Player $player */
        $player = $this->getUser()->getPlayer();
        $player->addGold($data['maxScore'] ?? 0);

        $raceRepository->flush();

        return new JsonResponse(['status' => 'ok']);
    }

    /**
     * @param SerializerInterface $serializer
     * @return JsonResponse
     *
     * @Route("/user-creatures", name="user_creatures", methods={"GET"})
     */
    public function getUserCreatures(SerializerInterface $serializer): JsonResponse
    {
        $result = [];

        /** @var CreatureUser $creatureUser */
        foreach ($this->getUser()->getCreatures() as $creatureUser) {
            if ($creatureUser->isForGame()) {
                $result[] = $creatureUser;
            }
        }

        return new JsonResponse($serializer->serialize($result, 'json', ['groups' => 'api']), 200, [], true);
    }
}
