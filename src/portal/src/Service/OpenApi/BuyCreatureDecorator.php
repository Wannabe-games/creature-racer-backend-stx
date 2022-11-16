<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class BuyCreatureDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Status'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatureId' => [
                    'type' => 'string',
                    'example' => '1eca648f-f8fb-661e-81a5-eda9b0f7948a',
                ],
            ],
        ]);
        $schemas['CreatureBuy'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'example' => 'boar',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Buy Creature',
            post: new Model\Operation(
                operationId: 'statusBuy',
                tags: ['Creature'],
                responses: [
                    '200' => [
                        'description' => 'Buy creature',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Status',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Buy creature',
                requestBody: new Model\RequestBody(
                    description: 'Buy creature',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/CreatureBuy',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/portal/buy-creature', $pathItem);

        return $openApi;
    }
}