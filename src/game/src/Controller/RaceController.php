<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Entity\Game\Player;
use App\Entity\Creature\CreatureUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Uid\Uuid;
use Symfony\Contracts\Translation\TranslatorInterface;

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
     * @var TranslatorInterface
     */
    private TranslatorInterface $translator;

    /**
     * SecurityController constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

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
     * @param Request                $request
     * @param EntityManagerInterface $entityManager
     *
     * @return JsonResponse
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
        $data = json_decode($request->getContent(), true);

        if (is_array($data)) {
            $softCurrency = 0;
            if (key_exists('racePrize', $data)) {
                $softCurrency += (int)$data['racePrize'];
            }
//            if (key_exists('goodJumps', $data)) {
//                $softCurrency += (int)$data['goodJumps'];
//            }
//            if (key_exists('perfectJumps', $data)) {
//                $softCurrency += (int)$data['perfectJumps'];
//            }

            /** @var Player $player */
            $player = $this->getUser()->getPlayer();

            $player->addSoftCurrency($softCurrency);

            $entityManager->flush();

            return new JsonResponse(['status' => 'ok']);
        } else {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }
    }

    /**
     * @param SerializerInterface $serializer
     *
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
