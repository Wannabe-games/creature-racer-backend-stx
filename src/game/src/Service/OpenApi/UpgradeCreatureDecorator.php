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

        $schemas['Status'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'example' => 'You don\'t have enough gold',
                    'readOnly' => true,
                ],
            ],
        ]);
        $schemas['CreatureUpgrade'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'example' => 'muscles',
                ],
                'level' => [
                    'type' => 'int',
                    'example' => '2',
                ],
                'creature_user_id' => [
                    'type' => 'int',
                    'example' => '23',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Upgrade Creature',
            post: new Model\Operation(
                operationId: 'statusUpgrade',
                tags: ['Creature User'],
                responses: [
                    '200' => [
                        'description' => 'Upgrade creature',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Status',
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
        $openApi->getPaths()->addPath('/api/game/upgrade-creature', $pathItem);

        return $openApi;
    }
}