<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Entity\Game\Player;
use App\Entity\Creature\CreatureUser;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use JsonException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Uid\Uuid;

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
     * @return JsonResponse
     *
     * @Route("/race/start", name="race_start", methods={"POST"})
     */
    public function actionRaceStart(): JsonResponse
    {
        // energy & creature
        return new JsonResponse(['race_id' => Uuid::v6()]);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("/race/finish", name="race_finish", methods={"POST"})
     */
    public function actionRaceFinish(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        // racePrize
        // goodJumps
        // perfectJumps
        // perfectStart - bool
        // victory - bool
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (is_array($data)) {
            $gold = 0;
            if (key_exists('racePrize', $data)) {
                $gold += (int)$data['racePrize'];
            }
//            if (key_exists('goodJumps', $data)) {
//                $gold += (int)$data['goodJumps'];
//            }
//            if (key_exists('perfectJumps', $data)) {
//                $gold += (int)$data['perfectJumps'];
//            }

            /** @var Player $player */
            $player = $this->getUser()->getPlayer();

            $player->addGold($gold);

            $entityManager->flush();

            return new JsonResponse(['status' => 'ok']);
        } else {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }
    }

    /**
     * @param User|null $user
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     * @throws JsonException
     *
     * @Route("C", name="race_finish_by_wallet_id", methods={"GET", "POST"})
     * @ParamConverter("user", options={"mapping": {"id": "wallet"}})
     */
    public function actionRaceFinishByWalletAction(?User $user, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        if (null === $user) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        }

        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        /** @var Player $player */
        $player = $this->getUser()->getPlayer();
        $player->setMaxScore($data['maxScore']);

        $entityManager->flush();

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
