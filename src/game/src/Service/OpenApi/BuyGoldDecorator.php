<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use ArrayObject;

final class BuyGoldDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['BuyGold'] = new ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'gold' => [
                        'type' => 'int',
                        'example' => '23',
                    ],
                ],
            ]
        );
        $schemas['BuyGoldStatus'] = new ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'status' => [
                        'type' => 'string',
                        'example' => 'success',
                        'readOnly' => true,
                    ],
                ],
            ]
        );

        $pathItem = new Model\PathItem(
            ref:  'Buy Gold',
            post: new Model\Operation(
                      operationId: 'buyGold',
                      tags:        ['Player'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Buy gold',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/BuyGoldStatus',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Buy gold',
                      requestBody: new Model\RequestBody(
                                       description: 'Buy gold',
                                       content:     new ArrayObject(
                                                        [
                                                            'application/json' => [
                                                                'schema' => [
                                                                    '$ref' => '#/components/schemas/BuyGold',
                                                                ],
                                                            ],
                                                        ]
                                                    ),
                                   ),
                  ),
        );
        $openApi->getPaths()->addPath('/api/game/buy-gold', $pathItem);

        return $openApi;
    }
}
