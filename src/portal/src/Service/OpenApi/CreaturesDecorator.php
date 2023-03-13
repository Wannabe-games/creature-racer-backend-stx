<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class CreaturesDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Creatures'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatures' => [
                    'type' => 'array',
                    'example' => '[
                        {
                            "id": 1,
                            "tier": 1,
                            "type": "boar",
                            "name": "Boar",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 0,
                            "priceGold": 9500,
                            "deliveryPriceStacks": 20,
                            "deliveryWaitingTime": 120,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.0887
                                },
                                {
                                    "name": "speed",
                                    "value": 19.492
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.5818
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 3.1674
                                }
                            ]
                        },
                        {
                            "id": 2,
                            "tier": 1,
                            "type": "bird",
                            "name": "Bird",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 0,
                            "priceGold": 10000,
                            "deliveryPriceStacks": 20,
                            "deliveryWaitingTime": 120,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.0887
                                },
                                {
                                    "name": "speed",
                                    "value": 20.4612
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.1538
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.1538
                                }
                            ]
                        },
                        {
                            "id": 3,
                            "tier": 1,
                            "type": "frog",
                            "name": "Frog",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 0,
                            "priceGold": 11000,
                            "deliveryPriceStacks": 20,
                            "deliveryWaitingTime": 120,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.0981
                                },
                                {
                                    "name": "speed",
                                    "value": 20.3106
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 1.9624
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 1.4718
                                }
                            ]
                        },
                        {
                            "id": 4,
                            "tier": 1,
                            "type": "cow",
                            "name": "Cow",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 0,
                            "priceGold": 10500,
                            "deliveryPriceStacks": 20,
                            "deliveryWaitingTime": 120,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.0888
                                },
                                {
                                    "name": "speed",
                                    "value": 20.4921
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.1571
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.1571
                                }
                            ]
                        },
                        {
                            "id": 5,
                            "tier": 1,
                            "type": "dog",
                            "name": "Dog",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 0,
                            "priceGold": 30000,
                            "deliveryPriceStacks": 20,
                            "deliveryWaitingTime": 150,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.0893
                                },
                                {
                                    "name": "speed",
                                    "value": 20.6054
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.169
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.169
                                }
                            ]
                        },
                        {
                            "id": 6,
                            "tier": 1,
                            "type": "squirrel",
                            "name": "Squirrel",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 800,
                            "priceGold": 0,
                            "deliveryPriceStacks": 20,
                            "deliveryWaitingTime": 150,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.0988
                                },
                                {
                                    "name": "speed",
                                    "value": 20.4531
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 1.9761
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 1.4821
                                }
                            ]
                        },
                        {
                            "id": 7,
                            "tier": 1,
                            "type": "rhino",
                            "name": "Rhino",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 1000,
                            "priceGold": 40000,
                            "deliveryPriceStacks": 20,
                            "deliveryWaitingTime": 180,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.0904
                                },
                                {
                                    "name": "speed",
                                    "value": 19.865
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.6312
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 3.228
                                }
                            ]
                        },
                        {
                            "id": 8,
                            "tier": 2,
                            "type": "gorilla",
                            "name": "Gorilla",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 2800,
                            "priceGold": 70000,
                            "deliveryPriceStacks": 61,
                            "deliveryWaitingTime": 2880,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1138
                                },
                                {
                                    "name": "speed",
                                    "value": 23.5508
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.2754
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 1.7065
                                }
                            ]
                        },
                        {
                            "id": 9,
                            "tier": 2,
                            "type": "turtle",
                            "name": "Turtle",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 3750,
                            "priceGold": 100000,
                            "deliveryPriceStacks": 91,
                            "deliveryWaitingTime": 4320,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1049
                                },
                                {
                                    "name": "speed",
                                    "value": 23.0598
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.6312
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 3.7471
                                }
                            ]
                        },
                        {
                            "id": 10,
                            "tier": 2,
                            "type": "hippo",
                            "name": "Hippo",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 2600,
                            "priceGold": 50000,
                            "deliveryPriceStacks": 61,
                            "deliveryWaitingTime": 2880,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.103
                                },
                                {
                                    "name": "speed",
                                    "value": 22.6269
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.5818
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 3.6768
                                }
                            ]
                        },
                        {
                            "id": 11,
                            "tier": 2,
                            "type": "croko",
                            "name": "Croko",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 3000,
                            "priceGold": 80000,
                            "deliveryPriceStacks": 61,
                            "deliveryWaitingTime": 2880,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1029
                                },
                                {
                                    "name": "speed",
                                    "value": 23.7417
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.3897
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.4991
                                }
                            ]
                        },
                        {
                            "id": 12,
                            "tier": 2,
                            "type": "elephant",
                            "name": "Elephant",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 2700,
                            "priceGold": 60000,
                            "deliveryPriceStacks": 61,
                            "deliveryWaitingTime": 2880,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1031
                                },
                                {
                                    "name": "speed",
                                    "value": 22.6451
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.5839
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 3.6797
                                }
                            ]
                        },
                        {
                            "id": 13,
                            "tier": 2,
                            "type": "unicorn",
                            "name": "Unicorn",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 5000,
                            "priceGold": 0,
                            "deliveryPriceStacks": 91,
                            "deliveryWaitingTime": 4320,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1162
                                },
                                {
                                    "name": "speed",
                                    "value": 24.0486
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.3235
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 1.7426
                                }
                            ]
                        },
                        {
                            "id": 14,
                            "tier": 2,
                            "type": "giraffe",
                            "name": "Giraffe",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 3500,
                            "priceGold": 90000,
                            "deliveryPriceStacks": 76,
                            "deliveryWaitingTime": 3600,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1033
                                },
                                {
                                    "name": "speed",
                                    "value": 23.8442
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.4
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.5099
                                }
                            ]
                        },
                        {
                            "id": 15,
                            "tier": 3,
                            "type": "wolf",
                            "name": "Wolf",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 4500,
                            "priceGold": 150000,
                            "deliveryPriceStacks": 151,
                            "deliveryWaitingTime": 18000,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1206
                                },
                                {
                                    "name": "speed",
                                    "value": 27.8063
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.3832
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.927
                                }
                            ]
                        },
                        {
                            "id": 16,
                            "tier": 3,
                            "type": "raccoon",
                            "name": "Raccoon",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 6500,
                            "priceGold": 250000,
                            "deliveryPriceStacks": 151,
                            "deliveryWaitingTime": 18000,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1341
                                },
                                {
                                    "name": "speed",
                                    "value": 27.7543
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.2862
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.0112
                                }
                            ]
                        },
                        {
                            "id": 17,
                            "tier": 3,
                            "type": "panda",
                            "name": "Panda",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 6000,
                            "priceGold": 200000,
                            "deliveryPriceStacks": 151,
                            "deliveryWaitingTime": 18000,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.121
                                },
                                {
                                    "name": "speed",
                                    "value": 26.5948
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.587
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 4.3216
                                }
                            ]
                        },
                        {
                            "id": 18,
                            "tier": 3,
                            "type": "bunny",
                            "name": "Bunny",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 8000,
                            "priceGold": 400000,
                            "deliveryPriceStacks": 189,
                            "deliveryWaitingTime": 22500,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.135
                                },
                                {
                                    "name": "speed",
                                    "value": 27.9413
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.3016
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.0247
                                }
                            ]
                        },
                        {
                            "id": 19,
                            "tier": 3,
                            "type": "tiger",
                            "name": "Tiger",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 20000,
                            "priceGold": 900000,
                            "deliveryPriceStacks": 226,
                            "deliveryWaitingTime": 27000,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1229
                                },
                                {
                                    "name": "speed",
                                    "value": 28.3383
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.4288
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.983
                                }
                            ]
                        },
                        {
                            "id": 20,
                            "tier": 3,
                            "type": "dragon",
                            "name": "Dragon",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 9000,
                            "priceGold": 0,
                            "deliveryPriceStacks": 189,
                            "deliveryWaitingTime": 22500,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1219
                                },
                                {
                                    "name": "speed",
                                    "value": 26.8032
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.6073
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 4.3555
                                }
                            ]
                        },
                        {
                            "id": 21,
                            "tier": 3,
                            "type": "reindeer",
                            "name": "Reindeer",
                            "skinColor": 0,
                            "speed": 0,
                            "boostAcceleration": 0,
                            "acceleration": 0,
                            "boostVelocity": 0,
                            "speedMax": 36.5501,
                            "accelerationMax": 0.1732,
                            "boostTimeMax": 2.6312,
                            "boostAccelerationMax": 5.5854,
                            "priceStacks": 7000,
                            "priceGold": 300000,
                            "deliveryPriceStacks": 189,
                            "deliveryWaitingTime": 22500,
                            "upgradeChanges": [
                                {
                                    "name": "acceleration",
                                    "value": 0.1214
                                },
                                {
                                    "name": "speed",
                                    "value": 28.0023
                                },
                                {
                                    "name": "gas_volume",
                                    "value": 2.4
                                },
                                {
                                    "name": "gas_pressure",
                                    "value": 2.9476
                                }
                            ]
                        }
                    ]',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Creature',
            get: new Model\Operation(
                operationId: 'creatures',
                tags: ['Creature'],
                responses: [
                    '200' => [
                        'description' => 'Get all creatures',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Creatures',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Creatures',
            ),
        );
        $openApi->getPaths()->addPath('/api/portal/creatures', $pathItem);

        return $openApi;
    }
}
