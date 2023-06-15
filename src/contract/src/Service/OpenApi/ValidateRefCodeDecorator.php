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
                'uri' => [
                    'type' => 'string',
                    'readOnly' => true,
                    'example' => 'http://creatureracer.local/api/contract/creature/frog/metadata.json',
                ],
                'key' => [
                    'type' => 'string',
                    'readOnly' => true,
                    'example' => 'ST2720MDXC51WK5ZBPY4731QDYM2YW78HAF6EE3MJ',
                ],
                'signature' => [
                    'type' => 'string',
                    'readOnly' => true,
                    'example' => '43937d4ac3044fc26fb064254f8ddab10a5dd8cfc608514e6d4fd6c8ee97ae050cdd721df35b0d20fc3b8ee0b52e8a4e480651e3e0014763acbe3f8b538f80e100',
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
