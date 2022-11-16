<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class ActiveInGameDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Creature'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatureId' => [
                    'type' => 'string',
                    'example' => '1eca648f-f8fb-661e-81a5-eda9b0f7948a',
                ],
            ],
        ]);
        $schemas['ActiveInGame'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatureId' => [
                    'type' => 'string',
                    'example' => '1eca648f-f8fb-661e-81a5-eda9b0f7948a',
                ],
                'isActive' => [
                    'type' => 'bool',
                    'example' => true,
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Active in game',
            post: new Model\Operation(
                operationId: 'activeInGame',
                tags: ['Creature'],
                responses: [
                    '200' => [
                        'description' => 'Creature to active',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Creature',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Active in game',
                requestBody: new Model\RequestBody(
                    description: 'Active in game data',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/ActiveInGame',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/portal/active-in-game', $pathItem);

        return $openApi;
    }
}