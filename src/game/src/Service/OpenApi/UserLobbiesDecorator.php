<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use ArrayObject;

final class UserLobbiesDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['UserLobbies'] = new ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'lobbies' => [
                        'type' => 'array',
                        'example' => '[
                            {
                              "id": "1edeebfa-db1c-6b0a-906b-35677146b5ab",
                              "host": {
                                "id": 1,
                                "name": "user@test.pl",
                                "avatar": "",
                                "score": null
                              },
                              "opponent": null,
                              "winnerId": null,
                              "betAmount": 10000000,
                              "createdAt": 1683674253,
                              "timeleft": 1683760653,
                              "status": "created"
                            }
                        ]'
                    ],
                    'maxResults' => [
                        'type' => 'int',
                        'example' => 10
                    ],
                ],
            ]
        );

        $schemas['UserLobbyDetails'] = new ArrayObject(
            [
                'type' => 'object',
                'example' => '{
                    "id": "1edeebfa-db1c-6b0a-906b-35677146b5ab",
                    "host": {
                    "id": 1,
                    "name": "user@test.pl",
                    "avatar": "",
                    "score": null
                    },
                    "opponent": null,
                    "winnerId": null,
                    "betAmount": 10000000,
                    "createdAt": 1683674253,
                    "timeleft": 1683760653,
                    "status": "created"
                }'
            ]
        );


        $schemas['UserLobbiesCreate'] = new ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'betAmount' => [
                        'type' => 'int',
                        'example' => 10000000,
                    ],
                ],
            ]
        );

        $pathItem = new Model\PathItem(
            ref:  'User Lobby',
            get:  new Model\Operation(
                      operationId: 'userLobbies',
                      tags:        ['Lobby'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Get all lobbies signed to user',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/UserLobbies',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'User Lobby',
                      parameters:  [
                                       new Model\Parameter('itemsPerPage', 'query', 'How many lobby on page'),
                                       new Model\Parameter('page', 'query', 'Page number'),
                                   ],
                  ),
            post: new Model\Operation(
                      operationId: 'lobbyCreate',
                      tags:        ['Lobby'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Create lobby',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/UserLobbyDetails',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Create lobby',
                      requestBody: new Model\RequestBody(
                                       description: 'Create lobby',
                                       content:     new ArrayObject(
                                                        [
                                                            'application/json' => [
                                                                'schema' => [
                                                                    '$ref' => '#/components/schemas/UserLobbiesCreate',
                                                                ],
                                                            ],
                                                        ]
                                                    ),
                                   ),
                  ),
        );
        $openApi->getPaths()->addPath('/api/game/user-lobbies', $pathItem);

        $pathItemByWallet = new Model\PathItem(
            ref: 'User Creature',
            get: new Model\Operation(
                     operationId: 'userLobbiesGetByWallet',
                     tags:        ['Lobby'],
                     responses:   [
                                      '200' => [
                                          'description' => 'Get all lobbies signed to user',
                                          'content' => [
                                              'application/json' => [
                                                  'schema' => [
                                                      '$ref' => '#/components/schemas/UserLobbies',
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
        $openApi->getPaths()->addPath('/api/game/wallet/{id}/user-lobbies', $pathItemByWallet);

        return $openApi;
    }
}
