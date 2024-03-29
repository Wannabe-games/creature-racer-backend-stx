<?php

namespace App\Controller;

use App\Common\Enum\SystemTypes;
use App\Common\Exception\Api\ApiException;
use App\Common\Repository\SettingsRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Entity\Settings;
use App\Enum\DefaultSettings;
use JsonException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyAbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class SettingsController
 *
 * @package App\Controller\Api
 *
 * @Route(path="/api/game", name="api_game_")
 */
class SettingsController extends SymfonyAbstractController
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
     * @param SettingsRepository $settingsRepository
     *
     * @return JsonResponse
     *
     * @Route("/settings", name="settings", methods={"GET"})
     */
    public function getSetting(SettingsRepository $settingsRepository): JsonResponse
    {
        /** @var Settings $settings */
        $settings = $settingsRepository->findOneBy([
            'systemType' => SystemTypes::GAME_SETTINGS,
        ]);

        if (!empty($settings)) {
            return new JsonResponse($settings->getValue());
        } else {
            return new JsonResponse(DefaultSettings::SETTINGS, 200, [], true);
        }
    }

    /**
     * @param SettingsRepository $settingsRepository
     *
     * @return JsonResponse
     *
     * @Route("/settings-parse", name="settings_parse", methods={"GET"})
     */
    public function parseSettings(SettingsRepository $settingsRepository): JsonResponse
    {
        /** @var Settings $settings */
        $settings = $settingsRepository->findOneBy([
            'systemType' => SystemTypes::GAME_SETTINGS,
        ]);

        if (!empty($settings)) {
            return new JsonResponse($settings->getValue()['Animals']);
        } else {
            $data = json_decode(DefaultSettings::SETTINGS, true);

            return new JsonResponse($data['Animals']);
        }
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws ContainerExceptionInterface
     * @throws JsonException
     * @throws NotFoundExceptionInterface
     *
     * @Route("/social-media", name="social_media", methods={"GET","POST"})
     */
    public function socialMediaAction(Request $request): JsonResponse
    {
        if ($request->getMethod() === 'POST' && $this->getParameter('app_env') === 'dev') {
            $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

            file_put_contents('social-media.json', json_encode($data, JSON_THROW_ON_ERROR));

            return new JsonResponse(['status' => 'saved']);
        } elseif ($request->getMethod() === 'GET') {
            $data = json_decode(file_get_contents('social-media.json'), false, 512, JSON_THROW_ON_ERROR);

            if (empty($data)) {
                throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::NOT_FOUND));
            }

            return new JsonResponse($data);
        }
    }
}
