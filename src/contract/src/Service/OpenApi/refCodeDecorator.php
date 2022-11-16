<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class refCodeDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['recCode'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'rNftHash' => [
                    'type' => 'string',
                    'example' => '0xc62f3493fcd5992cf9fe57ec83d9d48d8b843fc200d6a814c19b1b702d1e00c4',
                ],
                'refCode' => [
                    'type' => 'string',
                    'example' => 'example',
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
            ref: 'Set ref code',
            post: new Model\Operation(
                operationId: 'refCode',
                tags: ['Referral'],
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
                summary: 'RefCode',
                requestBody: new Model\RequestBody(
                    description: 'Set ref code & hash',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/recCode',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/rnft', $pathItem);

        return $openApi;
    }
}