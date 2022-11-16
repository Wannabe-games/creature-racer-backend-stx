<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserRewardPoolWithdrawReceivedDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['WithdrawReceivedData'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'example' => 'done',
                ]
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Withdraw reward pool status',
            get: new Model\Operation(
                operationId: 'withdrawRewardPoolReceivedStatus',
                tags: ['RewardPool'],
                responses: [
                    '200' => [
                        'description' => 'Withdraw reward pool status',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/WithdrawReceivedData',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Withdraw reward pool status',
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/reward-pool/withdraw/received/{id}', $pathItem);

        return $openApi;
    }
}