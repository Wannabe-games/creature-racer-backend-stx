<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserCreaturesDetailsDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['UserCreatureDetails'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creature' => [
                    'example' => '{
                        "creature": {
                            "id": "1eca648f-f94a-600c-966e-eda9b0f7948a",
                            "creatureId": 14,
                            "name": "creature_9",
                            "type": "giraffe",
                            "belly": {
                                "level": 3,
                                "next": {
                                    "level": 4,
                                    "priceStacks": 90,
                                    "priceGold": 10035,
                                    "deliveryDiamonds": 28,
                                    "waitingTime": 3020,
                                    "upgradeChanges": {
                                        "boost_power": 0.054
                                    }
                                },
                                "upgradeDateEnd": "2022-03-17 23:21:39"
                            },
                            "buttocks": {
                                "level": 4,
                                "next": [],
                                "upgradeDateEnd": "2022-03-17 23:21:39"
                            },
                            "heart": {
                                "level": 2,
                                "next": {
                                    "level": 3,
                                    "priceStacks": 92,
                                    "priceGold": 10344,
                                    "deliveryDiamonds": 28,
                                    "waitingTime": 3210,
                                    "upgradeChanges": {
                                        "acceleration": 0.0025,
                                        "speed": 0.4306
                                    }
                                },
                                "upgradeDateEnd": "2022-03-17 23:21:39"
                            },
                            "lungs": {
                                "level": 2,
                                "next": {
                                    "level": 3,
                                    "priceStacks": 115,
                                    "priceGold": 12844,
                                    "deliveryDiamonds": 44,
                                    "waitingTime": 4950,
                                    "upgradeChanges": {
                                        "speed": 0.5741
                                    }
                                },
                                "upgradeDateEnd": "2022-03-17 23:21:39"
                            },
                            "muscles": {
                                "level": 4,
                                "next": [],
                                "upgradeDateEnd": "2022-03-17 23:21:39"
                            },
                            "acceleration": {
                                "value": 0.1233,
                                "max": 0.1732
                            },
                            "boostAcceleration": {
                                "value": 3.0737,
                                "max": 5.5854
                            },
                            "boostTime": {
                                "value": 2.4,
                                "max": 2.6312
                            },
                            "speed": {
                                "value": 27.5112,
                                "max": 36.5501
                            },
                            "contract": null,
                            "isForGame": true,
                            "bonus": false,
                            "isStaked": false,
                            "nftExpiryDate": "2022-12-21 16:38:42",
                            "rewardPool": null,
                            "skinColor": 0,
                            "hash": null
                        }
                    }'
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'User Creature',
            get: new Model\Operation(
                operationId: 'userCreatureDetails',
                tags: ['Creature'],
                responses: [
                    '200' => [
                        'description' => 'Get all creatures signed to user',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/UserCreatureDetails',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'User Creature',
            ),
        );
        $openApi->getPaths()->addPath('/api/portal/user-creatures/details/{id}', $pathItem);

        return $openApi;
    }
}
