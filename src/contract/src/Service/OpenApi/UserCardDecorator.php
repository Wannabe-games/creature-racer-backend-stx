<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserCardDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['UserCard'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'data' => [
                    'example' => '{
                        "poolShare": "0",
                        "rewardPool": 9.223372036854776,
                        "nick": null,
                        "referralCode": null,
                        "referralLevel": null,
                        "qrCode": "data:image/png;base64,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",
                        "avatar": "boar_1.png"
                    }'
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'User Card',
            get: new Model\Operation(
                operationId: 'userCard',
                tags: ['User'],
                responses: [
                    '200' => [
                        'description' => 'Get user external data',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/UserCard',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'User Card',
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/user/card/{id}', $pathItem);

        return $openApi;
    }
}