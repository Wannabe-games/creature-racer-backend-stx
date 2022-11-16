<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class CreatureNftNameDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['CreatureNftName'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'contract' => [
                    'type' => 'int',
                    'example' => '152',
                ],
                'royalties' => [
                    'type' => 'int',
                    'example' => '99',
                ],
                'name' => [
                    'type' => 'string',
                    'example' => 'example',
                ],
            ],
        ]);

        $schemas['Status'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'readOnly' => true,
                    'example' => 'success',
                ],
            ],
        ]);


        $pathItem = new Model\PathItem(
            ref: 'Name for NFT',
            post: new Model\Operation(
                operationId: 'creatureNftName',
                tags: ['Contract'],
                responses: [
                    '200' => [
                        'description' => 'Get status',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Status',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Contract',
                requestBody: new Model\RequestBody(
                    description: 'SetName for Creature NFT',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/CreatureNftName',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/creature/nft/name', $pathItem);

        return $openApi;
    }
}