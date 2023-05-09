<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use ArrayObject;

final class UserLobbiesDetailsDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

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

        $pathItem = new Model\PathItem(
            ref: 'User Lobby',
            get: new Model\Operation(
                     operationId: 'userLobbyDetails',
                     tags:        ['Lobby'],
                     responses:   [
                                      '200' => [
                                          'description' => 'Get all lobbies signed to user',
                                          'content' => [
                                              'application/json' => [
                                                  'schema' => [
                                                      '$ref' => '#/components/schemas/UserLobbyDetails',
                                                  ],
                                              ],
                                          ],
                                      ],
                                  ],
                     summary:     'User Lobby',
                     parameters:  [
                                      new Model\Parameter('id', 'path', 'Lobby id'),
                                  ],
                 ),
        );
        $openApi->getPaths()->addPath('/api/portal/user-lobbies/{id}', $pathItem);

        return $openApi;
    }
}
