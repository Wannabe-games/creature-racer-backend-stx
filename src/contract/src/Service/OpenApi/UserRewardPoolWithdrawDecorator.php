<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserRewardPoolWithdrawDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['WithdrawData'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'amount' => [
                    'type' => 'integer',
                    'example' => 12,
                ],
                'withdrawId' => [
                    'type' => 'integer',
                    'example' => 1,
                ],
                'signature' => [
                    'type' => 'string',
                    'example' => '0x2ba82fe78fbaea4dc97cd69b0f6027c4b07de2a6c0babf44eb7cea20234c9339521342e5fdefe3af02b998d70d9b27cc3d00f4995a1daa47cf11efb2db20d4ab01',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Withdraw reward pool',
            get: new Model\Operation(
                operationId: 'withdrawRewardPool',
                tags: ['RewardPool'],
                responses: [
                    '200' => [
                        'description' => 'Withdraw reward pool',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/WithdrawData',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Withdraw reward pool',
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/reward-pool/withdraw/{id}', $pathItem);

        return $openApi;
    }
}