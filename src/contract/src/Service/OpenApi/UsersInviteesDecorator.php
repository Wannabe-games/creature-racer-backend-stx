<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UsersInviteesDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['UserInvitees'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'users' => [
                    'type' => 'array',
                    'example' => [
                        'wallet' => [
                            'type' => 'string',
                            'example' => '0xb60e8dd61c5d32be8058bb8eb970870f07233155',
                        ],
                        'pool' => [
                            'type' => 'int',
                            'example' => 100,
                        ],
                    ],
                ]
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'User invitees',
            get: new Model\Operation(
                operationId: 'invitees',
                tags: ['Referral'],
                responses: [
                    '200' => [
                        'description' => 'Data to mint',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/UserInvitees',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/rnft/invitees', $pathItem);

        return $openApi;
    }
}