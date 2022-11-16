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
                'signature' => [
                    'type' => 'string',
                    'example' => 'R#&TCNr9273gmxr927m4gtx9274mxg9',
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