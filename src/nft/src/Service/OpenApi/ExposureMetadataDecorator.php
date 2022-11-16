<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class ExposureMetadataDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['CreatureExposureMetadata'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'base_url' => [
                    'type' => 'string',
                    'example' => 'https://stage.wannabe.game/nft/metadata/',
                ],
                'nft_id' => [
                    'type' => 'int',
                    'example' => '23',
                ],
            ],
        ]);
        $schemas['CreatureId'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creature_id' => [
                    'type' => 'string',
                    'example' => '1ec95cb9-ab25-6cb6-ab06-cbed9fc6407d',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Exposure',
            post: new Model\Operation(
                operationId: 'exposureMetadata',
                tags: ['Exposure'],
                responses: [
                    '200' => [
                        'description' => 'Exposure metadata',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/CreatureExposureMetadata',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Exposure',
                requestBody: new Model\RequestBody(
                    description: 'Exposure - creature id',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/CreatureId',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/nft/metadata', $pathItem);

        return $openApi;
    }
}