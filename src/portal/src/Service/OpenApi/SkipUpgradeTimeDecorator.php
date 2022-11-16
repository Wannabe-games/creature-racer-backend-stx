<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class SkipUpgradeTimeDecorator implements OpenApiFactoryInterface
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
        $schemas['SkipUpgradeTime'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatureId' => [
                    'type' => 'string',
                    'example' => '1eca648f-f8fb-661e-81a5-eda9b0f7948a',
                ],
                'upgradeType' => [
                    'type' => 'string',
                    'example' => 'lungs',
                ],
                'hash' => [
                    'type' => 'string',
                    'example' => 'WNGfiwgxf9imwg4fxiymbIYWMgxiyWMGIxmgfIWGMeixfumwitx',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Skim upgrade time',
            post: new Model\Operation(
                operationId: 'skipUpgradeTime',
                tags: ['Creature'],
                responses: [
                    '200' => [
                        'description' => 'Creature to skip',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Creature',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Skim upgrade time',
                requestBody: new Model\RequestBody(
                    description: 'Date to skip',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/SkipUpgradeTime',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/portal/upgrade/skip-waiting', $pathItem);

        return $openApi;
    }
}