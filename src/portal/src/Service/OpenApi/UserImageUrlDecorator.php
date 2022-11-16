<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserImageUrlDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['UserImage'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'userImage' => [
                    'type' => 'string',
                    'example' => 'WEmtgv92748xbg9gbz9237bgx9834mxbg3bxg93r==',
                ],
            ],
        ]);
        $schemas['UserUrl'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'url' => [
                    'type' => 'string',
                    'example' => '/api/portal/user/image?hash=WEmtgvehrthdrbxg9rthdr74d6yhe5tyjh3d5f6y',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'User url image',
            post: new Model\Operation(
                operationId: 'userUrlImage',
                tags: ['User'],
                responses: [
                    '200' => [
                        'description' => 'Get user share url',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/UserUrl',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Get url image',
                requestBody: new Model\RequestBody(
                    description: 'Data in base64',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/UserImage',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/portal/user/image-url/{user}', $pathItem);

        return $openApi;
    }
}