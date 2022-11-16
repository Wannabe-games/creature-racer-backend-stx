<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class StartRaceDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['StartRaceRequest'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'user_id' => [
                    'type' => 'int',
                    'example' => 1233,
                ],
                'creature_user_id' => [
                    'type' => 'int',
                    'example' => 12312,
                ],
            ],
        ]);
        $schemas['StartRaceResponse'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'race_id' => [
                    'type' => 'string',
                    'example' => 'NQwyegfnxYGWQEfngx83274rgtx8nf2g',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Race Start',
            post: new Model\Operation(
                operationId: 'raceStart',
                tags: ['Race'],
                responses: [
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
                summary: 'Race start',
                requestBody: new Model\RequestBody(
                    description: 'Race start',
                    content: new \ArrayObject([
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