<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserCreaturesDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['UserCreatures'] = new \ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'creatures' => [
                        'type' => 'array',
                        'example' => '[
                    {
                        "uuid": "1ec95cb9-ab25-6cb6-ab06-cbed9fc6407d",
                        "creature": {
                            "id": 19
                        },
                        "muscles": 0,
                        "lungs": 2,
                        "heart": 4,
                        "belly": 3,
                        "buttocks": 1,
                        "upgradeMusclesEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeLungsEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeHeartEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeBellyEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeButtocksEnd": "2022-02-24T23:43:44+00:00",
                        "bonus": false
                    },
                    {
                        "uuid": "1ec95cb9-ab2a-6fc2-8558-cbed9fc6407d",
                        "creature": {
                            "id": 16
                        },
                        "muscles": 0,
                        "lungs": 0,
                        "heart": 3,
                        "belly": 4,
                        "buttocks": 2,
                        "upgradeMusclesEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeLungsEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeHeartEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeBellyEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeButtocksEnd": "2022-02-24T23:43:44+00:00",
                        "bonus": false
                    },
                    {
                        "uuid": "1ec95cb9-ab30-601c-9e7b-cbed9fc6407d",
                        "creature": {
                            "id": 9
                        },
                        "muscles": 0,
                        "lungs": 1,
                        "heart": 2,
                        "belly": 0,
                        "buttocks": 0,
                        "upgradeMusclesEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeLungsEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeHeartEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeBellyEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeButtocksEnd": "2022-02-24T23:43:44+00:00",
                        "bonus": false
                    },
                    {
                        "uuid": "1ec95cb9-ab34-687e-81fd-cbed9fc6407d",
                        "creature": {
                            "id": 9
                        },
                        "muscles": 3,
                        "lungs": 2,
                        "heart": 4,
                        "belly": 2,
                        "buttocks": 4,
                        "upgradeMusclesEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeLungsEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeHeartEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeBellyEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeButtocksEnd": "2022-02-24T23:43:44+00:00",
                        "bonus": false
                    },
                    {
                        "uuid": "1ec95cb9-ab38-64a6-be5e-cbed9fc6407d",
                        "creature": {
                            "id": 17
                        },
                        "muscles": 4,
                        "lungs": 1,
                        "heart": 3,
                        "belly": 1,
                        "buttocks": 0,
                        "upgradeMusclesEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeLungsEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeHeartEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeBellyEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeButtocksEnd": "2022-02-24T23:43:44+00:00",
                        "bonus": false
                    },
                    {
                        "uuid": "1ec95cb9-ab3c-64e8-831f-cbed9fc6407d",
                        "creature": {
                            "id": 19
                        },
                        "muscles": 1,
                        "lungs": 4,
                        "heart": 1,
                        "belly": 3,
                        "buttocks": 4,
                        "upgradeMusclesEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeLungsEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeHeartEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeBellyEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeButtocksEnd": "2022-02-24T23:43:44+00:00",
                        "bonus": false
                    },
                    {
                        "uuid": "1ec95cb9-ab42-63a2-a1e0-cbed9fc6407d",
                        "creature": {
                            "id": 3
                        },
                        "muscles": 4,
                        "lungs": 4,
                        "heart": 2,
                        "belly": 3,
                        "buttocks": 3,
                        "upgradeMusclesEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeLungsEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeHeartEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeBellyEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeButtocksEnd": "2022-02-24T23:43:44+00:00",
                        "bonus": false
                    },
                    {
                        "uuid": "1ec95cb9-ab46-6768-8487-cbed9fc6407d",
                        "creature": {
                            "id": 15
                        },
                        "muscles": 0,
                        "lungs": 1,
                        "heart": 4,
                        "belly": 0,
                        "buttocks": 0,
                        "upgradeMusclesEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeLungsEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeHeartEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeBellyEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeButtocksEnd": "2022-02-24T23:43:44+00:00",
                        "bonus": false
                    },
                    {
                        "uuid": "1ec95cb9-ab4a-6b1a-b151-cbed9fc6407d",
                        "creature": {
                            "id": 12
                        },
                        "muscles": 4,
                        "lungs": 1,
                        "heart": 4,
                        "belly": 2,
                        "buttocks": 4,
                        "upgradeMusclesEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeLungsEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeHeartEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeBellyEnd": "2022-02-24T23:43:44+00:00",
                        "upgradeButtocksEnd": "2022-02-24T23:43:44+00:00",
                        "bonus": false
                    }
                ]'
                    ],
                ],
            ]
        );

        $pathItem = new Model\PathItem(
            ref: 'User Creature',
            get: new Model\Operation(
                     operationId: 'userCreatures',
                     tags:        ['Creature User'],
                     responses:   [
                                      '200' => [
                                          'description' => 'Get all creatures signed to user',
                                          'content' => [
                                              'application/json' => [
                                                  'schema' => [
                                                      '$ref' => '#/components/schemas/UserCreatures',
                                                  ],
                                              ],
                                          ],
                                      ],
                                  ],
                     summary:     'User Creature',
                 ),
        );
        $openApi->getPaths()->addPath('/api/game/user-creatures', $pathItem);

        $pathItemByWallet = new Model\PathItem(
            ref: 'User Creature',
            get: new Model\Operation(
                     operationId: 'wallet',
                     tags:        ['Creature User'],
                     responses:   [
                                      '200' => [
                                          'description' => 'Get all creatures signed to user',
                                          'content' => [
                                              'application/json' => [
                                                  'schema' => [
                                                      '$ref' => '#/components/schemas/UserCreatures',
                                                  ],
                                              ],
                                          ],
                                      ],
                                  ],
                     summary:     'User Creature by Wallet',
                     parameters:  [
                                      new Model\Parameter('id', 'path'),
                                  ],
                 ),
        );
        $openApi->getPaths()->addPath('/api/game/wallet/{id}/user-creatures', $pathItemByWallet);

        return $openApi;
    }
}
