<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class SignCreatureDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['SignCreatureData'] = new \ArrayObject([
            'type' => 'object',
            'example' => '{"signature":"0x2ba82fe78fbaea4dc97cd69b0f6027c4b07de2a6c0babf44eb7cea20234c9339521342e5fdefe3af02b998d70d9b27cc3d00f4995a1daa47cf11efb2db20d4ab01","address":"0x6dfE6AD0fc823f4A8521c6A6b5e8723b7fA85010","contractId":2,"typeId":5,"part1":3,"part2":0,"part3":0,"part4":0,"part5":1,"expiryTime":"1647559299","price":10}',
        ]);
        $schemas['CreatureId'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatureId' => [
                    'type' => 'string',
                    'example' => '1ec95cb9-ab25-6cb6-ab06-cbed9fc6407d',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Sign',
            post: new Model\Operation(
                operationId: 'signCreature',
                tags: ['Sign'],
                responses: [
                    '200' => [
                        'description' => 'Data to mint',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/SignCreatureData',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Sign',
                requestBody: new Model\RequestBody(
                    description: 'Sign creature to mint',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/CreatureId',
                            ],
                        ],
                    ]),
                ),
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/sign/creature', $pathItem);

        return $openApi;
    }
}