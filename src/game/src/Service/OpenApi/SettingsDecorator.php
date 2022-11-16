<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class SettingsDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Settings'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'settings' => [
                    'type' => 'array',
                    'readOnly' => true,
                    'example' => '{
                      "SettingsFormat" : 1,
                      "Version": 585,
                      "InitialSoftCurrency": 11000,
                      "InitialHardCurrency": 10,
                      "InitialEnergy": 10,
                      "EnergyRestoreCooldown": 600.0,
                      "EnergyUnitCost": 100,
                      "EnergyCostIsPremium": true,
                      "PerfectStartMultiplier": 0.025,
                      "PerfectGearMultiplier": 0.01,
                      "GoodGearMultiplier": 0.005,
                      "DefaultFartColor": [
                        {
                          "r": 55,
                          "g": 204,
                          "b": 80,
                          "a": 255
                        },
                        {
                          "r": 51,
                          "g": 138,
                          "b": 65,
                          "a": 255
                        },
                        {
                          "r": 0,
                          "g": 255,
                          "b": 54,
                          "a": 255
                        }
                      ],
                      "RewardBoxTimeToThink": 6.0,
                      "RewardBoxShowRate": 1.0,
                      "FartPresets": [
                        {
                          "Name": "default",
                          "Color1": "0.219;0.8;0.317",
                          "Color2": "0.2;0.545;0.258",
                          "Color3": "0.0;1.0;0.215"
                        },
                        {
                          "Name": "green",
                          "Color1": "0.206;0.86;0.409",
                          "Color2": "0.093;0.409;0.239",
                          "Color3": "0.053;0.5;0.23"
                        },
                        {
                          "Name": "yellow",
                          "Color1": "0.453;0.853;0.275",
                          "Color2": "0.34;0.402;0.104",
                          "Color3": "0.3;0.493;0.096"
                        },
                        {
                          "Name": "orange",
                          "Color1": "0.453;0.639;0.275",
                          "Color2": "0.34;0.188;0.104",
                          "Color3": "0.3;0.279;0.096"
                        },
                        {
                          "Name": "crimson",
                          "Color1": "0.453;0.613;0.351",
                          "Color2": "0.34;0.162;0.181",
                          "Color3": "0.3;0.253;0.172"
                        },
                        {
                          "Name": "purple",
                          "Color1": "0.35;0.646;0.515",
                          "Color2": "0.237;0.195;0.344",
                          "Color3": "0.197;0.286;0.336"
                        },
                        {
                          "Name": "blue",
                          "Color1": "0.239;0.708;0.515",
                          "Color2": "0.126;0.257;0.344",
                          "Color3": "0.086;0.348;0.336"
                        }
                      ],
                      "RewardBoxRewards": [
                        {
                          "Type": 0,
                          "Value": 300,
                          "Probability": 0.26
                        },
                        {
                          "Type": 0,
                          "Value": 500,
                          "Probability": 0.19
                        },
                        {
                          "Type": 0,
                          "Value": 700,
                          "Probability": 0.13
                        },
                        {
                          "Type": 2,
                          "Value": 2,
                          "Probability": 0.12
                        },
                        {
                          "Type": 2,
                          "Value": 4,
                          "Probability": 0.04
                        },
                        {
                          "Type": 0,
                          "Value": 1200,
                          "Probability": 0.07
                        }
                      ],
                      "RewardAnimalParts": [
                        {
                          "id": "squirrel"
                        },
                        {
                          "id": "unicorn"
                        },
                        {
                          "id": "dragon"
                        }
                      ],
                      "RewardAttachmentParts": [
                        {
                          "id": "dog"
                        },
                        {
                          "id": "turtle"
                        },
                        {
                          "id": "tiger"
                        }
                      ],
                      "Animals": [
                        {
                          "Type": "boar",
                          "Name": "Boar",
                          "TierIndex": 1,
                          "PriceSoftCurrency": 9500,
                          "PriceHardCurrency": 0,
                          "DeliveryWaitingTime": 120.0,
                          "DeliveryDiamonds": 20.0,
                          "FartPreset": "orange",
                          "FartColor": [
                            {
                              "r": 115,
                              "g": 162,
                              "b": 70,
                              "a": 255
                            },
                            {
                              "r": 86,
                              "g": 47,
                              "b": 26,
                              "a": 255
                            },
                            {
                              "r": 76,
                              "g": 71,
                              "b": 24,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.0887,
                            "SpeedParam": 19.492,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.5818,
                            "BoostAccBonus": 3.1674,
                            "BoostSpeedBonus": 1.1419
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3606,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 390.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0026
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.282
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4514,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 610.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.327
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5355,
                                  "PriceHardCurrency": 24,
                                  "WaitingTime": 860.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3315
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 8508,
                                  "PriceHardCurrency": 38,
                                  "WaitingTime": 2170.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3374
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4277,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 550.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3759
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5316,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 850.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.436
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6070,
                                  "PriceHardCurrency": 27,
                                  "WaitingTime": 1110.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.442
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9091,
                                  "PriceHardCurrency": 41,
                                  "WaitingTime": 2480.0,
                                  "DeliveryDiamonds": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4499
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3148,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 300.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0017
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.282
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3955,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 470.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.327
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 4696,
                                  "PriceHardCurrency": 21,
                                  "WaitingTime": 660.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3315
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 7249,
                                  "PriceHardCurrency": 32,
                                  "WaitingTime": 1580.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3374
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1162,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 40.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0458
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 1728,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 90.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0531
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2384,
                                  "PriceHardCurrency": 11,
                                  "WaitingTime": 170.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0539
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5093,
                                  "PriceHardCurrency": 23,
                                  "WaitingTime": 780.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0548
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1860,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 100.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1069
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 2414,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 170.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.124
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 3129,
                                  "PriceHardCurrency": 14,
                                  "WaitingTime": 290.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1257
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5749,
                                  "PriceHardCurrency": 26,
                                  "WaitingTime": 990.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1279
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 201,
                                "g": 117,
                                "b": 49,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 226,
                                "g": 75,
                                "b": 65,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 120,
                                "g": 223,
                                "b": 223,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 49,
                                "g": 75,
                                "b": 162,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Pirate",
                              "PriceSoftCurrency": 6000,
                              "PriceHardCurrency": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "bird",
                          "Name": "Bird",
                          "TierIndex": 1,
                          "PriceSoftCurrency": 10000,
                          "PriceHardCurrency": 0,
                          "DeliveryWaitingTime": 120.0,
                          "DeliveryDiamonds": 20.0,
                          "FartPreset": "blue",
                          "FartColor": [
                            {
                              "r": 60,
                              "g": 180,
                              "b": 131,
                              "a": 255
                            },
                            {
                              "r": 32,
                              "g": 65,
                              "b": 87,
                              "a": 255
                            },
                            {
                              "r": 21,
                              "g": 88,
                              "b": 85,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.0887,
                            "SpeedParam": 20.4612,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.1538,
                            "BoostAccBonus": 2.1538,
                            "BoostSpeedBonus": 1.1419
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3436,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 350.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.2796
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4362,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 570.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3295
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5385,
                                  "PriceHardCurrency": 24,
                                  "WaitingTime": 870.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3557
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 8864,
                                  "PriceHardCurrency": 40,
                                  "WaitingTime": 2360.0,
                                  "DeliveryDiamonds": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0035
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4054,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 490.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3728
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5117,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 790.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4394
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6113,
                                  "PriceHardCurrency": 27,
                                  "WaitingTime": 1120.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4743
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9563,
                                  "PriceHardCurrency": 43,
                                  "WaitingTime": 2740.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5334
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 2979,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 270.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0016
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.2796
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3804,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 430.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0019
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3295
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 4727,
                                  "PriceHardCurrency": 21,
                                  "WaitingTime": 670.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3557
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 7605,
                                  "PriceHardCurrency": 34,
                                  "WaitingTime": 1740.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0023
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1829,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 100.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0981
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0294
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 2521,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 190.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.1156
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0347
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2350,
                                  "PriceHardCurrency": 10,
                                  "WaitingTime": 170.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0157
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0374
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 4957,
                                  "PriceHardCurrency": 22,
                                  "WaitingTime": 740.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0421
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1481,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 70.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0687
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 1985,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 120.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0809
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2739,
                                  "PriceHardCurrency": 12,
                                  "WaitingTime": 230.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0874
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5432,
                                  "PriceHardCurrency": 24,
                                  "WaitingTime": 890.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0983
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 45,
                                "g": 109,
                                "b": 172,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 107,
                                "g": 239,
                                "b": 235,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 244,
                                "g": 103,
                                "b": 171,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 172,
                                "g": 200,
                                "b": 58,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Zeppelin Pilot",
                              "PriceSoftCurrency": -1,
                              "PriceHardCurrency": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "lizard",
                          "Name": "Frog",
                          "TierIndex": 1,
                          "PriceSoftCurrency": 11000,
                          "PriceHardCurrency": 0,
                          "DeliveryWaitingTime": 120.0,
                          "DeliveryDiamonds": 20.0,
                          "FartPreset": "green",
                          "FartColor": [
                            {
                              "r": 52,
                              "g": 219,
                              "b": 104,
                              "a": 255
                            },
                            {
                              "r": 23,
                              "g": 104,
                              "b": 60,
                              "a": 255
                            },
                            {
                              "r": 13,
                              "g": 127,
                              "b": 58,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.0981,
                            "SpeedParam": 20.3106,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 1.9624,
                            "BoostAccBonus": 1.4718,
                            "BoostSpeedBonus": 1.1477
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3799,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 430.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.304
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4736,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 670.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0034
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3533
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5479,
                                  "PriceHardCurrency": 24,
                                  "WaitingTime": 900.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0034
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3468
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 8890,
                                  "PriceHardCurrency": 40,
                                  "WaitingTime": 2370.0,
                                  "DeliveryDiamonds": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0035
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3649
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4464,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 600.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4053
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5592,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 940.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4711
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6266,
                                  "PriceHardCurrency": 28,
                                  "WaitingTime": 1180.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4624
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9478,
                                  "PriceHardCurrency": 42,
                                  "WaitingTime": 2690.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4866
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3290,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 320.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.304
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4126,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 510.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0023
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3533
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 4819,
                                  "PriceHardCurrency": 22,
                                  "WaitingTime": 700.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0022
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3468
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 7579,
                                  "PriceHardCurrency": 34,
                                  "WaitingTime": 1720.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3649
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1805,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 100.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0979
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.022
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 2476,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 180.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.1138
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0256
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 3203,
                                  "PriceHardCurrency": 14,
                                  "WaitingTime": 310.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.1117
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0251
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5118,
                                  "PriceHardCurrency": 23,
                                  "WaitingTime": 790.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0097
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0265
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1352,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 50.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0514
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 1875,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 110.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0597
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2616,
                                  "PriceHardCurrency": 12,
                                  "WaitingTime": 210.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0586
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5343,
                                  "PriceHardCurrency": 24,
                                  "WaitingTime": 860.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0618
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 87,
                                "g": 213,
                                "b": 46,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 33,
                                "g": 168,
                                "b": 238,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 225,
                                "g": 44,
                                "b": 137,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 226,
                                "g": 232,
                                "b": 80,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Aviator Cap",
                              "PriceSoftCurrency": 6000,
                              "PriceHardCurrency": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "cow",
                          "Name": "Cow",
                          "TierIndex": 1,
                          "PriceSoftCurrency": 10500,
                          "PriceHardCurrency": 0,
                          "DeliveryWaitingTime": 120.0,
                          "DeliveryDiamonds": 20.0,
                          "FartPreset": "default",
                          "FartColor": [
                            {
                              "r": 55,
                              "g": 204,
                              "b": 80,
                              "a": 255
                            },
                            {
                              "r": 51,
                              "g": 138,
                              "b": 65,
                              "a": 255
                            },
                            {
                              "r": 0,
                              "g": 255,
                              "b": 54,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.0888,
                            "SpeedParam": 20.4921,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.1571,
                            "BoostAccBonus": 2.1571,
                            "BoostSpeedBonus": 1.1437
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3455,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 360.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.28
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4384,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 580.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.33
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5409,
                                  "PriceHardCurrency": 24,
                                  "WaitingTime": 880.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3563
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 8941,
                                  "PriceHardCurrency": 40,
                                  "WaitingTime": 2400.0,
                                  "DeliveryDiamonds": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0035
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4007
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4079,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 500.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3733
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5147,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 790.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.44
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6194,
                                  "PriceHardCurrency": 28,
                                  "WaitingTime": 1150.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.475
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9598,
                                  "PriceHardCurrency": 43,
                                  "WaitingTime": 2760.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5342
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 2998,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 270.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0016
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.28
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3826,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 440.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0019
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.33
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 4751,
                                  "PriceHardCurrency": 21,
                                  "WaitingTime": 680.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3563
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 7681,
                                  "PriceHardCurrency": 34,
                                  "WaitingTime": 1770.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0023
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4007
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1838,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 100.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0983
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0295
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 2531,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 190.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.1158
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0347
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2403,
                                  "PriceHardCurrency": 11,
                                  "WaitingTime": 170.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0157
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0375
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5009,
                                  "PriceHardCurrency": 22,
                                  "WaitingTime": 750.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0422
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1486,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 70.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0688
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 1990,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 120.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.081
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2795,
                                  "PriceHardCurrency": 12,
                                  "WaitingTime": 230.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0875
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5488,
                                  "PriceHardCurrency": 25,
                                  "WaitingTime": 900.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0984
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 249,
                                "g": 248,
                                "b": 248,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 124,
                                "g": 57,
                                "b": 139,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 211,
                                "g": 168,
                                "b": 53,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 147,
                                "g": 103,
                                "b": 0,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Winged Helmet",
                              "PriceSoftCurrency": 6000,
                              "PriceHardCurrency": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "dog",
                          "Name": "Dog",
                          "TierIndex": 1,
                          "PriceSoftCurrency": 30000,
                          "PriceHardCurrency": 0,
                          "DeliveryWaitingTime": 150.0,
                          "DeliveryDiamonds": 20.0,
                          "FartPreset": "yellow",
                          "FartColor": [
                            {
                              "r": 115,
                              "g": 217,
                              "b": 70,
                              "a": 255
                            },
                            {
                              "r": 86,
                              "g": 102,
                              "b": 26,
                              "a": 255
                            },
                            {
                              "r": 76,
                              "g": 125,
                              "b": 24,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.0893,
                            "SpeedParam": 20.6054,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.169,
                            "BoostAccBonus": 2.169,
                            "BoostSpeedBonus": 1.15
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3617,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 390.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0025
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.2816
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4617,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 640.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3319
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5652,
                                  "PriceHardCurrency": 25,
                                  "WaitingTime": 960.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0031
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3582
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9352,
                                  "PriceHardCurrency": 42,
                                  "WaitingTime": 2620.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0035
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4029
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4277,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 550.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3754
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5371,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 870.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4425
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6483,
                                  "PriceHardCurrency": 29,
                                  "WaitingTime": 1260.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4776
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 10060,
                                  "PriceHardCurrency": 45,
                                  "WaitingTime": 3040.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5372
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3160,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 300.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0016
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.2816
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4008,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 480.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0019
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3319
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 4993,
                                  "PriceHardCurrency": 22,
                                  "WaitingTime": 750.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3582
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 7991,
                                  "PriceHardCurrency": 36,
                                  "WaitingTime": 1920.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4029
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1938,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 110.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0988
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0296
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 2641,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 210.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.1164
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0349
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2474,
                                  "PriceHardCurrency": 11,
                                  "WaitingTime": 180.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0158
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0377
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5226,
                                  "PriceHardCurrency": 23,
                                  "WaitingTime": 820.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0424
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1563,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 70.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0692
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 2122,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 140.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0815
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2930,
                                  "PriceHardCurrency": 13,
                                  "WaitingTime": 260.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.088
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5727,
                                  "PriceHardCurrency": 26,
                                  "WaitingTime": 980.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.099
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 210,
                                "g": 151,
                                "b": 84,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 59,
                                "g": 157,
                                "b": 253,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 215,
                                "g": 117,
                                "b": 95,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 223,
                                "g": 188,
                                "b": 72,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Kamikaze",
                              "PriceSoftCurrency": 6000,
                              "PriceHardCurrency": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "squirrel",
                          "Name": "Squirrel",
                          "TierIndex": 1,
                          "PriceSoftCurrency": 0,
                          "PriceHardCurrency": 800,
                          "DeliveryWaitingTime": 150.0,
                          "DeliveryDiamonds": 20.0,
                          "FartPreset": "purple",
                          "FartColor": [
                            {
                              "r": 89,
                              "g": 164,
                              "b": 131,
                              "a": 255
                            },
                            {
                              "r": 60,
                              "g": 49,
                              "b": 87,
                              "a": 255
                            },
                            {
                              "r": 50,
                              "g": 72,
                              "b": 85,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.0988,
                            "SpeedParam": 20.4531,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 1.9761,
                            "BoostAccBonus": 1.4821,
                            "BoostSpeedBonus": 1.1557
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4015,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 480.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3061
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5030,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 760.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0034
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3558
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5819,
                                  "PriceHardCurrency": 26,
                                  "WaitingTime": 1020.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0034
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3492
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9440,
                                  "PriceHardCurrency": 42,
                                  "WaitingTime": 2670.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0036
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3675
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4784,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 690.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4082
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5947,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1060.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4744
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6667,
                                  "PriceHardCurrency": 30,
                                  "WaitingTime": 1330.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4656
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 10042,
                                  "PriceHardCurrency": 45,
                                  "WaitingTime": 3030.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.49
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3506,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 370.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3061
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4419,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 590.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0023
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3558
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5108,
                                  "PriceHardCurrency": 23,
                                  "WaitingTime": 780.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0023
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3492
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 8029,
                                  "PriceHardCurrency": 36,
                                  "WaitingTime": 1930.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3675
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1920,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 110.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0986
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0222
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 2651,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 210.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.1146
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0258
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 3377,
                                  "PriceHardCurrency": 15,
                                  "WaitingTime": 340.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.1125
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0253
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5388,
                                  "PriceHardCurrency": 24,
                                  "WaitingTime": 870.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0097
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0267
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1480,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 70.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0518
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 2008,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 120.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0601
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2747,
                                  "PriceHardCurrency": 12,
                                  "WaitingTime": 230.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.059
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5627,
                                  "PriceHardCurrency": 25,
                                  "WaitingTime": 950.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0622
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 250,
                                "g": 171,
                                "b": 121,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 235,
                                "g": 83,
                                "b": 145,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 108,
                                "g": 234,
                                "b": 95,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 82,
                                "g": 88,
                                "b": 232,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Bold Hairstyle",
                              "PriceSoftCurrency": 20000,
                              "PriceHardCurrency": 480,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "rhino",
                          "Name": "Rhino",
                          "TierIndex": 1,
                          "PriceSoftCurrency": 40000,
                          "PriceHardCurrency": 1000,
                          "DeliveryWaitingTime": 180.0,
                          "DeliveryDiamonds": 20.0,
                          "FartPreset": "default",
                          "FartColor": [
                            {
                              "r": 55,
                              "g": 204,
                              "b": 80,
                              "a": 255
                            },
                            {
                              "r": 51,
                              "g": 138,
                              "b": 65,
                              "a": 255
                            },
                            {
                              "r": 0,
                              "g": 255,
                              "b": 54,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.0904,
                            "SpeedParam": 19.865,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.6312,
                            "BoostAccBonus": 3.228,
                            "BoostSpeedBonus": 1.1638
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4156,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 520.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0026
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.2874
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5229,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 820.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3333
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6176,
                                  "PriceHardCurrency": 28,
                                  "WaitingTime": 1140.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0031
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3378
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9837,
                                  "PriceHardCurrency": 44,
                                  "WaitingTime": 2900.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0031
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3439
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4956,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 740.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3831
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 6130,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1130.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4443
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 7043,
                                  "PriceHardCurrency": 31,
                                  "WaitingTime": 1490.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4505
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 10524,
                                  "PriceHardCurrency": 47,
                                  "WaitingTime": 3320.0,
                                  "DeliveryDiamonds": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4585
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3648,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 400.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0017
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.2874
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4569,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 630.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3333
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5416,
                                  "PriceHardCurrency": 24,
                                  "WaitingTime": 880.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0021
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3378
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 8377,
                                  "PriceHardCurrency": 37,
                                  "WaitingTime": 2110.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0021
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3439
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 1326,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 50.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0467
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 1952,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 110.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0542
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 2760,
                                  "PriceHardCurrency": 12,
                                  "WaitingTime": 230.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0549
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 5920,
                                  "PriceHardCurrency": 26,
                                  "WaitingTime": 1050.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0559
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 2161,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 140.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.109
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 2789,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 230.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1264
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 3656,
                                  "PriceHardCurrency": 16,
                                  "WaitingTime": 400.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1281
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 6679,
                                  "PriceHardCurrency": 30,
                                  "WaitingTime": 1340.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1303
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 147,
                                "g": 149,
                                "b": 158,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 115,
                                "g": 195,
                                "b": 253,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 255,
                                "g": 214,
                                "b": 104,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 128,
                                "g": 253,
                                "b": 92,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "El Bandido",
                              "PriceSoftCurrency": 6000,
                              "PriceHardCurrency": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "gorilla",
                          "Name": "Gorilla",
                          "TierIndex": 2,
                          "PriceSoftCurrency": 70000,
                          "PriceHardCurrency": 2800,
                          "DeliveryWaitingTime": 2880.0,
                          "DeliveryDiamonds": 61.0,
                          "FartPreset": "orange",
                          "FartColor": [
                            {
                              "r": 115,
                              "g": 162,
                              "b": 70,
                              "a": 255
                            },
                            {
                              "r": 86,
                              "g": 47,
                              "b": 26,
                              "a": 255
                            },
                            {
                              "r": 76,
                              "g": 71,
                              "b": 24,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1138,
                            "SpeedParam": 23.5508,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.2754,
                            "BoostAccBonus": 1.7065,
                            "BoostSpeedBonus": 1.1425
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 7770,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1810.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0035
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3633
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 9707,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2830.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0045
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4633
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 10531,
                                  "PriceHardCurrency": 94,
                                  "WaitingTime": 3330.0,
                                  "DeliveryDiamonds": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0042
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4302
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 16860,
                                  "PriceHardCurrency": 151,
                                  "WaitingTime": 8530.0,
                                  "DeliveryDiamonds": 74,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0048
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5019
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 9293,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2590.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4844
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 11641,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4070.0,
                                  "DeliveryDiamonds": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6178
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 12412,
                                  "PriceHardCurrency": 111,
                                  "WaitingTime": 4620.0,
                                  "DeliveryDiamonds": 40,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5736
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 18772,
                                  "PriceHardCurrency": 168,
                                  "WaitingTime": 10570.0,
                                  "DeliveryDiamonds": 90,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6692
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 7303,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1600.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0023
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3633
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 9236,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2560.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4633
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 9961,
                                  "PriceHardCurrency": 89,
                                  "WaitingTime": 2980.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0028
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4302
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 15787,
                                  "PriceHardCurrency": 141,
                                  "WaitingTime": 7480.0,
                                  "DeliveryDiamonds": 64,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0032
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5019
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 2762,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 230.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0096
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0263
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3278,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 320.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0336
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 4494,
                                  "PriceHardCurrency": 40,
                                  "WaitingTime": 610.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0312
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9318,
                                  "PriceHardCurrency": 83,
                                  "WaitingTime": 2600.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0364
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3025,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 270.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0615
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3714,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 410.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0783
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 4735,
                                  "PriceHardCurrency": 42,
                                  "WaitingTime": 670.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0727
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9407,
                                  "PriceHardCurrency": 84,
                                  "WaitingTime": 2650.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0848
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 133,
                                "g": 189,
                                "b": 211,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 68,
                                "g": 68,
                                "b": 68,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 244,
                                "g": 71,
                                "b": 87,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 181,
                                "g": 74,
                                "b": 236,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Aztec Idol",
                              "PriceSoftCurrency": -1,
                              "PriceHardCurrency": 960,
                              "Bonus": 300
                            }
                          ]
                        },
                        {
                          "Type": "turtle",
                          "Name": "Turtle",
                          "TierIndex": 2,
                          "PriceSoftCurrency": 100000,
                          "PriceHardCurrency": 3750,
                          "DeliveryWaitingTime": 4320.0,
                          "DeliveryDiamonds": 91.0,
                          "FartPreset": "green",
                          "FartColor": [
                            {
                              "r": 52,
                              "g": 219,
                              "b": 104,
                              "a": 255
                            },
                            {
                              "r": 23,
                              "g": 104,
                              "b": 60,
                              "a": 255
                            },
                            {
                              "r": 13,
                              "g": 127,
                              "b": 58,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1049,
                            "SpeedParam": 23.0598,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.6312,
                            "BoostAccBonus": 3.7471,
                            "BoostSpeedBonus": 1.1638
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 8496,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2170.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0031
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3439
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 9907,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2940.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0036
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3972
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 12401,
                                  "PriceHardCurrency": 111,
                                  "WaitingTime": 4610.0,
                                  "DeliveryDiamonds": 40,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0041
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4558
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 18876,
                                  "PriceHardCurrency": 169,
                                  "WaitingTime": 10690.0,
                                  "DeliveryDiamonds": 92,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0044
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.479
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 10079,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3050.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4585
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 11765,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4150.0,
                                  "DeliveryDiamonds": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5296
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 14614,
                                  "PriceHardCurrency": 130,
                                  "WaitingTime": 6410.0,
                                  "DeliveryDiamonds": 56,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6077
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 20908,
                                  "PriceHardCurrency": 187,
                                  "WaitingTime": 13110.0,
                                  "DeliveryDiamonds": 112,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6386
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 7930,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1890.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0021
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3439
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 9438,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2670.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3972
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 11779,
                                  "PriceHardCurrency": 105,
                                  "WaitingTime": 4160.0,
                                  "DeliveryDiamonds": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0028
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4558
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 17653,
                                  "PriceHardCurrency": 158,
                                  "WaitingTime": 9350.0,
                                  "DeliveryDiamonds": 80,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.479
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3493,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 370.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0559
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4282,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 550.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0645
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5884,
                                  "PriceHardCurrency": 53,
                                  "WaitingTime": 1040.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0741
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 11444,
                                  "PriceHardCurrency": 102,
                                  "WaitingTime": 3930.0,
                                  "DeliveryDiamonds": 34,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0778
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4584,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 630.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1303
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5458,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 890.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1506
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 7063,
                                  "PriceHardCurrency": 63,
                                  "WaitingTime": 1500.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1728
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 12352,
                                  "PriceHardCurrency": 110,
                                  "WaitingTime": 4580.0,
                                  "DeliveryDiamonds": 40,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1816
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 149,
                                "g": 213,
                                "b": 57,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 219,
                                "g": 177,
                                "b": 71,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 218,
                                "g": 82,
                                "b": 92,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 91,
                                "g": 199,
                                "b": 221,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Fancy House",
                              "PriceSoftCurrency": 24000,
                              "PriceHardCurrency": 960,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "hippo",
                          "Name": "Hippo",
                          "TierIndex": 2,
                          "PriceSoftCurrency": 50000,
                          "PriceHardCurrency": 2600,
                          "DeliveryWaitingTime": 2880.0,
                          "DeliveryDiamonds": 61.0,
                          "FartPreset": "purple",
                          "FartColor": [
                            {
                              "r": 89,
                              "g": 164,
                              "b": 131,
                              "a": 255
                            },
                            {
                              "r": 60,
                              "g": 49,
                              "b": 87,
                              "a": 255
                            },
                            {
                              "r": 50,
                              "g": 72,
                              "b": 85,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.103,
                            "SpeedParam": 22.6269,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.5818,
                            "BoostAccBonus": 3.6768,
                            "BoostSpeedBonus": 1.1419
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 7340,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1620.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3374
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 8584,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2210.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0036
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3897
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 10700,
                                  "PriceHardCurrency": 96,
                                  "WaitingTime": 3430.0,
                                  "DeliveryDiamonds": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0041
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4472
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 16323,
                                  "PriceHardCurrency": 146,
                                  "WaitingTime": 7990.0,
                                  "DeliveryDiamonds": 68,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0043
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.47
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 8730,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2290.0,
                                  "DeliveryDiamonds": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4499
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 10161,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3100.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5196
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 12640,
                                  "PriceHardCurrency": 113,
                                  "WaitingTime": 4790.0,
                                  "DeliveryDiamonds": 42,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5963
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 18067,
                                  "PriceHardCurrency": 161,
                                  "WaitingTime": 9790.0,
                                  "DeliveryDiamonds": 84,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6266
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 6876,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1420.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3374
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 8117,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1980.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3897
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 10131,
                                  "PriceHardCurrency": 90,
                                  "WaitingTime": 3080.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0027
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4472
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 15253,
                                  "PriceHardCurrency": 136,
                                  "WaitingTime": 6980.0,
                                  "DeliveryDiamonds": 60,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.47
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3021,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 270.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0548
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3691,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 410.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0633
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5073,
                                  "PriceHardCurrency": 45,
                                  "WaitingTime": 770.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0727
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9875,
                                  "PriceHardCurrency": 88,
                                  "WaitingTime": 2930.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0764
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3950,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 470.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1279
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4680,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 660.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1478
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6087,
                                  "PriceHardCurrency": 54,
                                  "WaitingTime": 1110.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1696
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 10707,
                                  "PriceHardCurrency": 96,
                                  "WaitingTime": 3440.0,
                                  "DeliveryDiamonds": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1782
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 159,
                                "g": 189,
                                "b": 206,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 219,
                                "g": 146,
                                "b": 233,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 99,
                                "g": 168,
                                "b": 252,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 164,
                                "g": 241,
                                "b": 111,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Holy-but-Horny",
                              "PriceSoftCurrency": 12000,
                              "PriceHardCurrency": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "croko",
                          "Name": "Croko",
                          "TierIndex": 2,
                          "PriceSoftCurrency": 80000,
                          "PriceHardCurrency": 3000,
                          "DeliveryWaitingTime": 2880.0,
                          "DeliveryDiamonds": 61.0,
                          "FartPreset": "yellow",
                          "FartColor": [
                            {
                              "r": 115,
                              "g": 217,
                              "b": 70,
                              "a": 255
                            },
                            {
                              "r": 86,
                              "g": 102,
                              "b": 26,
                              "a": 255
                            },
                            {
                              "r": 76,
                              "g": 125,
                              "b": 24,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1029,
                            "SpeedParam": 23.7417,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.3897,
                            "BoostAccBonus": 2.4991,
                            "BoostSpeedBonus": 1.1451
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 8254,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2040.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0035
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4011
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 8961,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2410.0,
                                  "DeliveryDiamonds": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0036
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4122
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 10545,
                                  "PriceHardCurrency": 94,
                                  "WaitingTime": 3340.0,
                                  "DeliveryDiamonds": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0037
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4287
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 17067,
                                  "PriceHardCurrency": 152,
                                  "WaitingTime": 8740.0,
                                  "DeliveryDiamonds": 74,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0044
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5112
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 9939,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2960.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5349
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 10647,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3400.0,
                                  "DeliveryDiamonds": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5496
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 12357,
                                  "PriceHardCurrency": 110,
                                  "WaitingTime": 4580.0,
                                  "DeliveryDiamonds": 40,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5716
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 19006,
                                  "PriceHardCurrency": 170,
                                  "WaitingTime": 10840.0,
                                  "DeliveryDiamonds": 92,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6815
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 7787,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1820.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0023
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4011
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 8494,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2160.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4122
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 9978,
                                  "PriceHardCurrency": 89,
                                  "WaitingTime": 2990.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0025
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4287
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 15996,
                                  "PriceHardCurrency": 143,
                                  "WaitingTime": 7680.0,
                                  "DeliveryDiamonds": 66,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5112
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 2846,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 240.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0422
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3462,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 360.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0434
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 4736,
                                  "PriceHardCurrency": 42,
                                  "WaitingTime": 670.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0451
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9709,
                                  "PriceHardCurrency": 87,
                                  "WaitingTime": 2830.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0538
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3589,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 390.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0986
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4077,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 500.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1012
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5285,
                                  "PriceHardCurrency": 47,
                                  "WaitingTime": 840.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1053
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 10070,
                                  "PriceHardCurrency": 90,
                                  "WaitingTime": 3040.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1255
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 138,
                                "g": 184,
                                "b": 91,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 42,
                                "g": 98,
                                "b": 241,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 245,
                                "g": 234,
                                "b": 30,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 221,
                                "g": 28,
                                "b": 146,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Iron Panties",
                              "PriceSoftCurrency": 18000,
                              "PriceHardCurrency": 720,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "elephant",
                          "Name": "Elephant",
                          "TierIndex": 2,
                          "PriceSoftCurrency": 60000,
                          "PriceHardCurrency": 2700,
                          "DeliveryWaitingTime": 2880.0,
                          "DeliveryDiamonds": 61.0,
                          "FartPreset": "default",
                          "FartColor": [
                            {
                              "r": 55,
                              "g": 204,
                              "b": 80,
                              "a": 255
                            },
                            {
                              "r": 51,
                              "g": 138,
                              "b": 65,
                              "a": 255
                            },
                            {
                              "r": 0,
                              "g": 255,
                              "b": 54,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1031,
                            "SpeedParam": 22.6451,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.5839,
                            "BoostAccBonus": 3.6797,
                            "BoostSpeedBonus": 1.1429
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 7343,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1620.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3377
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 8587,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2210.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0036
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.39
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 10703,
                                  "PriceHardCurrency": 96,
                                  "WaitingTime": 3440.0,
                                  "DeliveryDiamonds": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0041
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4476
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 16327,
                                  "PriceHardCurrency": 146,
                                  "WaitingTime": 8000.0,
                                  "DeliveryDiamonds": 68,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0043
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4703
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 8733,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2290.0,
                                  "DeliveryDiamonds": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4502
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 10165,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3100.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.52
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 12645,
                                  "PriceHardCurrency": 113,
                                  "WaitingTime": 4800.0,
                                  "DeliveryDiamonds": 42,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5968
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 18072,
                                  "PriceHardCurrency": 161,
                                  "WaitingTime": 9800.0,
                                  "DeliveryDiamonds": 84,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6271
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 6879,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1420.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.002
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.3377
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 8120,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1980.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.39
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 10184,
                                  "PriceHardCurrency": 91,
                                  "WaitingTime": 3110.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0027
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4476
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 15257,
                                  "PriceHardCurrency": 136,
                                  "WaitingTime": 6980.0,
                                  "DeliveryDiamonds": 60,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4703
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3022,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 270.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0549
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3692,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 410.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0634
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5074,
                                  "PriceHardCurrency": 45,
                                  "WaitingTime": 770.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0727
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 9875,
                                  "PriceHardCurrency": 88,
                                  "WaitingTime": 2930.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0764
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3951,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 470.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.128
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4681,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 660.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1479
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6088,
                                  "PriceHardCurrency": 54,
                                  "WaitingTime": 1110.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1697
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 10708,
                                  "PriceHardCurrency": 96,
                                  "WaitingTime": 3440.0,
                                  "DeliveryDiamonds": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1783
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 64,
                                "g": 138,
                                "b": 190,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 115,
                                "g": 128,
                                "b": 146,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 223,
                                "g": 34,
                                "b": 110,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 110,
                                "g": 220,
                                "b": 53,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Grenadier",
                              "PriceSoftCurrency": 12000,
                              "PriceHardCurrency": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "unicorn",
                          "Name": "Unicorn",
                          "TierIndex": 2,
                          "PriceSoftCurrency": 0,
                          "PriceHardCurrency": 5000,
                          "DeliveryWaitingTime": 4320.0,
                          "DeliveryDiamonds": 91.0,
                          "FartPreset": "default",
                          "FartColor": [
                            {
                              "r": 55,
                              "g": 204,
                              "b": 80,
                              "a": 255
                            },
                            {
                              "r": 51,
                              "g": 138,
                              "b": 65,
                              "a": 255
                            },
                            {
                              "r": 0,
                              "g": 255,
                              "b": 54,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1162,
                            "SpeedParam": 24.0486,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.3235,
                            "BoostAccBonus": 1.7426,
                            "BoostSpeedBonus": 1.1667
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 9162,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2520.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0036
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.371
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 11459,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3940.0,
                                  "DeliveryDiamonds": 34,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0046
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4731
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 12447,
                                  "PriceHardCurrency": 111,
                                  "WaitingTime": 4650.0,
                                  "DeliveryDiamonds": 40,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0043
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4393
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 19912,
                                  "PriceHardCurrency": 178,
                                  "WaitingTime": 11890.0,
                                  "DeliveryDiamonds": 102,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0049
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5125
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 10937,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3590.0,
                                  "DeliveryDiamonds": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4946
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 13778,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5690.0,
                                  "DeliveryDiamonds": 50,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6309
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 14636,
                                  "PriceHardCurrency": 131,
                                  "WaitingTime": 6430.0,
                                  "DeliveryDiamonds": 56,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5857
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 22141,
                                  "PriceHardCurrency": 198,
                                  "WaitingTime": 14710.0,
                                  "DeliveryDiamonds": 124,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6833
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 8592,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2210.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.371
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 10934,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3590.0,
                                  "DeliveryDiamonds": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4731
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 11774,
                                  "PriceHardCurrency": 105,
                                  "WaitingTime": 4160.0,
                                  "DeliveryDiamonds": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0028
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4393
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 18635,
                                  "PriceHardCurrency": 166,
                                  "WaitingTime": 10420.0,
                                  "DeliveryDiamonds": 88,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0033
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5125
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3255,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 320.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 4,
                                      "Value": 0.0098
                                    },
                                    {
                                      "Type": 5,
                                      "Value": 0.0269
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3864,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 450.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0343
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5274,
                                  "PriceHardCurrency": 47,
                                  "WaitingTime": 830.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0318
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 11011,
                                  "PriceHardCurrency": 98,
                                  "WaitingTime": 3640.0,
                                  "DeliveryDiamonds": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0371
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3583,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 390.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0628
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4416,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 590.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.08
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5622,
                                  "PriceHardCurrency": 50,
                                  "WaitingTime": 950.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0743
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 11075,
                                  "PriceHardCurrency": 99,
                                  "WaitingTime": 3680.0,
                                  "DeliveryDiamonds": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0866
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 224,
                                "g": 190,
                                "b": 100,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 159,
                                "g": 88,
                                "b": 169,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 134,
                                "g": 221,
                                "b": 130,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 95,
                                "g": 164,
                                "b": 223,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Swordfish Helmet",
                              "PriceSoftCurrency": 12000,
                              "PriceHardCurrency": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "giraffe",
                          "Name": "Giraffe",
                          "TierIndex": 2,
                          "PriceSoftCurrency": 90000,
                          "PriceHardCurrency": 3500,
                          "DeliveryWaitingTime": 3600.0,
                          "DeliveryDiamonds": 76.0,
                          "FartPreset": "orange",
                          "FartColor": [
                            {
                              "r": 115,
                              "g": 162,
                              "b": 70,
                              "a": 255
                            },
                            {
                              "r": 86,
                              "g": 47,
                              "b": 26,
                              "a": 255
                            },
                            {
                              "r": 76,
                              "g": 71,
                              "b": 24,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1033,
                            "SpeedParam": 23.8442,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.4,
                            "BoostAccBonus": 2.5099,
                            "BoostSpeedBonus": 1.15
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 8557,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2200.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0035
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4029
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 9269,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2580.0,
                                  "DeliveryDiamonds": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0036
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.414
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 10912,
                                  "PriceHardCurrency": 97,
                                  "WaitingTime": 3570.0,
                                  "DeliveryDiamonds": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0037
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4306
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 17676,
                                  "PriceHardCurrency": 158,
                                  "WaitingTime": 9370.0,
                                  "DeliveryDiamonds": 80,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0044
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5134
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 10307,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3190.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5372
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 11023,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3650.0,
                                  "DeliveryDiamonds": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.552
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 12844,
                                  "PriceHardCurrency": 115,
                                  "WaitingTime": 4950.0,
                                  "DeliveryDiamonds": 44,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5741
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 19648,
                                  "PriceHardCurrency": 175,
                                  "WaitingTime": 11580.0,
                                  "DeliveryDiamonds": 98,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6845
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 8090,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1960.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4029
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 8802,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 2320.0,
                                  "DeliveryDiamonds": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0024
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.414
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 10344,
                                  "PriceHardCurrency": 92,
                                  "WaitingTime": 3210.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0025
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4306
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 16554,
                                  "PriceHardCurrency": 148,
                                  "WaitingTime": 8220.0,
                                  "DeliveryDiamonds": 70,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5134
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 2967,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 260.0,
                                  "DeliveryDiamonds": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0424
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 3583,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 390.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0436
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 4909,
                                  "PriceHardCurrency": 44,
                                  "WaitingTime": 720.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0453
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 10035,
                                  "PriceHardCurrency": 90,
                                  "WaitingTime": 3020.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.054
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 3689,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 410.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.099
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 4227,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 540.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1016
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 5437,
                                  "PriceHardCurrency": 49,
                                  "WaitingTime": 890.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1058
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 10432,
                                  "PriceHardCurrency": 93,
                                  "WaitingTime": 3260.0,
                                  "DeliveryDiamonds": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1261
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 213,
                                "g": 120,
                                "b": 41,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 235,
                                "g": 58,
                                "b": 110,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 81,
                                "g": 170,
                                "b": 213,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 121,
                                "g": 53,
                                "b": 197,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Zebraffe",
                              "PriceSoftCurrency": 11000,
                              "PriceHardCurrency": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "wolf",
                          "Name": "Wolf",
                          "TierIndex": 3,
                          "PriceSoftCurrency": 150000,
                          "PriceHardCurrency": 4500,
                          "DeliveryWaitingTime": 18000.0,
                          "DeliveryDiamonds": 151.0,
                          "FartPreset": "crimson",
                          "FartColor": [
                            {
                              "r": 115,
                              "g": 156,
                              "b": 89,
                              "a": 255
                            },
                            {
                              "r": 86,
                              "g": 41,
                              "b": 46,
                              "a": 255
                            },
                            {
                              "r": 76,
                              "g": 64,
                              "b": 43,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1206,
                            "SpeedParam": 27.8063,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.3832,
                            "BoostAccBonus": 2.927,
                            "BoostSpeedBonus": 1.1419
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 11735,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4130.0,
                                  "DeliveryDiamonds": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0044
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5098
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 13514,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5480.0,
                                  "DeliveryDiamonds": 48,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0051
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5842
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 16101,
                                  "PriceHardCurrency": 216,
                                  "WaitingTime": 7780.0,
                                  "DeliveryDiamonds": 66,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0055
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6327
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 23880,
                                  "PriceHardCurrency": 320,
                                  "WaitingTime": 17110.0,
                                  "DeliveryDiamonds": 144,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.006
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6907
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 14075,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5940.0,
                                  "DeliveryDiamonds": 52,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6797
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 16217,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 7890.0,
                                  "DeliveryDiamonds": 68,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7789
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 19041,
                                  "PriceHardCurrency": 255,
                                  "WaitingTime": 10880.0,
                                  "DeliveryDiamonds": 92,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8436
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 27053,
                                  "PriceHardCurrency": 362,
                                  "WaitingTime": 21960.0,
                                  "DeliveryDiamonds": 186,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.9209
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 11113,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3700.0,
                                  "DeliveryDiamonds": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5098
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 12789,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4910.0,
                                  "DeliveryDiamonds": 42,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0034
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5842
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 15073,
                                  "PriceHardCurrency": 202,
                                  "WaitingTime": 6820.0,
                                  "DeliveryDiamonds": 58,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0037
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6327
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 22000,
                                  "PriceHardCurrency": 295,
                                  "WaitingTime": 14520.0,
                                  "DeliveryDiamonds": 124,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.004
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6907
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4507,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 610.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0537
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5376,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 870.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0615
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 7152,
                                  "PriceHardCurrency": 96,
                                  "WaitingTime": 1530.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0666
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 13894,
                                  "PriceHardCurrency": 186,
                                  "WaitingTime": 5790.0,
                                  "DeliveryDiamonds": 50,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0727
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 5534,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 920.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1252
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 6410,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1230.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1435
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 8387,
                                  "PriceHardCurrency": 112,
                                  "WaitingTime": 2110.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1554
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 15153,
                                  "PriceHardCurrency": 203,
                                  "WaitingTime": 6890.0,
                                  "DeliveryDiamonds": 60,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1697
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 206,
                                "g": 196,
                                "b": 174,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 100,
                                "g": 105,
                                "b": 255,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 246,
                                "g": 100,
                                "b": 73,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 197,
                                "g": 198,
                                "b": 174,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Space Glasses",
                              "PriceSoftCurrency": 40000,
                              "PriceHardCurrency": 1100,
                              "Bonus": 375
                            }
                          ]
                        },
                        {
                          "Type": "raccoon",
                          "Name": "Raccoon",
                          "TierIndex": 3,
                          "PriceSoftCurrency": 250000,
                          "PriceHardCurrency": 6500,
                          "DeliveryWaitingTime": 18000.0,
                          "DeliveryDiamonds": 151.0,
                          "FartPreset": "yellow",
                          "FartColor": [
                            {
                              "r": 115,
                              "g": 217,
                              "b": 70,
                              "a": 255
                            },
                            {
                              "r": 86,
                              "g": 102,
                              "b": 26,
                              "a": 255
                            },
                            {
                              "r": 76,
                              "g": 125,
                              "b": 24,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1341,
                            "SpeedParam": 27.7543,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.2862,
                            "BoostAccBonus": 2.0112,
                            "BoostSpeedBonus": 1.1431
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 12144,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4420.0,
                                  "DeliveryDiamonds": 38,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0048
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5021
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 14204,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 6050.0,
                                  "DeliveryDiamonds": 52,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0057
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5895
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 16654,
                                  "PriceHardCurrency": 223,
                                  "WaitingTime": 8320.0,
                                  "DeliveryDiamonds": 72,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0061
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6299
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 23684,
                                  "PriceHardCurrency": 317,
                                  "WaitingTime": 16830.0,
                                  "DeliveryDiamonds": 142,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0061
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6348
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 14540,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 6340.0,
                                  "DeliveryDiamonds": 54,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6695
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 17050,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 8720.0,
                                  "DeliveryDiamonds": 74,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7861
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 19810,
                                  "PriceHardCurrency": 265,
                                  "WaitingTime": 11770.0,
                                  "DeliveryDiamonds": 100,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8399
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 26764,
                                  "PriceHardCurrency": 358,
                                  "WaitingTime": 21490.0,
                                  "DeliveryDiamonds": 182,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8465
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 11519,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3980.0,
                                  "DeliveryDiamonds": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0032
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5021
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 13424,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5410.0,
                                  "DeliveryDiamonds": 48,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0038
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5895
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 15672,
                                  "PriceHardCurrency": 210,
                                  "WaitingTime": 7370.0,
                                  "DeliveryDiamonds": 64,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0041
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6299
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 21751,
                                  "PriceHardCurrency": 291,
                                  "WaitingTime": 14190.0,
                                  "DeliveryDiamonds": 120,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0041
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6348
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4331,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 560.0,
                                  "DeliveryDiamonds": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0364
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5132,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 790.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0427
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 6929,
                                  "PriceHardCurrency": 93,
                                  "WaitingTime": 1440.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0457
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 13584,
                                  "PriceHardCurrency": 182,
                                  "WaitingTime": 5540.0,
                                  "DeliveryDiamonds": 48,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.046
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 5006,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 750.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0849
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5892,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1040.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0997
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 7801,
                                  "PriceHardCurrency": 104,
                                  "WaitingTime": 1830.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1065
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 14313,
                                  "PriceHardCurrency": 192,
                                  "WaitingTime": 6150.0,
                                  "DeliveryDiamonds": 54,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1073
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 95,
                                "g": 95,
                                "b": 95,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 147,
                                "g": 73,
                                "b": 233,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 202,
                                "g": 121,
                                "b": 39,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 84,
                                "g": 154,
                                "b": 46,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Megazorder",
                              "PriceSoftCurrency": -1,
                              "PriceHardCurrency": 1056,
                              "Bonus": 450
                            }
                          ]
                        },
                        {
                          "Type": "panda",
                          "Name": "Panda",
                          "TierIndex": 3,
                          "PriceSoftCurrency": 200000,
                          "PriceHardCurrency": 6000,
                          "DeliveryWaitingTime": 18000.0,
                          "DeliveryDiamonds": 151.0,
                          "FartPreset": "default",
                          "FartColor": [
                            {
                              "r": 55,
                              "g": 204,
                              "b": 80,
                              "a": 255
                            },
                            {
                              "r": 51,
                              "g": 138,
                              "b": 65,
                              "a": 255
                            },
                            {
                              "r": 0,
                              "g": 255,
                              "b": 54,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.121,
                            "SpeedParam": 26.5948,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.587,
                            "BoostAccBonus": 4.3216,
                            "BoostSpeedBonus": 1.1442
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 11438,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3920.0,
                                  "DeliveryDiamonds": 34,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0043
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4709
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 13557,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5510.0,
                                  "DeliveryDiamonds": 48,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0051
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5614
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 15964,
                                  "PriceHardCurrency": 214,
                                  "WaitingTime": 7650.0,
                                  "DeliveryDiamonds": 66,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0055
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6001
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 23335,
                                  "PriceHardCurrency": 313,
                                  "WaitingTime": 16340.0,
                                  "DeliveryDiamonds": 138,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0057
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6206
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 13661,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5600.0,
                                  "DeliveryDiamonds": 48,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6279
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 16188,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 7860.0,
                                  "DeliveryDiamonds": 68,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7486
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 18889,
                                  "PriceHardCurrency": 253,
                                  "WaitingTime": 10700.0,
                                  "DeliveryDiamonds": 92,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8001
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 26213,
                                  "PriceHardCurrency": 351,
                                  "WaitingTime": 20610.0,
                                  "DeliveryDiamonds": 174,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8274
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 10815,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3510.0,
                                  "DeliveryDiamonds": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4709
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 12781,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4900.0,
                                  "DeliveryDiamonds": 42,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0034
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5614
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 14986,
                                  "PriceHardCurrency": 201,
                                  "WaitingTime": 6740.0,
                                  "DeliveryDiamonds": 58,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0037
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6001
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 21356,
                                  "PriceHardCurrency": 286,
                                  "WaitingTime": 13680.0,
                                  "DeliveryDiamonds": 116,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0038
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6206
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4940,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 730.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0765
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5918,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1050.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0912
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 7766,
                                  "PriceHardCurrency": 104,
                                  "WaitingTime": 1810.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0975
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 14518,
                                  "PriceHardCurrency": 194,
                                  "WaitingTime": 6320.0,
                                  "DeliveryDiamonds": 54,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1009
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 6475,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1260.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1785
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 7609,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1740.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2129
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 9688,
                                  "PriceHardCurrency": 130,
                                  "WaitingTime": 2820.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2275
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 16409,
                                  "PriceHardCurrency": 220,
                                  "WaitingTime": 8080.0,
                                  "DeliveryDiamonds": 70,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2353
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 237,
                                "g": 237,
                                "b": 245,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 221,
                                "g": 42,
                                "b": 96,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 84,
                                "g": 87,
                                "b": 159,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 106,
                                "g": 156,
                                "b": 57,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Psycho",
                              "PriceSoftCurrency": 80000,
                              "PriceHardCurrency": 2200,
                              "Bonus": 375
                            }
                          ]
                        },
                        {
                          "Type": "bunny",
                          "Name": "Bunny",
                          "TierIndex": 3,
                          "PriceSoftCurrency": 400000,
                          "PriceHardCurrency": 8000,
                          "DeliveryWaitingTime": 22500.0,
                          "DeliveryDiamonds": 189.0,
                          "FartPreset": "crimson",
                          "FartColor": [
                            {
                              "r": 115,
                              "g": 156,
                              "b": 89,
                              "a": 255
                            },
                            {
                              "r": 86,
                              "g": 41,
                              "b": 46,
                              "a": 255
                            },
                            {
                              "r": 76,
                              "g": 64,
                              "b": 43,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.135,
                            "SpeedParam": 27.9413,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.3016,
                            "BoostAccBonus": 2.0247,
                            "BoostSpeedBonus": 1.1508
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 12782,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4900.0,
                                  "DeliveryDiamonds": 42,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0049
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5055
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 14968,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 6720.0,
                                  "DeliveryDiamonds": 58,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0058
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5935
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 17553,
                                  "PriceHardCurrency": 235,
                                  "WaitingTime": 9240.0,
                                  "DeliveryDiamonds": 80,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0061
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6342
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 24987,
                                  "PriceHardCurrency": 335,
                                  "WaitingTime": 18730.0,
                                  "DeliveryDiamonds": 158,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0062
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6391
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 15367,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 7080.0,
                                  "DeliveryDiamonds": 62,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.674
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 17978,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 9700.0,
                                  "DeliveryDiamonds": 82,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7914
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 20884,
                                  "PriceHardCurrency": 280,
                                  "WaitingTime": 13080.0,
                                  "DeliveryDiamonds": 112,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8456
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 28245,
                                  "PriceHardCurrency": 378,
                                  "WaitingTime": 23930.0,
                                  "DeliveryDiamonds": 202,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8522
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 12105,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4400.0,
                                  "DeliveryDiamonds": 38,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0032
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5055
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 14135,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5990.0,
                                  "DeliveryDiamonds": 52,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0038
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5935
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 16519,
                                  "PriceHardCurrency": 221,
                                  "WaitingTime": 8190.0,
                                  "DeliveryDiamonds": 70,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0041
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6342
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 22952,
                                  "PriceHardCurrency": 307,
                                  "WaitingTime": 15800.0,
                                  "DeliveryDiamonds": 134,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0041
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6391
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4562,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 620.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0366
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5419,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 880.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.043
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 7269,
                                  "PriceHardCurrency": 97,
                                  "WaitingTime": 1590.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.046
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 14324,
                                  "PriceHardCurrency": 192,
                                  "WaitingTime": 6160.0,
                                  "DeliveryDiamonds": 54,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0463
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 5279,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 840.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0855
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 6178,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1150.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1004
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 8193,
                                  "PriceHardCurrency": 110,
                                  "WaitingTime": 2010.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1072
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 15106,
                                  "PriceHardCurrency": 202,
                                  "WaitingTime": 6850.0,
                                  "DeliveryDiamonds": 60,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.108
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 255,
                                "g": 133,
                                "b": 219,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 154,
                                "g": 154,
                                "b": 154,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 230,
                                "g": 188,
                                "b": 62,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 77,
                                "g": 158,
                                "b": 236,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 10,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Carrot",
                              "PriceSoftCurrency": 66000,
                              "PriceHardCurrency": 2200,
                              "Bonus": 375
                            }
                          ]
                        },
                        {
                          "Type": "tiger",
                          "Name": "Tiger",
                          "TierIndex": 3,
                          "PriceSoftCurrency": 900000,
                          "PriceHardCurrency": 20000,
                          "DeliveryWaitingTime": 27000.0,
                          "DeliveryDiamonds": 226.0,
                          "FartPreset": "orange",
                          "FartColor": [
                            {
                              "r": 115,
                              "g": 162,
                              "b": 70,
                              "a": 255
                            },
                            {
                              "r": 86,
                              "g": 47,
                              "b": 26,
                              "a": 255
                            },
                            {
                              "r": 76,
                              "g": 71,
                              "b": 24,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1229,
                            "SpeedParam": 28.3383,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.4288,
                            "BoostAccBonus": 2.983,
                            "BoostSpeedBonus": 1.1638
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 13610,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5560.0,
                                  "DeliveryDiamonds": 48,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0045
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5195
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 15668,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 7360.0,
                                  "DeliveryDiamonds": 64,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0052
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5953
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 18621,
                                  "PriceHardCurrency": 249,
                                  "WaitingTime": 10400.0,
                                  "DeliveryDiamonds": 88,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0056
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6448
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 27689,
                                  "PriceHardCurrency": 371,
                                  "WaitingTime": 23000.0,
                                  "DeliveryDiamonds": 194,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0061
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.7039
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 16294,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 7960.0,
                                  "DeliveryDiamonds": 68,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6927
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 18773,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 10570.0,
                                  "DeliveryDiamonds": 90,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7938
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 22101,
                                  "PriceHardCurrency": 296,
                                  "WaitingTime": 14650.0,
                                  "DeliveryDiamonds": 124,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8598
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 31347,
                                  "PriceHardCurrency": 420,
                                  "WaitingTime": 29480.0,
                                  "DeliveryDiamonds": 248,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.9385
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 12885,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4980.0,
                                  "DeliveryDiamonds": 44,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5195
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 14789,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 6560.0,
                                  "DeliveryDiamonds": 56,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0034
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5953
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 17490,
                                  "PriceHardCurrency": 234,
                                  "WaitingTime": 9180.0,
                                  "DeliveryDiamonds": 78,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0037
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6448
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 25455,
                                  "PriceHardCurrency": 341,
                                  "WaitingTime": 19440.0,
                                  "DeliveryDiamonds": 164,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.004
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.7039
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 5235,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 820.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0547
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 6222,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1160.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0627
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 8310,
                                  "PriceHardCurrency": 111,
                                  "WaitingTime": 2070.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0679
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 16067,
                                  "PriceHardCurrency": 215,
                                  "WaitingTime": 7740.0,
                                  "DeliveryDiamonds": 66,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0741
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 6382,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1220.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1276
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 7452,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1670.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1463
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 9707,
                                  "PriceHardCurrency": 130,
                                  "WaitingTime": 2830.0,
                                  "DeliveryDiamonds": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1583
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 17507,
                                  "PriceHardCurrency": 234,
                                  "WaitingTime": 9190.0,
                                  "DeliveryDiamonds": 78,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1729
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 255,
                                "g": 197,
                                "b": 69,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 236,
                                "g": 236,
                                "b": 238,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 8,
                                "g": 155,
                                "b": 239,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 192,
                                "g": 45,
                                "b": 48,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Pirate Bandana",
                              "PriceSoftCurrency": 20000,
                              "PriceHardCurrency": 720,
                              "Bonus": 375
                            }
                          ]
                        },
                        {
                          "Type": "dragon",
                          "Name": "Dragon",
                          "TierIndex": 3,
                          "PriceSoftCurrency": 0,
                          "PriceHardCurrency": 9000,
                          "DeliveryWaitingTime": 22500.0,
                          "DeliveryDiamonds": 189.0,
                          "FartPreset": "blue",
                          "FartColor": [
                            {
                              "r": 60,
                              "g": 180,
                              "b": 131,
                              "a": 255
                            },
                            {
                              "r": 32,
                              "g": 65,
                              "b": 87,
                              "a": 255
                            },
                            {
                              "r": 21,
                              "g": 88,
                              "b": 85,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1219,
                            "SpeedParam": 26.8032,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.6073,
                            "BoostAccBonus": 4.3555,
                            "BoostSpeedBonus": 1.1532
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 12157,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4430.0,
                                  "DeliveryDiamonds": 38,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0043
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4746
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 14416,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 6230.0,
                                  "DeliveryDiamonds": 54,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0051
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5658
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 17012,
                                  "PriceHardCurrency": 228,
                                  "WaitingTime": 8680.0,
                                  "DeliveryDiamonds": 74,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0055
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6048
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 24803,
                                  "PriceHardCurrency": 332,
                                  "WaitingTime": 18460.0,
                                  "DeliveryDiamonds": 156,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0057
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6254
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 14531,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 6330.0,
                                  "DeliveryDiamonds": 54,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6328
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 17226,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 8900.0,
                                  "DeliveryDiamonds": 76,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7545
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 20078,
                                  "PriceHardCurrency": 269,
                                  "WaitingTime": 12090.0,
                                  "DeliveryDiamonds": 102,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8064
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 27929,
                                  "PriceHardCurrency": 374,
                                  "WaitingTime": 23400.0,
                                  "DeliveryDiamonds": 198,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8339
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 11533,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 3990.0,
                                  "DeliveryDiamonds": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0029
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.4746
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 13588,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5540.0,
                                  "DeliveryDiamonds": 48,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0034
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5658
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 15932,
                                  "PriceHardCurrency": 213,
                                  "WaitingTime": 7610.0,
                                  "DeliveryDiamonds": 66,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0037
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6048
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 22722,
                                  "PriceHardCurrency": 304,
                                  "WaitingTime": 15490.0,
                                  "DeliveryDiamonds": 132,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0038
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6254
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 5265,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 830.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0771
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 6258,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1170.0,
                                  "DeliveryDiamonds": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0919
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 8262,
                                  "PriceHardCurrency": 111,
                                  "WaitingTime": 2050.0,
                                  "DeliveryDiamonds": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0983
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 15418,
                                  "PriceHardCurrency": 206,
                                  "WaitingTime": 7130.0,
                                  "DeliveryDiamonds": 62,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1017
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 6851,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1410.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1799
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 8119,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1980.0,
                                  "DeliveryDiamonds": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2145
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 10262,
                                  "PriceHardCurrency": 137,
                                  "WaitingTime": 3160.0,
                                  "DeliveryDiamonds": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2293
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 17441,
                                  "PriceHardCurrency": 234,
                                  "WaitingTime": 9130.0,
                                  "DeliveryDiamonds": 78,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2372
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 241,
                                "g": 86,
                                "b": 78,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 30,
                                "g": 43,
                                "b": 218,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 255,
                                "g": 237,
                                "b": 59,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 94,
                                "g": 255,
                                "b": 205,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Samurai",
                              "PriceSoftCurrency": -1,
                              "PriceHardCurrency": 1100,
                              "Bonus": 500
                            }
                          ]
                        },
                        {
                          "Type": "reindeer",
                          "Name": "Reindeer",
                          "TierIndex": 3,
                          "PriceSoftCurrency": 300000,
                          "PriceHardCurrency": 7000,
                          "DeliveryWaitingTime": 22500.0,
                          "DeliveryDiamonds": 189.0,
                          "FartPreset": "purple",
                          "FartColor": [
                            {
                              "r": 89,
                              "g": 164,
                              "b": 131,
                              "a": 255
                            },
                            {
                              "r": 60,
                              "g": 49,
                              "b": 87,
                              "a": 255
                            },
                            {
                              "r": 50,
                              "g": 72,
                              "b": 85,
                              "a": 255
                            }
                          ],
                          "EngineParams": {
                            "NerfFactor": 1.0,
                            "AccParam": 0.1214,
                            "SpeedParam": 28.0023,
                            "StartSpeed": 0.0,
                            "Gearbox": 0.0,
                            "BoostTime": 2.4,
                            "BoostAccBonus": 2.9476,
                            "BoostSpeedBonus": 1.15
                          },
                          "Upgrades": [
                            {
                              "Type": "muscles",
                              "Name": "Muscles",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 12399,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4610.0,
                                  "DeliveryDiamonds": 40,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0044
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5134
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 14239,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 6080.0,
                                  "DeliveryDiamonds": 52,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0051
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5883
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 16915,
                                  "PriceHardCurrency": 227,
                                  "WaitingTime": 8580.0,
                                  "DeliveryDiamonds": 74,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0055
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6372
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 25191,
                                  "PriceHardCurrency": 337,
                                  "WaitingTime": 19040.0,
                                  "DeliveryDiamonds": 160,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.006
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6955
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "lung",
                              "Name": "Lungs",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 14823,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 6590.0,
                                  "DeliveryDiamonds": 56,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6845
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 17094,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 8770.0,
                                  "DeliveryDiamonds": 76,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7844
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 20071,
                                  "PriceHardCurrency": 269,
                                  "WaitingTime": 12090.0,
                                  "DeliveryDiamonds": 102,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8496
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 28495,
                                  "PriceHardCurrency": 382,
                                  "WaitingTime": 24360.0,
                                  "DeliveryDiamonds": 206,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.9274
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "reflex",
                              "Name": "Heart",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 11726,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 4120.0,
                                  "DeliveryDiamonds": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.003
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5134
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 13462,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 5440.0,
                                  "DeliveryDiamonds": 48,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0034
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.5883
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 15886,
                                  "PriceHardCurrency": 213,
                                  "WaitingTime": 7570.0,
                                  "DeliveryDiamonds": 66,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.0037
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6372
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 23159,
                                  "PriceHardCurrency": 310,
                                  "WaitingTime": 16090.0,
                                  "DeliveryDiamonds": 136,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 0,
                                      "Value": 0.004
                                    },
                                    {
                                      "Type": 1,
                                      "Value": 0.6955
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost",
                              "Name": "Belly",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 4751,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 680.0,
                                  "DeliveryDiamonds": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.054
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 5625,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 950.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.062
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 7555,
                                  "PriceHardCurrency": 101,
                                  "WaitingTime": 1710.0,
                                  "DeliveryDiamonds": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0671
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 14603,
                                  "PriceHardCurrency": 196,
                                  "WaitingTime": 6400.0,
                                  "DeliveryDiamonds": 56,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0732
                                    }
                                  ]
                                }
                              ]
                            },
                            {
                              "Type": "boost2",
                              "Name": "Buttocks",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceSoftCurrency": 5834,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1020.0,
                                  "DeliveryDiamonds": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1261
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceSoftCurrency": 6775,
                                  "PriceHardCurrency": 0,
                                  "WaitingTime": 1380.0,
                                  "DeliveryDiamonds": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1446
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceSoftCurrency": 8862,
                                  "PriceHardCurrency": 119,
                                  "WaitingTime": 2360.0,
                                  "DeliveryDiamonds": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1565
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceSoftCurrency": 15939,
                                  "PriceHardCurrency": 213,
                                  "WaitingTime": 7620.0,
                                  "DeliveryDiamonds": 66,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1709
                                    }
                                  ]
                                }
                              ]
                            }
                          ],
                          "ColorOptions": [
                            {
                              "PreviewColor": {
                                "r": 210,
                                "g": 157,
                                "b": 113,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 128,
                                "g": 100,
                                "b": 204,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 194,
                                "g": 186,
                                "b": 72,
                                "a": 255
                              }
                            },
                            {
                              "PreviewColor": {
                                "r": 118,
                                "g": 206,
                                "b": 163,
                                "a": 255
                              }
                            }
                          ],
                          "Attachments": [
                            {
                              "Name": "v1",
                              "FriendlyName": "Default",
                              "PriceSoftCurrency": 0,
                              "PriceHardCurrency": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Magic Cap",
                              "PriceSoftCurrency": -1,
                              "PriceHardCurrency": 2200,
                              "Bonus": 375
                            }
                          ]
                        }
                      ],
                      "Tiers": [
                        {
                          "Name": "Tier 1",
                          "Type": "tier1",
                          "Level": 1,
                          "TrackType": 0,
                          "Events": [
                            {
                              "Type": "boss",
                              "Name": "BOSS FIGHT",
                              "Description": "\n\t\t\t\t\t\t\tBeat all team members to unlock the next tier.\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [
                                {
                                  "Reward": 1460.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 2,
                                  "AnimalType": "lizardv2",
                                  "AnimalName": "Frog",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.9,
                                    "AccParam": 0.1101,
                                    "SpeedParam": 20.3535,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.7959,
                                    "BoostAccBonus": 1.4966,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.01,
                                      0.02,
                                      0.97
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1900.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 2,
                                  "AnimalType": "dog",
                                  "AnimalName": "Pavlov",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.94,
                                    "AccParam": 0.1067,
                                    "SpeedParam": 21.4539,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8555,
                                    "BoostAccBonus": 1.6235,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2180.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 2,
                                  "AnimalType": "rhinov2",
                                  "AnimalName": "Rhino",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.98,
                                    "AccParam": 0.1109,
                                    "SpeedParam": 22.1863,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.2186,
                                    "BoostAccBonus": 1.8489,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2540.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 3,
                                  "AnimalType": "birdv2",
                                  "AnimalName": "Bird",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1154,
                                    "SpeedParam": 23.1986,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0064,
                                    "BoostAccBonus": 1.7556,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 5500.0,
                                  "Experience": 4.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 3,
                                  "AnimalType": "boarv2",
                                  "AnimalName": "Boar",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1198,
                                    "SpeedParam": 23.9502,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.395,
                                    "BoostAccBonus": 1.9959,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.0,
                                      1.0
                                    ]
                                  }
                                }
                              ],
                              "Obstacles": [
                                {
                                  "Location": 0.12,
                                  "Type": 0,
                                  "HeightScale": 1.233
                                },
                                {
                                  "Location": 0.2,
                                  "Type": 0,
                                  "HeightScale": 1.252
                                },
                                {
                                  "Location": 0.29,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.48,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.61,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.76,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                }
                              ],
                              "DailySettings": null
                            },
                            {
                              "Type": "ladder",
                              "Name": "TOURNAMENT",
                              "Description": "\n\t\t\t\t\t\t\tRace against faster and faster opponents for adequate rewards.\n\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [
                                {
                                  "Reward": 500.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "boar",
                                  "AnimalName": "Glutto",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.8,
                                    "AccParam": 0.088,
                                    "SpeedParam": 17.5929,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.7593,
                                    "BoostAccBonus": 1.4661,
                                    "BoostSpeedBonus": 1.0263
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.5,
                                      0.2,
                                      0.3
                                    ]
                                  }
                                },
                                {
                                  "Reward": 560.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dog",
                                  "AnimalName": "Bandit",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.8,
                                    "AccParam": 0.0924,
                                    "SpeedParam": 18.5768,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.6066,
                                    "BoostAccBonus": 1.4058,
                                    "BoostSpeedBonus": 1.0293
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.24,
                                      0.1,
                                      0.66
                                    ]
                                  }
                                },
                                {
                                  "Reward": 620.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "bird",
                                  "AnimalName": "Thunder",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.8,
                                    "AccParam": 0.0963,
                                    "SpeedParam": 19.3672,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.675,
                                    "BoostAccBonus": 1.4656,
                                    "BoostSpeedBonus": 1.073
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.2,
                                      0.08,
                                      0.72
                                    ]
                                  }
                                },
                                {
                                  "Reward": 680.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "lizard",
                                  "AnimalName": "Bean",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.8,
                                    "AccParam": 0.1065,
                                    "SpeedParam": 19.6778,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.7363,
                                    "BoostAccBonus": 1.4469,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.16,
                                      0.06,
                                      0.78
                                    ]
                                  }
                                },
                                {
                                  "Reward": 740.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "squirrel",
                                  "AnimalName": "Redhead",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.8,
                                    "AccParam": 0.1111,
                                    "SpeedParam": 20.5278,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8113,
                                    "BoostAccBonus": 1.5094,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.12,
                                      0.04,
                                      0.84
                                    ]
                                  }
                                },
                                {
                                  "Reward": 800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "rhino",
                                  "AnimalName": "Dino",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.8,
                                    "AccParam": 0.1044,
                                    "SpeedParam": 20.874,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0874,
                                    "BoostAccBonus": 1.7395,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.12,
                                      0.04,
                                      0.84
                                    ]
                                  }
                                },
                                {
                                  "Reward": 860.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dogv2",
                                  "AnimalName": "Bobby",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.8,
                                    "AccParam": 0.1057,
                                    "SpeedParam": 21.2642,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8391,
                                    "BoostAccBonus": 1.6092,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.12,
                                      0.04,
                                      0.84
                                    ]
                                  }
                                },
                                {
                                  "Reward": 920.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "birdv2",
                                  "AnimalName": "Singer",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.8,
                                    "AccParam": 0.1067,
                                    "SpeedParam": 21.4539,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8555,
                                    "BoostAccBonus": 1.6235,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.12,
                                      0.04,
                                      0.84
                                    ]
                                  }
                                },
                                {
                                  "Reward": 980.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "squirrel",
                                  "AnimalName": "Hazel",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.84,
                                    "AccParam": 0.1146,
                                    "SpeedParam": 21.167,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8677,
                                    "BoostAccBonus": 1.5564,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.07,
                                      0.03,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1040.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "lizard",
                                  "AnimalName": "Texas",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.88,
                                    "AccParam": 0.1155,
                                    "SpeedParam": 21.3413,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8831,
                                    "BoostAccBonus": 1.5692,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.07,
                                      0.03,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1100.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "squirrel",
                                  "AnimalName": "Brainy",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.92,
                                    "AccParam": 0.1164,
                                    "SpeedParam": 21.5156,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8984,
                                    "BoostAccBonus": 1.582,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.07,
                                      0.03,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1160.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "rhino",
                                  "AnimalName": "Flatul",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.92,
                                    "AccParam": 0.1096,
                                    "SpeedParam": 21.9199,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.192,
                                    "BoostAccBonus": 1.8267,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.07,
                                      0.03,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1220.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "boar",
                                  "AnimalName": "Colon",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.92,
                                    "AccParam": 0.1119,
                                    "SpeedParam": 22.3754,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.2375,
                                    "BoostAccBonus": 1.8646,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.07,
                                      0.03,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1280.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "lizard",
                                  "AnimalName": "Ruben",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.96,
                                    "AccParam": 0.1209,
                                    "SpeedParam": 22.3488,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.972,
                                    "BoostAccBonus": 1.6433,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.06,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1340.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dogv2",
                                  "AnimalName": "Loco",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.96,
                                    "AccParam": 0.1144,
                                    "SpeedParam": 22.9983,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.989,
                                    "BoostAccBonus": 1.7404,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.06,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "lizard",
                                  "AnimalName": "Bloat",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.96,
                                    "AccParam": 0.123,
                                    "SpeedParam": 22.7264,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0053,
                                    "BoostAccBonus": 1.6711,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.06,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1460.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "bird",
                                  "AnimalName": "Fortuna",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.96,
                                    "AccParam": 0.1163,
                                    "SpeedParam": 23.3887,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0228,
                                    "BoostAccBonus": 1.77,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.06,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1520.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "rhino",
                                  "AnimalName": "Odour",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.96,
                                    "AccParam": 0.1166,
                                    "SpeedParam": 23.315,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3315,
                                    "BoostAccBonus": 1.9429,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.06,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1580.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "boar",
                                  "AnimalName": "Sam",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.96,
                                    "AccParam": 0.1176,
                                    "SpeedParam": 23.5195,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.352,
                                    "BoostAccBonus": 1.96,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.06,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1640.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dog",
                                  "AnimalName": "Scott",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.96,
                                    "AccParam": 0.1196,
                                    "SpeedParam": 24.0464,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0797,
                                    "BoostAccBonus": 1.8197,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.06,
                                      0.9
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1700.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "bird",
                                  "AnimalName": "Lewis",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.96,
                                    "AccParam": 0.1205,
                                    "SpeedParam": 24.2361,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0961,
                                    "BoostAccBonus": 1.8341,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 3000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "boarv2",
                                  "AnimalName": "Crazy",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.96,
                                    "AccParam": 0.1207,
                                    "SpeedParam": 24.1348,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.4135,
                                    "BoostAccBonus": 2.0112,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 4000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "squirrel",
                                  "AnimalName": "Artist",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.98,
                                    "AccParam": 0.1309,
                                    "SpeedParam": 24.1885,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 1.7786,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 5000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "rhinov2",
                                  "AnimalName": "Bomber ",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.98,
                                    "AccParam": 0.1212,
                                    "SpeedParam": 24.237,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.4237,
                                    "BoostAccBonus": 2.0197,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.01,
                                      0.99
                                    ]
                                  }
                                }
                              ],
                              "Obstacles": [
                                {
                                  "Location": 0.12,
                                  "Type": 0,
                                  "HeightScale": 1.23
                                },
                                {
                                  "Location": 0.2,
                                  "Type": 0,
                                  "HeightScale": 1.248
                                },
                                {
                                  "Location": 0.42,
                                  "Type": 0,
                                  "HeightScale": 1.266
                                },
                                {
                                  "Location": 0.61,
                                  "Type": 0,
                                  "HeightScale": 1.266
                                },
                                {
                                  "Location": 0.76,
                                  "Type": 0,
                                  "HeightScale": 1.266
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.266
                                }
                              ],
                              "DailySettings": null
                            },
                            {
                              "Type": "regullar",
                              "Name": "RUN FOR GOLD",
                              "Description": "\n\t\t\t\t\t\t\tChoose difficulty level. High risk = high rewards.\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [
                                {
                                  "Reward": 400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "rhino",
                                  "AnimalName": "Rhyno",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.088,
                                    "SpeedParam": 17.5929,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.7593,
                                    "BoostAccBonus": 1.4661,
                                    "BoostSpeedBonus": 1.0263
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.18,
                                      0.3,
                                      0.52
                                    ]
                                  }
                                },
                                {
                                  "Reward": 400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "squirrel",
                                  "AnimalName": "Lulu",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.0937,
                                    "SpeedParam": 17.3221,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.5284,
                                    "BoostAccBonus": 1.2737,
                                    "BoostSpeedBonus": 1.0414
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.18,
                                      0.3,
                                      0.52
                                    ]
                                  }
                                },
                                {
                                  "Reward": 400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dog",
                                  "AnimalName": "Barkley",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.0882,
                                    "SpeedParam": 17.7356,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.5339,
                                    "BoostAccBonus": 1.3422,
                                    "BoostSpeedBonus": 1.0
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.18,
                                      0.3,
                                      0.52
                                    ]
                                  }
                                },
                                {
                                  "Reward": 400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "lizardv2",
                                  "AnimalName": "Backfire",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.0937,
                                    "SpeedParam": 17.3221,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.5284,
                                    "BoostAccBonus": 1.2737,
                                    "BoostSpeedBonus": 1.0414
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.18,
                                      0.3,
                                      0.52
                                    ]
                                  }
                                },
                                {
                                  "Reward": 400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "boarv2",
                                  "AnimalName": "Pembe",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.088,
                                    "SpeedParam": 17.5929,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.7593,
                                    "BoostAccBonus": 1.4661,
                                    "BoostSpeedBonus": 1.0263
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.18,
                                      0.3,
                                      0.52
                                    ]
                                  }
                                },
                                {
                                  "Reward": 800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "birdv2",
                                  "AnimalName": "King",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.85,
                                    "AccParam": 0.1083,
                                    "SpeedParam": 21.77,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8828,
                                    "BoostAccBonus": 1.6475,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.1,
                                      0.2,
                                      0.7
                                    ]
                                  }
                                },
                                {
                                  "Reward": 800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "rhino",
                                  "AnimalName": "Fluffy",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.85,
                                    "AccParam": 0.1078,
                                    "SpeedParam": 21.5508,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1551,
                                    "BoostAccBonus": 1.7959,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.1,
                                      0.2,
                                      0.7
                                    ]
                                  }
                                },
                                {
                                  "Reward": 800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "squirrel",
                                  "AnimalName": "Vixen",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.85,
                                    "AccParam": 0.1155,
                                    "SpeedParam": 21.3413,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8831,
                                    "BoostAccBonus": 1.5692,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.1,
                                      0.2,
                                      0.7
                                    ]
                                  }
                                },
                                {
                                  "Reward": 800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dogv2",
                                  "AnimalName": "Duke",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.85,
                                    "AccParam": 0.1083,
                                    "SpeedParam": 21.77,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8828,
                                    "BoostAccBonus": 1.6475,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.1,
                                      0.2,
                                      0.7
                                    ]
                                  }
                                },
                                {
                                  "Reward": 800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "lizard",
                                  "AnimalName": "Joker",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 0.85,
                                    "AccParam": 0.1155,
                                    "SpeedParam": 21.3413,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 1.8831,
                                    "BoostAccBonus": 1.5692,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.1,
                                      0.2,
                                      0.7
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1200.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "boar",
                                  "AnimalName": "Tornado",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1176,
                                    "SpeedParam": 23.5195,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.352,
                                    "BoostAccBonus": 1.96,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1200.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "bird",
                                  "AnimalName": "Dancer",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1183,
                                    "SpeedParam": 23.7935,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0578,
                                    "BoostAccBonus": 1.8006,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1200.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "rhinov2",
                                  "AnimalName": "Hammer",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1176,
                                    "SpeedParam": 23.5195,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.352,
                                    "BoostAccBonus": 1.96,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1200.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "squirrel",
                                  "AnimalName": "Nancy",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1262,
                                    "SpeedParam": 23.3169,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0574,
                                    "BoostAccBonus": 1.7145,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1200.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dog",
                                  "AnimalName": "Canyon",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1183,
                                    "SpeedParam": 23.7935,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0578,
                                    "BoostAccBonus": 1.8006,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                }
                              ],
                              "Obstacles": [
                                {
                                  "Location": 0.14,
                                  "Type": 0,
                                  "HeightScale": 1.23
                                },
                                {
                                  "Location": 0.22,
                                  "Type": 0,
                                  "HeightScale": 1.248
                                },
                                {
                                  "Location": 0.31,
                                  "Type": 0,
                                  "HeightScale": 1.266
                                },
                                {
                                  "Location": 0.42,
                                  "Type": 0,
                                  "HeightScale": 1.266
                                },
                                {
                                  "Location": 0.54,
                                  "Type": 0,
                                  "HeightScale": 1.266
                                },
                                {
                                  "Location": 0.76,
                                  "Type": 0,
                                  "HeightScale": 1.266
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.266
                                }
                              ],
                              "DailySettings": null
                            },
                            {
                              "Type": "daily",
                              "Name": "Daily Race",
                              "Description": "\n\t\t\t\t\t\t\tRun every day for rising rewards\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [],
                              "Obstacles": [
                                {
                                  "Location": 0.12,
                                  "Type": 0,
                                  "HeightScale": 1.233
                                },
                                {
                                  "Location": 0.2,
                                  "Type": 0,
                                  "HeightScale": 1.252
                                },
                                {
                                  "Location": 0.29,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.48,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.61,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.76,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                }
                              ],
                              "DailySettings": {
                                "RacesPerDay": 3,
                                "CooldownMinutes": 90,
                                "Energy": 2,
                                "Experience": 1.0,
                                "ExperienceDefeat": 0.0,
                                "OpponentJumpProbability": [
                                  0.1,
                                  0.06,
                                  0.84
                                ],
                                "OpponentEngineMultiplier": 0.8,
                                "DailyRewards": [
                                  {
                                    "Soft": 1240,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 1360,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 1480,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 1600,
                                    "Hard": 5
                                  },
                                  {
                                    "Soft": 1720,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 1840,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 1960,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2080,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2200,
                                    "Hard": 10
                                  },
                                  {
                                    "Soft": 2320,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2440,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2560,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2680,
                                    "Hard": 15
                                  },
                                  {
                                    "Soft": 2800,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2920,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3040,
                                    "Hard": 0
                                  }
                                ]
                              }
                            }
                          ]
                        },
                        {
                          "Name": "Tier 2",
                          "Type": "tier2",
                          "Level": 2,
                          "TrackType": 1,
                          "Events": [
                            {
                              "Type": "boss",
                              "Name": "BOSS FIGHT",
                              "Description": "\n\t\t\t\t\t\t\tBeat all team members to unlock the next tier.\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [
                                {
                                  "Reward": 3020.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 2,
                                  "AnimalType": "crokov2",
                                  "AnimalName": "Croco",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1215,
                                    "SpeedParam": 24.4258,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1125,
                                    "BoostAccBonus": 1.8484,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 3200.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 2,
                                  "AnimalType": "lizard",
                                  "AnimalName": "Frog II",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1356,
                                    "SpeedParam": 25.0601,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 1.8427,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 3440.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 2,
                                  "AnimalType": "birdv2",
                                  "AnimalName": "Super Bird",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1315,
                                    "SpeedParam": 26.4492,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.2875,
                                    "BoostAccBonus": 2.0016,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 3660.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 3,
                                  "AnimalType": "hippo",
                                  "AnimalName": "Hippo",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.135,
                                    "SpeedParam": 27.0005,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.25,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 7500.0,
                                  "Experience": 4.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 3,
                                  "AnimalType": "turtlev2",
                                  "AnimalName": "Turtle",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1404,
                                    "SpeedParam": 28.0723,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.3394,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.0,
                                      1.0
                                    ]
                                  }
                                }
                              ],
                              "Obstacles": [
                                {
                                  "Location": 0.12,
                                  "Type": 0,
                                  "HeightScale": 1.237
                                },
                                {
                                  "Location": 0.21,
                                  "Type": 0,
                                  "HeightScale": 1.256
                                },
                                {
                                  "Location": 0.33,
                                  "Type": 0,
                                  "HeightScale": 1.274
                                },
                                {
                                  "Location": 0.57,
                                  "Type": 0,
                                  "HeightScale": 1.307
                                },
                                {
                                  "Location": 0.75,
                                  "Type": 0,
                                  "HeightScale": 1.307
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.307
                                }
                              ],
                              "DailySettings": null
                            },
                            {
                              "Type": "ladder",
                              "Name": "TOURNAMENT",
                              "Description": "\n\t\t\t\t\t\t\tRace against faster and faster opponents for adequate rewards.\n\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [
                                {
                                  "Reward": 1000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "hippo",
                                  "AnimalName": "Martin",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1119,
                                    "SpeedParam": 22.3754,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.2375,
                                    "BoostAccBonus": 1.8646,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1060.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "gorilla",
                                  "AnimalName": "Leroy",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1262,
                                    "SpeedParam": 23.3169,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0574,
                                    "BoostAccBonus": 1.7145,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1120.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "croko",
                                  "AnimalName": "Todd",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1196,
                                    "SpeedParam": 24.0464,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0797,
                                    "BoostAccBonus": 1.8197,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1180.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "elephant",
                                  "AnimalName": "Arnold",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1198,
                                    "SpeedParam": 23.9502,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.395,
                                    "BoostAccBonus": 1.9959,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1240.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "croko",
                                  "AnimalName": "Ben",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1215,
                                    "SpeedParam": 24.4258,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1125,
                                    "BoostAccBonus": 1.8484,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1300.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "unicorn",
                                  "AnimalName": "Martin",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1309,
                                    "SpeedParam": 24.1885,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 1.7786,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1360.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "giraffe",
                                  "AnimalName": "Marjorie",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1237,
                                    "SpeedParam": 24.8684,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1508,
                                    "BoostAccBonus": 1.8819,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1420.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "hippo",
                                  "AnimalName": "Donald",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1233,
                                    "SpeedParam": 24.6545,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.4655,
                                    "BoostAccBonus": 2.0545,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1480.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "gorilla",
                                  "AnimalName": "Kaboom",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1337,
                                    "SpeedParam": 24.7075,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 1.8167,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1540.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "turtle",
                                  "AnimalName": "Lester",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1254,
                                    "SpeedParam": 25.0833,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.0903,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1600.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "elephant",
                                  "AnimalName": "Max",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1266,
                                    "SpeedParam": 25.3107,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.1092,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1660.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "turtle",
                                  "AnimalName": "Gordon",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1277,
                                    "SpeedParam": 25.5416,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.1285,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1720.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "unicorn",
                                  "AnimalName": "Raymond",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.14,
                                    "SpeedParam": 25.8657,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 1.9019,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1780.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "giraffe",
                                  "AnimalName": "Ken",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1328,
                                    "SpeedParam": 26.7022,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.0207,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1840.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "hippo",
                                  "AnimalName": "Douglas",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1325,
                                    "SpeedParam": 26.4995,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.2083,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1900.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "gorillav2",
                                  "AnimalName": "Poof ",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1439,
                                    "SpeedParam": 26.5973,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 1.9557,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1960.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "croko",
                                  "AnimalName": "Ward",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1358,
                                    "SpeedParam": 27.3058,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.0664,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2020.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "elephant",
                                  "AnimalName": "John",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1367,
                                    "SpeedParam": 27.334,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.2778,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2080.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "turtlev2",
                                  "AnimalName": "Methane",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1379,
                                    "SpeedParam": 27.5801,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.2983,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2140.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "crokov2",
                                  "AnimalName": "Bob",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.14,
                                    "SpeedParam": 28.1565,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.1308,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2200.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "giraffe",
                                  "AnimalName": "Melinda",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1413,
                                    "SpeedParam": 28.4094,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.1499,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 4000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "hippo",
                                  "AnimalName": "Arnold",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1419,
                                    "SpeedParam": 28.3799,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.365,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 5000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "gorilla",
                                  "AnimalName": "Travis",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1542,
                                    "SpeedParam": 28.4883,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.0947,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 6000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "unicorn",
                                  "AnimalName": "Ben",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1542,
                                    "SpeedParam": 28.4883,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.0947,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.01,
                                      0.99
                                    ]
                                  }
                                }
                              ],
                              "Obstacles": [
                                {
                                  "Location": 0.14,
                                  "Type": 0,
                                  "HeightScale": 1.233
                                },
                                {
                                  "Location": 0.23,
                                  "Type": 0,
                                  "HeightScale": 1.252
                                },
                                {
                                  "Location": 0.35,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.5,
                                  "Type": 0,
                                  "HeightScale": 1.303
                                },
                                {
                                  "Location": 0.77,
                                  "Type": 0,
                                  "HeightScale": 1.303
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.3
                                }
                              ],
                              "DailySettings": null
                            },
                            {
                              "Type": "regullar",
                              "Name": "RUN FOR GOLD",
                              "Description": "\n\t\t\t\t\t\t\tChoose difficulty level. High risk = high rewards.\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [
                                {
                                  "Reward": 1100.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "giraffe",
                                  "AnimalName": "Patsy",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1173,
                                    "SpeedParam": 23.5928,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0405,
                                    "BoostAccBonus": 1.7854,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.05,
                                      0.02,
                                      0.93
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1100.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "unicornv2",
                                  "AnimalName": "Gentleman",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1251,
                                    "SpeedParam": 23.1111,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0392,
                                    "BoostAccBonus": 1.6993,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.05,
                                      0.02,
                                      0.93
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1100.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "hippo",
                                  "AnimalName": "Angry",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1166,
                                    "SpeedParam": 23.315,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3315,
                                    "BoostAccBonus": 1.9429,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.05,
                                      0.02,
                                      0.93
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1100.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "gorillav2",
                                  "AnimalName": "Dynamite",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1251,
                                    "SpeedParam": 23.1111,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0392,
                                    "BoostAccBonus": 1.6993,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.05,
                                      0.02,
                                      0.93
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1100.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "croko",
                                  "AnimalName": "Eddie",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1173,
                                    "SpeedParam": 23.5928,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.0405,
                                    "BoostAccBonus": 1.7854,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.05,
                                      0.02,
                                      0.93
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "elephant",
                                  "AnimalName": "Farter",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1254,
                                    "SpeedParam": 25.0833,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.0903,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "turtle",
                                  "AnimalName": "Doctor",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1254,
                                    "SpeedParam": 25.0833,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.0903,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "giraffe",
                                  "AnimalName": "Happy",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1268,
                                    "SpeedParam": 25.5007,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.2055,
                                    "BoostAccBonus": 1.9298,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "unicorn",
                                  "AnimalName": "Fartage",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1356,
                                    "SpeedParam": 25.0601,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 1.8427,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "hippo",
                                  "AnimalName": "Ripper",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1254,
                                    "SpeedParam": 25.0833,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.0903,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1600.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "gorilla",
                                  "AnimalName": "Wind",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1485,
                                    "SpeedParam": 27.4424,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.0178,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1600.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "croko",
                                  "AnimalName": "Hunter",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1384,
                                    "SpeedParam": 27.8403,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.1068,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1600.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "elephant",
                                  "AnimalName": "Flattus",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1379,
                                    "SpeedParam": 27.5801,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.2983,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1600.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "turtle",
                                  "AnimalName": "Emperor",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1379,
                                    "SpeedParam": 27.5801,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.2983,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1600.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "giraffev2",
                                  "AnimalName": "Lasso",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1384,
                                    "SpeedParam": 27.8403,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.1068,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                }
                              ],
                              "Obstacles": [
                                {
                                  "Location": 0.12,
                                  "Type": 0,
                                  "HeightScale": 1.233
                                },
                                {
                                  "Location": 0.23,
                                  "Type": 0,
                                  "HeightScale": 1.252
                                },
                                {
                                  "Location": 0.36,
                                  "Type": 0,
                                  "HeightScale": 1.261
                                },
                                {
                                  "Location": 0.5,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.71,
                                  "Type": 0,
                                  "HeightScale": 1.303
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.3
                                }
                              ],
                              "DailySettings": null
                            },
                            {
                              "Type": "daily",
                              "Name": "Daily Race",
                              "Description": "\n\t\t\t\t\t\t\tRun every day for rising rewards\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [],
                              "Obstacles": [
                                {
                                  "Location": 0.12,
                                  "Type": 0,
                                  "HeightScale": 1.233
                                },
                                {
                                  "Location": 0.2,
                                  "Type": 0,
                                  "HeightScale": 1.252
                                },
                                {
                                  "Location": 0.29,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.48,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.61,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.76,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                }
                              ],
                              "DailySettings": {
                                "RacesPerDay": 3,
                                "CooldownMinutes": 90,
                                "Energy": 2,
                                "Experience": 1.0,
                                "ExperienceDefeat": 0.0,
                                "OpponentJumpProbability": [
                                  0.08,
                                  0.06,
                                  0.86
                                ],
                                "OpponentEngineMultiplier": 0.88,
                                "DailyRewards": [
                                  {
                                    "Soft": 1560,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 1720,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 1880,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2040,
                                    "Hard": 5
                                  },
                                  {
                                    "Soft": 2200,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2360,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2520,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2680,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2840,
                                    "Hard": 10
                                  },
                                  {
                                    "Soft": 3000,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3160,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3320,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3480,
                                    "Hard": 15
                                  },
                                  {
                                    "Soft": 3640,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3800,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3960,
                                    "Hard": 0
                                  }
                                ]
                              }
                            }
                          ]
                        },
                        {
                          "Name": "Tier 3",
                          "Type": "tier3",
                          "Level": 3,
                          "TrackType": 2,
                          "Events": [
                            {
                              "Type": "boss",
                              "Name": "BOSS FIGHT",
                              "Description": "\n\t\t\t\t\t\t\tBeat all team members to beat the game!\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [
                                {
                                  "Reward": 3960.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 2,
                                  "AnimalType": "pandav2",
                                  "AnimalName": "Pander",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1434,
                                    "SpeedParam": 28.6875,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.3906,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 4060.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 2,
                                  "AnimalType": "raccoon",
                                  "AnimalName": "Raccoon",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1613,
                                    "SpeedParam": 29.8125,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.1921,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 4220.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 2,
                                  "AnimalType": "unicornv2",
                                  "AnimalName": "Unicorn",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1681,
                                    "SpeedParam": 31.0588,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.2837,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 4300.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 3,
                                  "AnimalType": "tigerv2",
                                  "AnimalName": "Tiger",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1661,
                                    "SpeedParam": 33.4048,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.5279,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.02,
                                      0.98
                                    ]
                                  }
                                },
                                {
                                  "Reward": 9000.0,
                                  "Experience": 4.0,
                                  "ExperienceDefeat": 1.0,
                                  "EnergyCost": 3,
                                  "AnimalType": "dragonv2",
                                  "AnimalName": "Dragon",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1712,
                                    "SpeedParam": 34.2369,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.8531,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.0,
                                      1.0
                                    ]
                                  }
                                }
                              ],
                              "Obstacles": [
                                {
                                  "Location": 0.13,
                                  "Type": 0,
                                  "HeightScale": 1.235
                                },
                                {
                                  "Location": 0.26,
                                  "Type": 0,
                                  "HeightScale": 1.235
                                },
                                {
                                  "Location": 0.41,
                                  "Type": 0,
                                  "HeightScale": 1.304
                                },
                                {
                                  "Location": 0.7,
                                  "Type": 0,
                                  "HeightScale": 1.337
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.333
                                }
                              ],
                              "DailySettings": null
                            },
                            {
                              "Type": "ladder",
                              "Name": "TOURNAMENT",
                              "Description": "\n\t\t\t\t\t\t\tRace against faster and faster opponents for adequate rewards.\n\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [
                                {
                                  "Reward": 1800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "wolf",
                                  "AnimalName": "Tony",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1353,
                                    "SpeedParam": 27.208,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.059,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1860.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "raccoonv2",
                                  "AnimalName": "Daryl",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1485,
                                    "SpeedParam": 27.4424,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.0178,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1920.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "panda",
                                  "AnimalName": "Bad",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1391,
                                    "SpeedParam": 27.8262,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.3188,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1980.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "bunny",
                                  "AnimalName": "Squeeker",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.151,
                                    "SpeedParam": 27.9072,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.052,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2040.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "tiger",
                                  "AnimalName": "Todd",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1429,
                                    "SpeedParam": 28.7256,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.1738,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2100.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dragonv2",
                                  "AnimalName": "Ghost",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1434,
                                    "SpeedParam": 28.6875,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.3906,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2160.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "reindeer",
                                  "AnimalName": "Randall",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1454,
                                    "SpeedParam": 29.2315,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.2121,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2220.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "wolf",
                                  "AnimalName": "Clifton",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1469,
                                    "SpeedParam": 29.5476,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.236,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2280.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "raccoon",
                                  "AnimalName": "Zinger",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1589,
                                    "SpeedParam": 29.3599,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.1588,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2340.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "panda",
                                  "AnimalName": "Felix",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1497,
                                    "SpeedParam": 29.9448,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.4954,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2400.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "bunny",
                                  "AnimalName": "Rawhide",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.163,
                                    "SpeedParam": 30.1185,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.2146,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2460.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "tiger",
                                  "AnimalName": "Revenge",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1538,
                                    "SpeedParam": 30.93,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.3407,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2520.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dragon",
                                  "AnimalName": "Martin",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.156,
                                    "SpeedParam": 31.1993,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.5999,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2580.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "reindeer",
                                  "AnimalName": "Rudolf",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1587,
                                    "SpeedParam": 31.9123,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.415,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2640.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "wolf",
                                  "AnimalName": "Thunder",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1603,
                                    "SpeedParam": 32.2383,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.4397,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2700.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "raccoon",
                                  "AnimalName": "Leroy",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1737,
                                    "SpeedParam": 32.0908,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.3596,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2760.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "panda",
                                  "AnimalName": "Martin",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1631,
                                    "SpeedParam": 32.625,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.7188,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2820.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "bunny",
                                  "AnimalName": "Crazy",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1774,
                                    "SpeedParam": 32.7881,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.4109,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2880.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "tiger",
                                  "AnimalName": "Rustler",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1677,
                                    "SpeedParam": 33.721,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.5519,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 2940.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dragon",
                                  "AnimalName": "Smog",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1674,
                                    "SpeedParam": 33.4845,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.7904,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 3000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "reindeerv2",
                                  "AnimalName": "Scott",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1705,
                                    "SpeedParam": 34.2806,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.5942,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 4000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "panda",
                                  "AnimalName": "Han",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1712,
                                    "SpeedParam": 34.2369,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.8531,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 5000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "tiger",
                                  "AnimalName": "Rimshot ",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1744,
                                    "SpeedParam": 35.0596,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.6532,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.04,
                                      0.02,
                                      0.94
                                    ]
                                  }
                                },
                                {
                                  "Reward": 6000.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "dragonv2",
                                  "AnimalName": "Master",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1742,
                                    "SpeedParam": 34.8398,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.9033,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.0,
                                      0.01,
                                      0.99
                                    ]
                                  }
                                }
                              ],
                              "Obstacles": [
                                {
                                  "Location": 0.15,
                                  "Type": 0,
                                  "HeightScale": 1.231
                                },
                                {
                                  "Location": 0.48,
                                  "Type": 0,
                                  "HeightScale": 1.3
                                },
                                {
                                  "Location": 0.68,
                                  "Type": 0,
                                  "HeightScale": 1.333
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.33
                                }
                              ],
                              "DailySettings": null
                            },
                            {
                              "Type": "regullar",
                              "Name": "RUN FOR GOLD",
                              "Description": "\n\t\t\t\t\t\t\tChoose difficulty level. High risk = high rewards.\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [
                                {
                                  "Reward": 1500.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "reindeer",
                                  "AnimalName": "Thinker",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1372,
                                    "SpeedParam": 27.5874,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.0877,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.06,
                                      0.02,
                                      0.92
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1500.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "tiger",
                                  "AnimalName": "Blat ",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1372,
                                    "SpeedParam": 27.5874,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.0877,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.06,
                                      0.02,
                                      0.92
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1500.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "wolf",
                                  "AnimalName": "Todd",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1372,
                                    "SpeedParam": 27.5874,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.0877,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.06,
                                      0.02,
                                      0.92
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1500.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "raccoon",
                                  "AnimalName": "Gambler",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1469,
                                    "SpeedParam": 27.1519,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 1.9965,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.06,
                                      0.02,
                                      0.92
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1500.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "panda",
                                  "AnimalName": "Surgeon",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1367,
                                    "SpeedParam": 27.334,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.2778,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.06,
                                      0.02,
                                      0.92
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1700.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "bunny",
                                  "AnimalName": "Prince",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1613,
                                    "SpeedParam": 29.8125,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.1921,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1700.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "reindeer",
                                  "AnimalName": "Curry",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1507,
                                    "SpeedParam": 30.3037,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.2933,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1700.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "tiger",
                                  "AnimalName": "Scalper",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1507,
                                    "SpeedParam": 30.3037,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.2933,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1700.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "wolf",
                                  "AnimalName": "Derrick",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1507,
                                    "SpeedParam": 30.3037,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.2933,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1700.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "raccoon",
                                  "AnimalName": "Johnnie",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 1,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1613,
                                    "SpeedParam": 29.8125,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.1921,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "panda",
                                  "AnimalName": "Chaos",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1668,
                                    "SpeedParam": 33.3633,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.5,
                                    "BoostAccBonus": 2.7803,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "bunnyv2",
                                  "AnimalName": "Demon",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1793,
                                    "SpeedParam": 33.1367,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.1,
                                    "BoostAccBonus": 2.4365,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "reindeerv2",
                                  "AnimalName": "Edgar",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1677,
                                    "SpeedParam": 33.721,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.5519,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "tigerv2",
                                  "AnimalName": "One-eye",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 0,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1677,
                                    "SpeedParam": 33.721,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.5519,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                },
                                {
                                  "Reward": 1800.0,
                                  "Experience": 2.0,
                                  "ExperienceDefeat": 0.0,
                                  "EnergyCost": 1,
                                  "AnimalType": "wolf",
                                  "AnimalName": "Harold",
                                  "RandomAnimalType": false,
                                  "ColorOptionIndex": 2,
                                  "RandomColorOptionIndex": false,
                                  "EngineParams": {
                                    "NerfFactor": 1.0,
                                    "AccParam": 0.1677,
                                    "SpeedParam": 33.721,
                                    "StartSpeed": 0.0,
                                    "Gearbox": 0.0,
                                    "BoostTime": 2.3,
                                    "BoostAccBonus": 2.5519,
                                    "BoostSpeedBonus": 1.15
                                  },
                                  "Ai": {
                                    "GearProbability": [
                                      0.02,
                                      0.02,
                                      0.96
                                    ]
                                  }
                                }
                              ],
                              "Obstacles": [
                                {
                                  "Location": 0.13,
                                  "Type": 0,
                                  "HeightScale": 1.231
                                },
                                {
                                  "Location": 0.25,
                                  "Type": 0,
                                  "HeightScale": 1.3
                                },
                                {
                                  "Location": 0.39,
                                  "Type": 0,
                                  "HeightScale": 1.3
                                },
                                {
                                  "Location": 0.65,
                                  "Type": 0,
                                  "HeightScale": 1.333
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.33
                                }
                              ],
                              "DailySettings": null
                            },
                            {
                              "Type": "daily",
                              "Name": "Daily Race",
                              "Description": "\n\t\t\t\t\t\t\tRun every day for rising rewards\n\t\t\t\t\t",
                              "Params": [],
                              "Opponents": [],
                              "Obstacles": [
                                {
                                  "Location": 0.12,
                                  "Type": 0,
                                  "HeightScale": 1.233
                                },
                                {
                                  "Location": 0.2,
                                  "Type": 0,
                                  "HeightScale": 1.252
                                },
                                {
                                  "Location": 0.29,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.48,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.61,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.76,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                },
                                {
                                  "Location": 0.95,
                                  "Type": 0,
                                  "HeightScale": 1.27
                                }
                              ],
                              "DailySettings": {
                                "RacesPerDay": 3,
                                "CooldownMinutes": 90,
                                "Energy": 2,
                                "Experience": 1.0,
                                "ExperienceDefeat": 0.0,
                                "OpponentJumpProbability": [
                                  0.06,
                                  0.06,
                                  0.88
                                ],
                                "OpponentEngineMultiplier": 0.9,
                                "DailyRewards": [
                                  {
                                    "Soft": 1880,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2080,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2280,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2480,
                                    "Hard": 5
                                  },
                                  {
                                    "Soft": 2680,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 2880,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3080,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3280,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3480,
                                    "Hard": 10
                                  },
                                  {
                                    "Soft": 3680,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 3880,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 4080,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 4280,
                                    "Hard": 15
                                  },
                                  {
                                    "Soft": 4480,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 4680,
                                    "Hard": 0
                                  },
                                  {
                                    "Soft": 4880,
                                    "Hard": 0
                                  }
                                ]
                              }
                            }
                          ]
                        }
                      ],
                      "PlayerLevels": [
                        {
                          "Level": 1,
                          "ExperienceThreshold": 10,
                          "RewardSoftCurrency": 500
                        },
                        {
                          "Level": 2,
                          "ExperienceThreshold": 17,
                          "RewardSoftCurrency": 600
                        },
                        {
                          "Level": 3,
                          "ExperienceThreshold": 29,
                          "RewardSoftCurrency": 700
                        },
                        {
                          "Level": 4,
                          "ExperienceThreshold": 41,
                          "RewardSoftCurrency": 700
                        },
                        {
                          "Level": 5,
                          "ExperienceThreshold": 54,
                          "RewardSoftCurrency": 700
                        },
                        {
                          "Level": 6,
                          "ExperienceThreshold": 67,
                          "RewardSoftCurrency": 700
                        },
                        {
                          "Level": 7,
                          "ExperienceThreshold": 80,
                          "RewardSoftCurrency": 700
                        },
                        {
                          "Level": 8,
                          "ExperienceThreshold": 93,
                          "RewardSoftCurrency": 700
                        },
                        {
                          "Level": 9,
                          "ExperienceThreshold": 106,
                          "RewardSoftCurrency": 700
                        },
                        {
                          "Level": 10,
                          "ExperienceThreshold": 120,
                          "RewardSoftCurrency": 800
                        },
                        {
                          "Level": 11,
                          "ExperienceThreshold": 134,
                          "RewardSoftCurrency": 800
                        },
                        {
                          "Level": 12,
                          "ExperienceThreshold": 148,
                          "RewardSoftCurrency": 800
                        },
                        {
                          "Level": 13,
                          "ExperienceThreshold": 162,
                          "RewardSoftCurrency": 800
                        },
                        {
                          "Level": 14,
                          "ExperienceThreshold": 176,
                          "RewardSoftCurrency": 800
                        },
                        {
                          "Level": 15,
                          "ExperienceThreshold": 190,
                          "RewardSoftCurrency": 800
                        },
                        {
                          "Level": 16,
                          "ExperienceThreshold": 205,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 17,
                          "ExperienceThreshold": 220,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 18,
                          "ExperienceThreshold": 235,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 19,
                          "ExperienceThreshold": 250,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 20,
                          "ExperienceThreshold": 265,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 21,
                          "ExperienceThreshold": 280,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 22,
                          "ExperienceThreshold": 295,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 23,
                          "ExperienceThreshold": 310,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 24,
                          "ExperienceThreshold": 325,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 25,
                          "ExperienceThreshold": 340,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 26,
                          "ExperienceThreshold": 356,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 27,
                          "ExperienceThreshold": 372,
                          "RewardSoftCurrency": 900
                        },
                        {
                          "Level": 28,
                          "ExperienceThreshold": 389,
                          "RewardSoftCurrency": 1000
                        },
                        {
                          "Level": 29,
                          "ExperienceThreshold": 407,
                          "RewardSoftCurrency": 1000
                        },
                        {
                          "Level": 30,
                          "ExperienceThreshold": 426,
                          "RewardSoftCurrency": 1100
                        },
                        {
                          "Level": 31,
                          "ExperienceThreshold": 446,
                          "RewardSoftCurrency": 1100
                        },
                        {
                          "Level": 32,
                          "ExperienceThreshold": 468,
                          "RewardSoftCurrency": 1300
                        },
                        {
                          "Level": 33,
                          "ExperienceThreshold": 494,
                          "RewardSoftCurrency": 1500
                        },
                        {
                          "Level": 34,
                          "ExperienceThreshold": 530,
                          "RewardSoftCurrency": 2100
                        },
                        {
                          "Level": 35,
                          "ExperienceThreshold": 581,
                          "RewardSoftCurrency": 2900
                        },
                        {
                          "Level": 36,
                          "ExperienceThreshold": 652,
                          "RewardSoftCurrency": 4000
                        },
                        {
                          "Level": 37,
                          "ExperienceThreshold": 793,
                          "RewardSoftCurrency": 6000
                        },
                        {
                          "Level": 38,
                          "ExperienceThreshold": 1194,
                          "RewardSoftCurrency": 7500
                        },
                        {
                          "Level": 39,
                          "ExperienceThreshold": 2795,
                          "RewardSoftCurrency": 9000
                        },
                        {
                          "Level": 40,
                          "ExperienceThreshold": 12796,
                          "RewardSoftCurrency": 10000
                        }
                      ],
                      "SlowMoSettings": {
                        "Bonuses": {
                          "PlayerToOpponentDistance": 0.1,
                          "PlayerSpeed": 0.2,
                          "PlayerUsingBoost": 0.15
                        },
                        "Scores": {
                          "LastJump": 0.8,
                          "RegularJump": 0.75,
                          "OvertakenOpponent": 0.0
                        }
                      },
                      "ObstacleSettings": {
                        "SlowdownBad": 0.767,
                        "SlowdownGood": 0.933,
                        "SlowdownPerfect": 1.0,
                        "BoostSlowdownBad": 0.467,
                        "BoostSlowdownGood": 0.6,
                        "BoostSlowdownPerfect": 1.0,
                        "HeightBad": 0.94,
                        "HeightGood": 0.987,
                        "HeightPerfect": 1.174,
                        "HintDistanceScale": 4.0,
                        "Hint1UpperBound": 0.27,
                        "Hint2UpperBound": 0.6,
                        "Hint3UpperBound": 0.85
                      },
                      "PetSettings": {
                        "MinimumCoinsDrop": 3,
                        "MaximumCoinsDrop": 5,
                        "PettingWaitTime": 3600.0,
                        "CoinTimeout": 20.0,
                        "MoneyPerCoin": 10.0
                      },
                      "StartRaceParameters": {
                        "StartRaceBonuses": [
                          {
                            "FailMin": -0.1,
                            "FailMax": 0.1,
                            "StartSpeed": 17.0,
                            "EndSpeed": 7.0,
                            "Distance": 9.0,
                            "Notification": "perfect"
                          },
                          {
                            "FailMin": -0.2,
                            "FailMax": 0.2,
                            "StartSpeed": 16.0,
                            "EndSpeed": 6.5,
                            "Distance": 9.0,
                            "Notification": "good"
                          },
                          {
                            "FailMin": 0.2,
                            "FailMax": 0.5,
                            "StartSpeed": 15.0,
                            "EndSpeed": 6.0,
                            "Distance": 9.0,
                            "Notification": "to_early"
                          },
                          {
                            "FailMin": -0.5,
                            "FailMax": -0.2,
                            "StartSpeed": 15.0,
                            "EndSpeed": 6.0,
                            "Distance": 9.0,
                            "Notification": "to_late"
                          },
                          {
                            "FailMin": 0.5,
                            "FailMax": 1000.0,
                            "StartSpeed": 14.0,
                            "EndSpeed": 5.5,
                            "Distance": 9.0,
                            "Notification": "bad"
                          },
                          {
                            "FailMin": -1000.0,
                            "FailMax": -0.5,
                            "StartSpeed": 14.0,
                            "EndSpeed": 5.5,
                            "Distance": 9.0,
                            "Notification": "bad"
                          }
                        ]
                      },
                      "Multiplayer": {
                        "EnergyCost": 1,
                        "JumpProbability": [
                          0.1,
                          0.2,
                          0.7
                        ],
                        "Experience": 1,
                        "ExperienceDefeat": 0
                      }
                    }',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Settings',
            get: new Model\Operation(
                operationId: 'settings',
                tags: ['Game'],
                responses: [
                    '200' => [
                        'description' => 'Get game settings',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/Settings',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'Settings',
            ),
        );
        $openApi->getPaths()->addPath('/api/game/settings', $pathItem);

        return $openApi;
    }
}