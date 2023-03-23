<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use ArrayObject;

final class StartRaceDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['StartRaceRequest'] = new ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'creatureUserId' => [
                        'type' => 'string',
                        'example' => '1ed7316c-2785-67ea-b498-cf8120af741f',
                    ],
                    'lobbyId' => [
                        'type' => 'string',
                        'example' => '1ec95cb9-ab25-6cb6-ab06-cbed9fc6407d',
                    ],
                ],
            ]
        );
        $schemas['StartRaceResponse'] = new ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'raceId' => [
                        'type' => 'string',
                        'example' => '1ec95cb9-ab25-6cb6-ab06-cbed9fc6407d',
                    ],
                ],
            ]
        );

        $pathItem = new Model\PathItem(
            ref:  'Race Start',
            post: new Model\Operation(
                      operationId: 'raceStart',
                      tags:        ['Race'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Start the Race',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/StartRaceResponse',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Race start',
                      requestBody: new Model\RequestBody(
                                       description: 'Race start',
                                       content:     new ArrayObject([
                                                                        'application/json' => [
                                                                            'schema' => [
                                                                                '$ref' => '#/components/schemas/StartRaceRequest',
                                                                            ],
                                                                        ],
                                                                    ]),
                                   ),
                  ),
        );
        $openApi->getPaths()->addPath('/api/game/race/start', $pathItem);

        return $openApi;
    }
}
