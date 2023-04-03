<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\DTO\UserCreatureSerializer;
use App\DTO\UserCreatureFilter;
use App\Entity\Creature\CreatureUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
     * @param Request $request
     * @param UserCreatureSerializer $userCreatureDto
     * @param CreatureUserRepository $creatureUserRepository
     * @param UserCreatureFilter $userCreatureFilters
     *
     * @return JsonResponse
     *
     * @Route("/query/user-creatures", name="query_user_creatures", methods={"POST"})
     */
    public function getUserCreaturesNft(
        Request $request,
        UserCreatureSerializer $userCreatureDto,
        CreatureUserRepository $creatureUserRepository,
        UserCreatureFilter $userCreatureFilters
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
