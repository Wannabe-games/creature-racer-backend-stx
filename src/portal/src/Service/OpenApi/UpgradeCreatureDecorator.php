<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UpgradeCreatureDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['responseCreatureId'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatureId' => [
                    'type' => 'string',
                    'example' => 'daw4s48f-f8fb-661e-81a5-eda932f7948a',
                ],
            ],
        ]);
        $schemas['CreatureUpgrade'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatureId' => [
                    'type' => 'string',
                    'example' => '1eca648f-f8fb-661e-81a5-eda9b0f7948a',
                ],
                'type' => [
                    'type' => 'string',
                    'example' => 'muscles',
                ],
              ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Upgrade Creature',
            post: new Model\Operation(
                operationId: 'statusUpgrade',
                tags: ['Creature'],
                responses: [
                    '200' => [
                        'description' => 'Upgrade creature',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/responseCreatureId',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Upgrade creature',
                requestBody: new Model\RequestBody(
                    description: 'Upgrade creature',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/CreatureUpgrade',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/portal/upgrade-creature', $pathItem);

        return $openApi;
    }
}
