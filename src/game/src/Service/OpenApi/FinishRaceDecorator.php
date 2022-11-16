<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class FinishRaceDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['FinishRaceResponse'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'example' => 'ok',
                ],
            ],
        ]);
        $schemas['FinishRaceRequest'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'race_id' => [
                    'type' => 'string',
                    'example' => 'NQwyegfnxYGWQEfngx83274rgtx8nf2g',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Race Finish',
            post: new Model\Operation(
                operationId: 'raceFinish',
                tags: ['Race'],
                responses: [
                    '200' => [
                        'description' => 'Finish the Race',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/FinishRaceResponse',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Race finish',
                requestBody: new Model\RequestBody(
                    description: 'Race finish',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/FinishRaceRequest',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/game/race/finish', $pathItem);

        return $openApi;
    }
}