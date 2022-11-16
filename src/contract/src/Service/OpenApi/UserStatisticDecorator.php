<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserStatisticDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['UserStatistic'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'data' => [
                    'example' => '{
                        "totalPoolShare": "0",
                        "myPoolShare": "0",
                        "rewardPool": 9.223372036854776,
                        "referralLevel": 0,
                        "readyToUpgrade": 11,
                        "totalStaked": 0,
                        "mintedInTotal": 1,
                        "expiresSoon": 1
                    }'
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'User Statistic',
            get: new Model\Operation(
                operationId: 'userStatistic',
                tags: ['User'],
                responses: [
                    '200' => [
                        'description' => 'Get user statistic',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/UserStatistic',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'User Card',
            ),
        );
        $openApi->getPaths()->addPath('/api/contract/user/statistic', $pathItem);

        return $openApi;
    }
}