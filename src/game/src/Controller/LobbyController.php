<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Game\LobbyRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\DTO\LobbySerializer;
use App\Entity\Game\Lobby;
use App\Entity\User;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use JsonException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CreaturesController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/game", name="api_game_")
 */
class LobbyController extends SymfonyAbstractController
{
    public const API_MAX_PER_PAGE_DEFAULT = 20;

    /**
     * @param Request $request
     * @param LobbyRepository $lobbyRepository
     * @param LobbySerializer $lobbySerializer
     * @return JsonResponse
     * @throws NoResultException
     * @throws NonUniqueResultException
     *
     * @Route("/user-lobbies", name="user_lobbies", methods={"GET"})
     */
    public function getUserLobbies(
        Request $request,
        LobbyRepository $lobbyRepository,
        LobbySerializer $lobbySerializer
    ): JsonResponse {
        return $this->getUserLobbiesByUser($this->getUser(), $request, $lobbyRepository, $lobbySerializer);
    }

    /**
     * @param Lobby|null $lobby
     * @param LobbySerializer $lobbySerializer
     *
     * @return JsonResponse
     *
     * @Route("/user-lobbies/{id}", name="user_lobby_details", methods={"GET"})
     */
    public function getUserLobbyDetails(
        ?Lobby $lobby,
        LobbySerializer $lobbySerializer
    ): JsonResponse {
        if (null === $lobby || $this->getUser() !== $lobby->getHost()) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        return new JsonResponse($lobbySerializer->serialize($lobby));
    }

    /**
     * @param Request $request
     * @param LobbyRepository $lobbyRepository
     * @param LobbySerializer $lobbySerializer
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/user-lobbies", name="user_lobby_create", methods={"POST"})
     */
    public function createUserLobby(
        Request $request,
        LobbyRepository $lobbyRepository,
        LobbySerializer $lobbySerializer
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('betAmount', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        if (1000000 > $data['betAmount']) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::TOO_LOW_RATE));
        }

        $lobby = new Lobby();
        $lobby->setHost($this->getUser());
        $lobby->setBetAmount($data['betAmount']);

        $lobbyRepository->save($lobby);

        return new JsonResponse($lobbySerializer->serialize($lobby));
    }

    /**
     * @param User|null $user
     * @param Request $request
     * @param LobbyRepository $lobbyRepository
     * @param LobbySerializer $lobbySerializer
     * @return JsonResponse
     * @throws NoResultException
     * @throws NonUniqueResultException
     *
     * @Route("/wallet/{id}/user-lobbies", name="user_lobbies_by_wallet_id", methods={"GET"})
     * @ParamConverter("user", options={"mapping": {"id": "wallet"}})
     */
    public function getUserLobbiesByUser(
        ?User $user,
        Request $request,
        LobbyRepository $lobbyRepository,
        LobbySerializer $lobbySerializer
    ): JsonResponse {
        if (null === $user) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::WALLET_NOT_EXIST));
        }

        $serializedLobby = [];

        $page = $request->query->getInt('page', 1);
        $itemsPerPage = $request->query->getInt('itemsPerPage', self::API_MAX_PER_PAGE_DEFAULT);

        /** @var Lobby[] $lobbyForUser */
        $lobbyForUser = $lobbyRepository->getLobbiesForUser(
            user:   $user,
            offset: $page ? ($page - 1) * $itemsPerPage : null,
            limit:  $itemsPerPage
        );

        foreach ($lobbyForUser as $lobby) {
            $serializedLobby[] = $lobbySerializer->serialize($lobby);
        }

        $result['lobbies'] = $serializedLobby;
        $result['maxResults'] = $lobbyRepository->countLobbiesForUser($user);

        return new JsonResponse($result);
    }

    /**
     * @param Request $request
     * @param LobbyRepository $lobbyRepository
     * @param LobbySerializer $lobbyDto
     * @return JsonResponse
     * @throws NoResultException
     * @throws NonUniqueResultException
     *
     * @Route("/lobbies", name="lobbies", methods={"GET"})
     */
    public function getLobbies(
        Request $request,
        LobbyRepository $lobbyRepository,
        LobbySerializer $lobbyDto
    ): JsonResponse {
        $serializedLobby = [];

        $page = $request->query->getInt('page', 1);
        $itemsPerPage = $request->query->getInt('itemsPerPage', self::API_MAX_PER_PAGE_DEFAULT);

        /** @var Lobby[] $lobbyForUser */
        $lobbyForUser = $lobbyRepository->getLobbies(
            offset: $page ? ($page - 1) * $itemsPerPage : null,
            limit:  $itemsPerPage
        );

        foreach ($lobbyForUser as $lobby) {
            $serializedLobby[] = $lobbyDto->serialize($lobby);
        }

        $result['lobbies'] = $serializedLobby;
        $result['maxResults'] = $lobbyRepository->countLobbies();

        return new JsonResponse($result);
    }

    /**
     * @param Lobby|null $lobby
     * @param LobbySerializer $lobbyDto
     * @return JsonResponse
     *
     * @Route("/lobbies/{id}", name="lobby_details", methods={"GET"})
     */
    public function getLobbyDetails(
        ?Lobby $lobby,
        LobbySerializer $lobbyDto
    ): JsonResponse {
        if (null === $lobby) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        return new JsonResponse($lobbyDto->serialize($lobby));
    }

    /**
     * @param Request $request
     * @param UserRepository $userRepository
     * @param LobbyRepository $lobbyRepository
     * @param LobbySerializer $lobbyDto
     * @param Lobby $lobby
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/lobbies/{id}", name="user_lobby_update", methods={"PUT"})
     */
    public function updateUserLobby(
        Request $request,
        UserRepository $userRepository,
        LobbyRepository $lobbyRepository,
        LobbySerializer $lobbyDto,
        Lobby $lobby
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('opponentId', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $opponent = $userRepository->find($data['opponentId']);

        if (null === $opponent) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $lobby->setOpponent($opponent);

        $lobbyRepository->save($lobby);

        return new JsonResponse($lobbyDto->serialize($lobby));
    }
}
