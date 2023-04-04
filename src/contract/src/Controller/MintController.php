<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Entity\Creature\CreatureUser;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class MintController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/contract", name="api_contract_")
 */
class MintController extends SymfonyAbstractController
{
    /**
     * SecurityController constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(
        private TranslatorInterface $translator
    ) {
    }

    /**
     * @param Request $request
     * @param CreatureUserRepository $creatureUserRepository
     * @param EntityManagerInterface $entityManager
     *
     * @return JsonResponse
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     * @throws JsonException
     *
     * @Route("/creature/mint", name="creature_mint", methods={"POST"})
     */
    public function mintCreature(
        Request $request,
        CreatureUserRepository $creatureUserRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        if (
            !key_exists('creatureId', $data) ||
            !key_exists('expiryTimestamp', $data) ||
            !key_exists('hash', $data) ||
            !key_exists('royalties', $data) ||
            !key_exists('name', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }

        /** @var CreatureUser $creatureUser */
        $creatureUser = $creatureUserRepository->findOneBy(['uuid' => $data['creatureId']]);

        if (null === $creatureUser) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::CREATURE_NOT_EXIST));
        }
        if ($creatureUser->getUser()->getId() !== $this->getUser()->getId()) {
            throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
        }

        $creatureUser->setNftExpiryDate((new DateTime())->setTimestamp($data['expiryTimestamp']));
        $creatureUser->setHash($data['hash']);
        $creatureUser->setRoyalties($data['royalties']);
        $creatureUser->setNftName($data['name']);

        $entityManager->flush();

        return new JsonResponse(['status' => 'success'], 200);
    }
}
