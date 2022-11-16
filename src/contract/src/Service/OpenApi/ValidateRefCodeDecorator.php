<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class ValidateRefCodeDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['ValidationStatus'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'unique' => [
                    'type' => 'bool',
                    'readOnly' => true,
                    'example' => true,
                ],
            ],
        ]);


        $pathItem = new Model\PathItem(
            ref: 'Check referral is unique',
            get: new Model\Operation(
                operationId: 'referralUnique',
                tags: ['Referral'],
                responses: [
                    '200' => [
                        'description' => 'Check referral is unique',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ValidationStatus',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Contract',
                parameters: [
                    new Model\Parameter('refCode', 'query', 'User ref code.'),
                ],
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/validate/ref-code/{refCode}', $pathItem);

        return $openApi;
    }
}