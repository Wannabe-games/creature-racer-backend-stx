<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use ArrayObject;

final class BuyCreatureDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Status'] = new ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'status' => [
                        'type' => 'string',
                        'example' => 'You don\'t have enough gold',
                        'readOnly' => true,
                    ],
                ],
            ]
        );
        $schemas['CreatureBuy'] = new ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'receipt' => [
                        'type' => 'string',
                        'example' => 'yefihfipusdhgfiasdhgfh',
                    ],
                    'type' => [
                        'type' => 'string',
                        'example' => 'boar',
                    ],
                ],
            ]
        );

        $pathItem = new Model\PathItem(
            ref:  'Buy Creature',
            post: new Model\Operation(
                      operationId: 'statusBuy',
                      tags:        ['Creature User'],
                      responses:   [
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
                      summary:     'Buy creature',
                      requestBody: new Model\RequestBody(
                                       description: 'Buy creature',
                                       content:     new ArrayObject([
                                                                        'application/json' => [
                                                                            'schema' => [
                                                                                '$ref' => '#/components/schemas/CreatureBuy',
                                                                            ],
                                                                        ],
                                                                    ]),
                                   ),
                  ),
        );
        $openApi->getPaths()->addPath('/api/game/buy-creature', $pathItem);

        return $openApi;
    }
}
