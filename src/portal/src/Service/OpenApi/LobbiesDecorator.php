<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use ArrayObject;

final class LobbiesDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Lobbies'] = new ArrayObject(
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

        $pathItem = new Model\PathItem(
            ref: 'Lobby',
            get: new Model\Operation(
                     operationId: 'lobbies',
                     tags:        ['Lobby'],
                     responses:   [
                                      '200' => [
                                          'description' => 'Get all lobbies',
                                          'content' => [
                                              'application/json' => [
                                                  'schema' => [
                                                      '$ref' => '#/components/schemas/Lobbies',
                                                  ],
                                              ],
                                          ],
                                      ],
                                  ],
                     summary:     'Lobbies',
                     parameters:  [
                                      new Model\Parameter('itemsPerPage', 'query', 'How many lobby on page'),
                                      new Model\Parameter('page', 'query', 'Page number'),
                                  ],
                 ),
        );
        $openApi->getPaths()->addPath('/api/portal/lobbies', $pathItem);

        return $openApi;
    }
}
