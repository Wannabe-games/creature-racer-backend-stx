<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureRepository;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\Game\CreatureManager;
use App\DTO\Creature;
use App\DTO\UserCreature;
use App\DTO\UserCreatureFilters;
use App\Entity\Creature\CreatureUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class FiltersController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/portal", name="api_portal_")
 */
class FiltersController extends SymfonyAbstractController
{
    public const API_MAX_PER_PAGE_DEFAULT = 20;

    /**
     * @param Request                $request
     * @param UserCreature           $userCreatureDto
     * @param CreatureUserRepository $creatureUserRepository
     * @param UserCreatureFilters    $userCreatureFilters
      *
     * @return JsonResponse
     *
     * @Route("/query/user-creatures", name="query_user_creatures", methods={"POST"})
     */
    public function getUserCreaturesNft(
        Request $request,
        UserCreature $userCreatureDto,
        CreatureUserRepository $creatureUserRepository,
        UserCreatureFilters $userCreatureFilters
    ): JsonResponse {
        $result = [];
        $data = json_decode($request->getContent(), true);

        if (!$userCreatureFilters->validate($data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }

        $page = $request->query->getInt('page', 1);
        $itemsPerPage = $request->query->getInt('itemsPerPage', self::API_MAX_PER_PAGE_DEFAULT);

        $creatures = $creatureUserRepository->nftFilter(
            $data['isForUser'] ? $this->getUser() : null,
            $data['tier'],
            $data['cohort'],
            $data['type'],
            $data['muscles'],
            $data['lungs'],
            $data['heart'],
            $data['belly'],
            $data['buttocks'],
            $data['isExpiredSoon'],
            $page ? ($page - 1) * $itemsPerPage : null,
            $itemsPerPage
        );

        /** @var CreatureUser $creatureUser */
        foreach ($creatures as $creatureUser) {
            $result[] = $userCreatureDto->serialize($creatureUser);
        }

        return new JsonResponse($result);
    }
}
