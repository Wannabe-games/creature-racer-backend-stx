<?php

namespace App\Controller;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Entity\Creature\CreatureUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use App\Common\Service\User\UserManager;
use App\Common\Repository\UserRepository;
use App\Entity\User;

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
    ) { }

    /**
     * @param Request                $request
     * @param CreatureUserRepository $creatureUserRepository
     * @param EntityManagerInterface $entityManager
     *
     * @return JsonResponse
     *
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @Route("/creature/mint", name="creature_mint", methods={"POST"})
     */
    public function mintCreature(
        Request $request,
        CreatureUserRepository $creatureUserRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (
            !key_exists('creatureId', $data) ||
            !key_exists('hash', $data) ||
            !key_exists('contract', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
        } else {
            /** @var CreatureUser $creatureUser */
            $creatureUser = $creatureUserRepository->findOneBy(['uuid' => $data['creatureId']]);

            if (empty($creatureUser)) {
                throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::CREATURE_NOT_EXIST));
            }
            if ($creatureUser->getUser()->getId() != $this->getUser()->getId()) {
                throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
            }
        }

        if ($creatureUser->getContract() == $data['contract']) {
            $creatureUser->setHash($data['hash']);

            $entityManager->flush();

            return new JsonResponse(['status' => 'success'],200);
        } else {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::ACCESS_DENY));
        }
    }
}
