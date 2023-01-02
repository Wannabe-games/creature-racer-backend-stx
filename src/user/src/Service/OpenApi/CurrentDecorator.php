<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class CurrentDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['UserGet'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'nick' => [
                    'type' => 'string',
                    'example' => 'test@test.com',
                ],
                "groups" => [
                    'type' => 'array',
                    'example' => '{
                        "id": 123123,
                        "name": "the_best_group"
                    }',
                ],
                "createdAt" => [
                    'type' => 'datetime',
                    'example' => "2022-02-16T22:47:34+00:00",
                ] ,
                "firstName" => [
                    'type' => 'string',
                    'example' => 'Jon',
                ],
                "lastName" => [
                    'type' => 'string',
                    'example' => 'Weaf',
                ] ,
                "wallet" => [
                    'type' => 'string',
                    'example' => '0xb60e8dd61c5d32be8058bb8eb970870f07233155',
                ] ,
                "email" => [
                    'type' => 'string',
                    'example' => 'test@test.com',
                ],
                "player" => [
                    'type' => 'object',
                    'example' => [
                        'gold' => [
                            'type' => 'int',
                            'example' =>  12334123
                        ],
                        'activeAnimalCreatureType' => [
                            'type' => 'string',
                            'example' =>  'boar'
                        ]
                    ],
                ],
                "myReferralNft" => [
                    'type' => 'object',
                    'example' => [
                        'refCode' => [
                            'type' => 'string',
                            'example' =>  'boar'
                        ],
                        'hash' => [
                            'type' => 'string',
                            'example' =>  'asdqwrx2t4g45hyg45hd24h5dg24d5hg24'
                        ]
                    ],
                ],
            ],
        ]);
        $schemas['UserPost'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'nick' => [
                    'type' => 'string',
                    'example' => 'test@test.com',
                ],
                "firstName" => [
                    'type' => 'string',
                    'example' => 'Jon',
                ],
                "lastName" => [
                    'type' => 'string',
                    'example' => 'Weaf',
                ] ,
                "email" => [
                    'type' => 'string',
                    'example' => 'test@test.com',
                ],
                "password" => [
                    'type' => 'string',
                    'example' => 'BardzoTajneHasło',
                ]
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'User',
            get: new Model\Operation(
                operationId: 'currentUserGet',
                tags: ['User'],
                responses: [
                    '200' => [
                        'description' => 'Current User',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/UserGet',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'User',
            ),
            post: new Model\Operation(
                operationId: 'currentUserUpdate',
                tags: ['User'],
                summary: 'User',
                requestBody: new Model\RequestBody(
                    description: 'Current User',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/UserPost',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/user/current', $pathItem);

        return $openApi;
    }
}
