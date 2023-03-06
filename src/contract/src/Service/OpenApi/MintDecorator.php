<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class MintDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['CreatureMint'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatureId' => [
                    'type' => 'uuid',
                    'example' => '123e4567-e89b-12d3-a456-426614174000',
                ],
                'contract' => [
                    'type' => 'int',
                    'example' => '152',
                ],
                'hash' => [
                    'type' => 'string',
                    'example' => '0xc62f3493fcd5992cf9fe57ec83d9d48d8b843fc200d6a814c19b1b702d1e00c4',
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
            ref: 'Mint',
            post: new Model\Operation(
                operationId: 'creatureMint',
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
                    description: 'Mint Creature',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/CreatureMint',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/creature/mint', $pathItem);

        return $openApi;
    }
}
