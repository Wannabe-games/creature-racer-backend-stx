<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class PasswordResetEmailDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Email'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'email' => [
                    'type' => 'string',
                    'example' => 'test@test.com',
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
            ref: 'Password',
            post: new Model\Operation(
                operationId: 'passwordEmail',
                tags: ['Password'],
                responses: [
                    '200' => [
                        'description' => 'Reset Password by Email',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Status',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Password',
                requestBody: new Model\RequestBody(
                    description: 'Required Email',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/Email',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/user/password/email', $pathItem);

        return $openApi;
    }
}