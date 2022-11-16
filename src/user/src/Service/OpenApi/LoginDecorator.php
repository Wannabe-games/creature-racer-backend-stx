<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class LoginDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Token'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'token' => [
                    'type' => 'string',
                    'readOnly' => true,
                    'example' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NDU2MTU3MDksImV4cCI6MTY0NTYxOTMwOSwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoidGVzdEB0ZXN0LmNvbSJ9.osxGD7yWYeAwiBD8JeFP2stnTu3n1uA4iD4xLqn6VNxVgUYggT8rOisIHb9OPUByJXgIxEeaYzbxMtXQiWkp3JQbkYDIaMh2Od47iYfy-rUv_NGGNVY6Gqnn48Vt1SIQkUW5keCYLXPUbHd9EyArwBEu3o9RZmu-xOIpfovWmblrfYNBJ7IrA9HoEVpz1-Z_d7LelBU_-pbNFJ9I1aY0hdZzbFisxRXlSs4OvyquPAQWmndTkN5_f7FDA6OvneaCEKMCGuVRiK8QfSSJmf4d_eTAqnZpeuuJQcXNF4oOPMgvngVsOlRQ3DqotCNipC-pjYXkHIPuwA4F4xhPoyQj6505nIRcyvk4X-WU8lKdo0aHoh7cV-mMLB-MY4i1_xKovUAMQQr1fJwZu25LoBOYATjoOwK8DLyIs5CKlhjYvmLi2qW4VYumGIa0GHFlfgMABclmfYi0K6GTnPKbH-szKcqvS77WENMUFKZQZmQwRUOt8c0h8bwupAirfS7jKRO3EmzooCAIn2WUsLXoMlNKU7-Wh8BtIjzVECLYF4_KHw6gM6jwdPemtvZRWK-Ee1J-7uuom2dGjYK-XFE6MIx0B5KU7YyO9JO-x2oDtupwuS23uzGe25Gxo4Bt1FAL8FfWg7OYb8211eFwE_gJg72KYfP2DVdGTG13qYQJa7wycf0',

                ],
                'refresh_token' => [
                    'type' => 'string',
                    'example' => 'd2b98666b8cef309a74beffa634ad97877757d35c8c5e2bdc21f03b0c183ae4a6eb6eaf50132a6f0c3f62fcdf87711d181391a41f4a5cfe50648f0831854eb56',
                ],
            ],
        ]);
        $schemas['Credentials'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'email' => [
                    'type' => 'string',
                    'example' => 'johndoe@example.com',
                ],
                'password' => [
                    'type' => 'string',
                    'example' => 'password',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Login',
            post: new Model\Operation(
                operationId: 'postCredentialsItem',
                tags: ['User'],
                responses: [
                    '200' => [
                        'description' => 'Get JWT token',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Token',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Login',
                requestBody: new Model\RequestBody(
                    description: 'Login',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/Credentials',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/user/login_check', $pathItem);

        return $openApi;
    }
}