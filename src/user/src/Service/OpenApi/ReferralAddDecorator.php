<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class ReferralAddDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['ReferralAdd'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'refCode' => [
                    'type' => 'string',
                    'example' => 'niceRefCode',
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
            ref: 'Referral',
            post: new Model\Operation(
                operationId: 'referralAdd',
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
                summary: 'Referral',
                requestBody: new Model\RequestBody(
                    description: 'Set referral',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/ReferralAdd',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/user/referral/add', $pathItem);

        return $openApi;
    }
}