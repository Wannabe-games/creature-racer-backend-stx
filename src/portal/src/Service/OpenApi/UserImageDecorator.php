<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserImageDecorator implements OpenApiFactoryInterface
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

        $pathItem = new Model\PathItem(
            ref: 'User Card Image',
            get: new Model\Operation(
                operationId: 'userCardImageGet',
                tags: ['User'],
                summary: 'Get image',
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
            post: new Model\Operation(
                operationId: 'userCardImagePost',
                tags: ['User'],
                summary: 'Get image',
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
        $openApi->getPaths()->addPath('/api/portal/user/image?hash={hash}', $pathItem);

        return $openApi;
    }
}