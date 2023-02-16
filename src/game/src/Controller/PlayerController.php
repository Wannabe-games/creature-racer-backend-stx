<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Entity\User;
use App\Service\ExperienceManager;
use App\DTO\Experience;
use App\DTO\Player;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use JsonException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PlayerController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/game", name="api_game_")
 */
class PlayerController extends SymfonyAbstractController
{
    /**
     * @param Request $request
     * @param Player $playerDTO
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     * @throws Exception
     *
     * @Route("/player", name="player", methods={"GET", "POST"})
     */
    public function playerAction(Request $request, Player $playerDTO, EntityManagerInterface $entityManager): JsonResponse
    {
        if ($request->getMethod() === 'GET') {
            return new JsonResponse($playerDTO->serialize($this->getUser()->getPlayer()));
        }

        if ($request->getMethod() === 'POST') {
            $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

            if (is_array($data)) {
                $playerDTO->unserialize($data, $this->getUser()->getPlayer());

                $entityManager->flush();

                return new JsonResponse(['status' => 'success']);
            }
        }

        throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
    }

    /**
     * @param User|null $user
     * @param Request $request
     * @param Player $playerDTO
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/wallet/{id}/player", name="player_by_wallet_id", methods={"GET", "POST"})
     * @ParamConverter("user", options={"mapping": {"id": "wallet"}})
     */
    public function playerByWalletAction(?User $user, Request $request, Player $playerDTO, EntityManagerInterface $entityManager): JsonResponse
    {
        if (null === $user) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        if ($request->getMethod() === 'GET') {
            return new JsonResponse($playerDTO->serialize($user->getPlayer()));
        }

        if ($request->getMethod() === 'POST') {
            $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

            if (is_array($data)) {
                $playerDTO->unserialize($data, $user->getPlayer());

                $entityManager->flush();

                return new JsonResponse(['status' => 'success']);
            }
        }

        throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
    }

    /**
     * @param Request $request
     * @param Experience $experienceDTO
     * @param EntityManagerInterface $entityManager
     * @param ExperienceManager $experienceManager
     * @return JsonResponse
     * @throws Exception
     *
     * @Route("/experience", name="experience", methods={"GET", "POST"})
     */
    public function experienceAction(Request $request, Experience $experienceDTO, EntityManagerInterface $entityManager, ExperienceManager $experienceManager): JsonResponse
    {
        if ($request->getMethod() === 'GET') {
            return new JsonResponse($experienceDTO->serialize($this->getUser()->getPlayer()));
        }

        if ($request->getMethod() === 'POST') {
            $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

            if (is_array($data)) {
                $experienceDTO->validate($data);
                $experienceManager->levelUp($data['Experience'], $this->getUser()->getPlayer());

                $entityManager->flush();

                return new JsonResponse(['status' => 'success']);
            }
        }

        throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     *
     * @throws JsonException
     * @Route("/buy-gold", name="buy_gold", methods={"POST"})
     */
    public function buyGoldAction(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (!array_key_exists('gold', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $this->getUser()->getPlayer()->setGold($this->getUser()->getPlayer()->getGold() + $data['gold']);

        $entityManager->flush();

        return new JsonResponse(['status' => 'success']);
    }
}
