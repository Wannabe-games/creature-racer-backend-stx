<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class StackedDecorator implements OpenApiFactoryInterface
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
        $schemas['StakeCreature'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatureId' => [
                    'type' => 'string',
                    'example' => '1eca648f-f8fb-661e-81a5-eda9b0f7948a',
                ],
                'stake' => [
                    'type' => 'bool',
                    'example' => true,
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Stake creature',
            post: new Model\Operation(
                operationId: 'stakeCreature',
                tags: ['Stake'],
                responses: [
                    '200' => [
                        'description' => 'Stacked creature',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Creature',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Stake creature',
                requestBody: new Model\RequestBody(
                    description: 'Stake creature',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StakeCreature',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/creature/stake', $pathItem);

        return $openApi;
    }
}