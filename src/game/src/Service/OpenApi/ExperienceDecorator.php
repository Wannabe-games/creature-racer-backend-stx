<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class ExperienceDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Experience'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'Experience' => [
                    'type' => 'integer',
                    'example' => 230,
                ],
            ],
        ]);

        $schemas['ExperiencePostStatus'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'example' => 'success',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Experience',
            get: new Model\Operation(
                operationId: 'experienceGet',
                tags: ['Player'],
                responses: [
                    '200' => [
                        'description' => 'Player',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Experience',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Experience',
            ),
            post: new Model\Operation(
                operationId: 'experienceUpdate',
                tags: ['Player'],
                responses: [
                    '200' => [
                        'description' => 'Status',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ExperiencePostStatus',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Experience',
                requestBody: new Model\RequestBody(
                    description: 'Experience',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/Experience',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/game/experience', $pathItem);

        return $openApi;
    }
}