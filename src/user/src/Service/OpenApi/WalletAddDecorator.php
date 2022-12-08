<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class WalletAddDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['WalletAdd'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'wallet' => [
                    'type' => 'string',
                    'example' => '0xb60e8dd61c5d32be8058bb8eb970870f07233155',
                ],
                'publicKey' => [
                    'type' => 'string',
                    'example' => '02f08d5541bf611ded745cc15db08f4447bfa55a55a2dd555648a1de9759aea5f9',
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
            ref: 'Wallet',
            post: new Model\Operation(
                operationId: 'walletAdd',
                tags: ['Wallet'],
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
                summary: 'Wallet',
                requestBody: new Model\RequestBody(
                    description: 'Set wallet id',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/WalletAdd',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/user/wallet/add', $pathItem);

        return $openApi;
    }
}
