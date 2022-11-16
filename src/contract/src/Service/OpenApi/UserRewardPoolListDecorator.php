<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserRewardPoolListDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['RewardPoolList'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'list' => [
                    'type' => 'array',
                    'example' => [
                        'id' => [
                            'type' => 'string',
                            'example' => '1eca648f-f8fb-661e-81a5-eda9b0f7948a',
                        ],
                        'myReward' => [
                            'type' => 'integer',
                            'example' => 123,
                        ],
                        'myStakingPower' => [
                            'type' => 'integer',
                            'example' => 13,
                        ],
                        'totalRewardPool' => [
                            'type' => 'integer',
                            'example' => 12323,
                        ],
                        'user' => [
                            'type' => 'integer',
                            'example' => 3,
                        ],
                        'isReceived' => [
                            'type' => 'bool',
                            'example' => false,
                        ],
                        'withdrawId' => [
                            'type' => 'integer',
                            'example' => 1,
                        ],
                        'date' => [
                            'type' => 'date',
                            'example' => '2022-04-10',
                        ],
                    ]
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Reward pool list',
            get: new Model\Operation(
                operationId: 'rewardPoolList',
                tags: ['RewardPool'],
                responses: [
                    '200' => [
                        'description' => 'Reward pool list',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/RewardPoolList',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Reward pool list',
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/reward-pool/user/list', $pathItem);

        return $openApi;
    }
}