<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Service\ExperienceManager;
use App\DTO\Experience;
use App\DTO\Player;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

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
     * @param Request                $request
     * @param Player                 $playerDTO
     * @param EntityManagerInterface $entityManager
     *
     * @return JsonResponse
     *
     * @Route("/player", name="player", methods={"GET", "POST"})
     *
     * @throws \Exception
     */
    public function playerAction(Request $request, Player $playerDTO, EntityManagerInterface $entityManager): JsonResponse
    {
        if ($request->getMethod() == 'GET') {

            return new JsonResponse($playerDTO->serialize($this->getUser()->getPlayer()));
        } elseif ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            if (is_array($data)) {
                $playerDTO->unserialize($data, $this->getUser()->getPlayer());

                $entityManager->flush();

                return new JsonResponse(['status' => 'success']);
            } else {
                throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
            }
        }
    }

    /**
     * @param Request                $request
     * @param Experience             $experienceDTO
     * @param EntityManagerInterface $entityManager
     * @param ExperienceManager      $experienceManager
     *
     * @return JsonResponse
     *
     * @Route("/experience", name="experience", methods={"GET", "POST"})
     *
     * @throws \Exception
     */
    public function experienceAction(Request $request, Experience $experienceDTO, EntityManagerInterface $entityManager, ExperienceManager $experienceManager): JsonResponse
    {
        if ($request->getMethod() == 'GET') {

            return new JsonResponse($experienceDTO->serialize($this->getUser()->getPlayer()));
        } elseif ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            if (is_array($data)) {
                $experienceDTO->validate($data);
                $experienceManager->levelUp($data['Experience'], $this->getUser()->getPlayer());

                $entityManager->flush();

                return new JsonResponse(['status' => 'success']);
            } else {
                throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
            }
        }
    }
}
