<?php

namespace App\Enum;

use ReflectionClass;

/**
 * Class DefaultSettings.
 */
class DefaultSettings
{
    public const SETTINGS = '{
                      "SettingsFormat" : 1,
                      "Version": 585,
                      "InitialGold": 0,
                      "InitialStacks": 0,
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
                          "PriceGold": 9500,
                          "PriceStacks": 0,
                          "DeliveryWaitingTime": 120.0,
                          "DeliveryPriceStacks": 20.0,
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
                                  "PriceGold": 3606,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 390.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4514,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 610.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 5355,
                                  "PriceStacks": 24,
                                  "DeliveryWaitingTime": 860.0,
                                  "DeliveryPriceStacks": 10,
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
                                  "PriceGold": 8508,
                                  "PriceStacks": 38,
                                  "DeliveryWaitingTime": 2170.0,
                                  "DeliveryPriceStacks": 20,
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
                                  "PriceGold": 4277,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 550.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3759
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5316,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 850.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.436
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 6070,
                                  "PriceStacks": 27,
                                  "DeliveryWaitingTime": 1110.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.442
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 9091,
                                  "PriceStacks": 41,
                                  "DeliveryWaitingTime": 2480.0,
                                  "DeliveryPriceStacks": 22,
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
                                  "PriceGold": 3148,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 300.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 3955,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 470.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4696,
                                  "PriceStacks": 21,
                                  "DeliveryWaitingTime": 660.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 7249,
                                  "PriceStacks": 32,
                                  "DeliveryWaitingTime": 1580.0,
                                  "DeliveryPriceStacks": 16,
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
                                  "PriceGold": 1162,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 40.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0458
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 1728,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 90.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0531
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 2384,
                                  "PriceStacks": 11,
                                  "DeliveryWaitingTime": 170.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0539
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 5093,
                                  "PriceStacks": 23,
                                  "DeliveryWaitingTime": 780.0,
                                  "DeliveryPriceStacks": 8,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 1860,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 100.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1069
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 2414,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 170.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.124
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 3129,
                                  "PriceStacks": 14,
                                  "DeliveryWaitingTime": 290.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1257
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 5749,
                                  "PriceStacks": 26,
                                  "DeliveryWaitingTime": 990.0,
                                  "DeliveryPriceStacks": 10,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Pirate",
                              "PriceGold": 6000,
                              "PriceStacks": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "bird",
                          "Name": "Bird",
                          "TierIndex": 1,
                          "PriceGold": 10000,
                          "PriceStacks": 0,
                          "DeliveryWaitingTime": 120.0,
                          "DeliveryPriceStacks": 20.0,
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
                                  "PriceGold": 3436,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 350.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 4362,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 570.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 5385,
                                  "PriceStacks": 24,
                                  "DeliveryWaitingTime": 870.0,
                                  "DeliveryPriceStacks": 10,
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
                                  "PriceGold": 8864,
                                  "PriceStacks": 40,
                                  "DeliveryWaitingTime": 2360.0,
                                  "DeliveryPriceStacks": 22,
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
                                  "PriceGold": 4054,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 490.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3728
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5117,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 790.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4394
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 6113,
                                  "PriceStacks": 27,
                                  "DeliveryWaitingTime": 1120.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4743
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 9563,
                                  "PriceStacks": 43,
                                  "DeliveryWaitingTime": 2740.0,
                                  "DeliveryPriceStacks": 24,
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
                                  "PriceGold": 2979,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 270.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 3804,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 430.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4727,
                                  "PriceStacks": 21,
                                  "DeliveryWaitingTime": 670.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 7605,
                                  "PriceStacks": 34,
                                  "DeliveryWaitingTime": 1740.0,
                                  "DeliveryPriceStacks": 16,
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
                                  "PriceGold": 1829,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 100.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 2521,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 190.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 2350,
                                  "PriceStacks": 10,
                                  "DeliveryWaitingTime": 170.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 4957,
                                  "PriceStacks": 22,
                                  "DeliveryWaitingTime": 740.0,
                                  "DeliveryPriceStacks": 8,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 1481,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 70.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0687
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 1985,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 120.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0809
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 2739,
                                  "PriceStacks": 12,
                                  "DeliveryWaitingTime": 230.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0874
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 5432,
                                  "PriceStacks": 24,
                                  "DeliveryWaitingTime": 890.0,
                                  "DeliveryPriceStacks": 10,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Zeppelin Pilot",
                              "PriceGold": -1,
                              "PriceStacks": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "frog",
                          "Name": "Frog",
                          "TierIndex": 1,
                          "PriceGold": 11000,
                          "PriceStacks": 0,
                          "DeliveryWaitingTime": 120.0,
                          "DeliveryPriceStacks": 20.0,
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
                                  "PriceGold": 3799,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 430.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4736,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 670.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 5479,
                                  "PriceStacks": 24,
                                  "DeliveryWaitingTime": 900.0,
                                  "DeliveryPriceStacks": 10,
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
                                  "PriceGold": 8890,
                                  "PriceStacks": 40,
                                  "DeliveryWaitingTime": 2370.0,
                                  "DeliveryPriceStacks": 22,
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
                                  "PriceGold": 4464,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 600.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4053
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5592,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 940.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4711
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 6266,
                                  "PriceStacks": 28,
                                  "DeliveryWaitingTime": 1180.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4624
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 9478,
                                  "PriceStacks": 42,
                                  "DeliveryWaitingTime": 2690.0,
                                  "DeliveryPriceStacks": 24,
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
                                  "PriceGold": 3290,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 320.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 4126,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 510.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4819,
                                  "PriceStacks": 22,
                                  "DeliveryWaitingTime": 700.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 7579,
                                  "PriceStacks": 34,
                                  "DeliveryWaitingTime": 1720.0,
                                  "DeliveryPriceStacks": 16,
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
                                  "PriceGold": 1805,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 100.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 2476,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 180.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 3203,
                                  "PriceStacks": 14,
                                  "DeliveryWaitingTime": 310.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 5118,
                                  "PriceStacks": 23,
                                  "DeliveryWaitingTime": 790.0,
                                  "DeliveryPriceStacks": 8,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 1352,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 50.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0514
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 1875,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 110.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0597
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 2616,
                                  "PriceStacks": 12,
                                  "DeliveryWaitingTime": 210.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0586
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 5343,
                                  "PriceStacks": 24,
                                  "DeliveryWaitingTime": 860.0,
                                  "DeliveryPriceStacks": 10,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Aviator Cap",
                              "PriceGold": 6000,
                              "PriceStacks": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "cow",
                          "Name": "Cow",
                          "TierIndex": 1,
                          "PriceGold": 10500,
                          "PriceStacks": 0,
                          "DeliveryWaitingTime": 120.0,
                          "DeliveryPriceStacks": 20.0,
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
                                  "PriceGold": 3455,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 360.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4384,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 580.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 5409,
                                  "PriceStacks": 24,
                                  "DeliveryWaitingTime": 880.0,
                                  "DeliveryPriceStacks": 10,
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
                                  "PriceGold": 8941,
                                  "PriceStacks": 40,
                                  "DeliveryWaitingTime": 2400.0,
                                  "DeliveryPriceStacks": 22,
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
                                  "PriceGold": 4079,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 500.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3733
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5147,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 790.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.44
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 6194,
                                  "PriceStacks": 28,
                                  "DeliveryWaitingTime": 1150.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.475
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 9598,
                                  "PriceStacks": 43,
                                  "DeliveryWaitingTime": 2760.0,
                                  "DeliveryPriceStacks": 26,
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
                                  "PriceGold": 2998,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 270.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 3826,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 440.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4751,
                                  "PriceStacks": 21,
                                  "DeliveryWaitingTime": 680.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 7681,
                                  "PriceStacks": 34,
                                  "DeliveryWaitingTime": 1770.0,
                                  "DeliveryPriceStacks": 16,
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
                                  "PriceGold": 1838,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 100.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 2531,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 190.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 2403,
                                  "PriceStacks": 11,
                                  "DeliveryWaitingTime": 170.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 5009,
                                  "PriceStacks": 22,
                                  "DeliveryWaitingTime": 750.0,
                                  "DeliveryPriceStacks": 8,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 1486,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 70.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0688
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 1990,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 120.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.081
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 2795,
                                  "PriceStacks": 12,
                                  "DeliveryWaitingTime": 230.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0875
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 5488,
                                  "PriceStacks": 25,
                                  "DeliveryWaitingTime": 900.0,
                                  "DeliveryPriceStacks": 10,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Winged Helmet",
                              "PriceGold": 6000,
                              "PriceStacks": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "dog",
                          "Name": "Dog",
                          "TierIndex": 1,
                          "PriceGold": 30000,
                          "PriceStacks": 0,
                          "DeliveryWaitingTime": 150.0,
                          "DeliveryPriceStacks": 20.0,
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
                                  "PriceGold": 3617,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 390.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4617,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 640.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 5652,
                                  "PriceStacks": 25,
                                  "DeliveryWaitingTime": 960.0,
                                  "DeliveryPriceStacks": 10,
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
                                  "PriceGold": 9352,
                                  "PriceStacks": 42,
                                  "DeliveryWaitingTime": 2620.0,
                                  "DeliveryPriceStacks": 24,
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
                                  "PriceGold": 4277,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 550.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3754
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5371,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 870.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4425
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 6483,
                                  "PriceStacks": 29,
                                  "DeliveryWaitingTime": 1260.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4776
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 10060,
                                  "PriceStacks": 45,
                                  "DeliveryWaitingTime": 3040.0,
                                  "DeliveryPriceStacks": 28,
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
                                  "PriceGold": 3160,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 300.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 4008,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 480.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4993,
                                  "PriceStacks": 22,
                                  "DeliveryWaitingTime": 750.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 7991,
                                  "PriceStacks": 36,
                                  "DeliveryWaitingTime": 1920.0,
                                  "DeliveryPriceStacks": 18,
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
                                  "PriceGold": 1938,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 110.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 2641,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 210.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 2474,
                                  "PriceStacks": 11,
                                  "DeliveryWaitingTime": 180.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 5226,
                                  "PriceStacks": 23,
                                  "DeliveryWaitingTime": 820.0,
                                  "DeliveryPriceStacks": 8,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 1563,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 70.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0692
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 2122,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 140.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0815
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 2930,
                                  "PriceStacks": 13,
                                  "DeliveryWaitingTime": 260.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.088
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 5727,
                                  "PriceStacks": 26,
                                  "DeliveryWaitingTime": 980.0,
                                  "DeliveryPriceStacks": 10,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Kamikaze",
                              "PriceGold": 6000,
                              "PriceStacks": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "squirrel",
                          "Name": "Squirrel",
                          "TierIndex": 1,
                          "PriceGold": 0,
                          "PriceStacks": 800,
                          "DeliveryWaitingTime": 150.0,
                          "DeliveryPriceStacks": 20.0,
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
                                  "PriceGold": 4015,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 480.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 5030,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 760.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 5819,
                                  "PriceStacks": 26,
                                  "DeliveryWaitingTime": 1020.0,
                                  "DeliveryPriceStacks": 10,
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
                                  "PriceGold": 9440,
                                  "PriceStacks": 42,
                                  "DeliveryWaitingTime": 2670.0,
                                  "DeliveryPriceStacks": 24,
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
                                  "PriceGold": 4784,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 690.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4082
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5947,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1060.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4744
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 6667,
                                  "PriceStacks": 30,
                                  "DeliveryWaitingTime": 1330.0,
                                  "DeliveryPriceStacks": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4656
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 10042,
                                  "PriceStacks": 45,
                                  "DeliveryWaitingTime": 3030.0,
                                  "DeliveryPriceStacks": 28,
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
                                  "PriceGold": 3506,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 370.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4419,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 590.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 5108,
                                  "PriceStacks": 23,
                                  "DeliveryWaitingTime": 780.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 8029,
                                  "PriceStacks": 36,
                                  "DeliveryWaitingTime": 1930.0,
                                  "DeliveryPriceStacks": 18,
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
                                  "PriceGold": 1920,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 110.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 2651,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 210.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 3377,
                                  "PriceStacks": 15,
                                  "DeliveryWaitingTime": 340.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 5388,
                                  "PriceStacks": 24,
                                  "DeliveryWaitingTime": 870.0,
                                  "DeliveryPriceStacks": 10,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 1480,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 70.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0518
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 2008,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 120.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0601
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 2747,
                                  "PriceStacks": 12,
                                  "DeliveryWaitingTime": 230.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.059
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 5627,
                                  "PriceStacks": 25,
                                  "DeliveryWaitingTime": 950.0,
                                  "DeliveryPriceStacks": 10,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Bold Hairstyle",
                              "PriceGold": 20000,
                              "PriceStacks": 480,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "rhino",
                          "Name": "Rhino",
                          "TierIndex": 1,
                          "PriceGold": 40000,
                          "PriceStacks": 1000,
                          "DeliveryWaitingTime": 180.0,
                          "DeliveryPriceStacks": 20.0,
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
                                  "PriceGold": 4156,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 520.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 5229,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 820.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 6176,
                                  "PriceStacks": 28,
                                  "DeliveryWaitingTime": 1140.0,
                                  "DeliveryPriceStacks": 12,
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
                                  "PriceGold": 9837,
                                  "PriceStacks": 44,
                                  "DeliveryWaitingTime": 2900.0,
                                  "DeliveryPriceStacks": 26,
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
                                  "PriceGold": 4956,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 740.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.3831
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 6130,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1130.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4443
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 7043,
                                  "PriceStacks": 31,
                                  "DeliveryWaitingTime": 1490.0,
                                  "DeliveryPriceStacks": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4505
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 10524,
                                  "PriceStacks": 47,
                                  "DeliveryWaitingTime": 3320.0,
                                  "DeliveryPriceStacks": 30,
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
                                  "PriceGold": 3648,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 400.0,
                                  "DeliveryPriceStacks": 6,
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
                                  "PriceGold": 4569,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 630.0,
                                  "DeliveryPriceStacks": 8,
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
                                  "PriceGold": 5416,
                                  "PriceStacks": 24,
                                  "DeliveryWaitingTime": 880.0,
                                  "DeliveryPriceStacks": 10,
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
                                  "PriceGold": 8377,
                                  "PriceStacks": 37,
                                  "DeliveryWaitingTime": 2110.0,
                                  "DeliveryPriceStacks": 20,
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
                                  "PriceGold": 1326,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 50.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0467
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 1952,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 110.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0542
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 2760,
                                  "PriceStacks": 12,
                                  "DeliveryWaitingTime": 230.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0549
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 5920,
                                  "PriceStacks": 26,
                                  "DeliveryWaitingTime": 1050.0,
                                  "DeliveryPriceStacks": 10,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 2161,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 140.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.109
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 2789,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 230.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1264
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 3656,
                                  "PriceStacks": 16,
                                  "DeliveryWaitingTime": 400.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1281
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 6679,
                                  "PriceStacks": 30,
                                  "DeliveryWaitingTime": 1340.0,
                                  "DeliveryPriceStacks": 14,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "El Bandido",
                              "PriceGold": 6000,
                              "PriceStacks": 240,
                              "Bonus": 125
                            }
                          ]
                        },
                        {
                          "Type": "gorilla",
                          "Name": "Gorilla",
                          "TierIndex": 2,
                          "PriceGold": 70000,
                          "PriceStacks": 2800,
                          "DeliveryWaitingTime": 2880.0,
                          "DeliveryPriceStacks": 61.0,
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
                                  "PriceGold": 7770,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1810.0,
                                  "DeliveryPriceStacks": 18,
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
                                  "PriceGold": 9707,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2830.0,
                                  "DeliveryPriceStacks": 26,
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
                                  "PriceGold": 10531,
                                  "PriceStacks": 94,
                                  "DeliveryWaitingTime": 3330.0,
                                  "DeliveryPriceStacks": 30,
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
                                  "PriceGold": 16860,
                                  "PriceStacks": 151,
                                  "DeliveryWaitingTime": 8530.0,
                                  "DeliveryPriceStacks": 74,
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
                                  "PriceGold": 9293,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2590.0,
                                  "DeliveryPriceStacks": 24,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4844
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 11641,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4070.0,
                                  "DeliveryPriceStacks": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6178
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 12412,
                                  "PriceStacks": 111,
                                  "DeliveryWaitingTime": 4620.0,
                                  "DeliveryPriceStacks": 40,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5736
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 18772,
                                  "PriceStacks": 168,
                                  "DeliveryWaitingTime": 10570.0,
                                  "DeliveryPriceStacks": 90,
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
                                  "PriceGold": 7303,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1600.0,
                                  "DeliveryPriceStacks": 16,
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
                                  "PriceGold": 9236,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2560.0,
                                  "DeliveryPriceStacks": 24,
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
                                  "PriceGold": 9961,
                                  "PriceStacks": 89,
                                  "DeliveryWaitingTime": 2980.0,
                                  "DeliveryPriceStacks": 26,
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
                                  "PriceGold": 15787,
                                  "PriceStacks": 141,
                                  "DeliveryWaitingTime": 7480.0,
                                  "DeliveryPriceStacks": 64,
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
                                  "PriceGold": 2762,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 230.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 3278,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 320.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0336
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 4494,
                                  "PriceStacks": 40,
                                  "DeliveryWaitingTime": 610.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0312
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 9318,
                                  "PriceStacks": 83,
                                  "DeliveryWaitingTime": 2600.0,
                                  "DeliveryPriceStacks": 24,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 3025,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 270.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0615
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 3714,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 410.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0783
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 4735,
                                  "PriceStacks": 42,
                                  "DeliveryWaitingTime": 670.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0727
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 9407,
                                  "PriceStacks": 84,
                                  "DeliveryWaitingTime": 2650.0,
                                  "DeliveryPriceStacks": 24,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Aztec Idol",
                              "PriceGold": -1,
                              "PriceStacks": 960,
                              "Bonus": 300
                            }
                          ]
                        },
                        {
                          "Type": "turtle",
                          "Name": "Turtle",
                          "TierIndex": 2,
                          "PriceGold": 100000,
                          "PriceStacks": 3750,
                          "DeliveryWaitingTime": 4320.0,
                          "DeliveryPriceStacks": 91.0,
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
                                  "PriceGold": 8496,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2170.0,
                                  "DeliveryPriceStacks": 20,
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
                                  "PriceGold": 9907,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2940.0,
                                  "DeliveryPriceStacks": 26,
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
                                  "PriceGold": 12401,
                                  "PriceStacks": 111,
                                  "DeliveryWaitingTime": 4610.0,
                                  "DeliveryPriceStacks": 40,
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
                                  "PriceGold": 18876,
                                  "PriceStacks": 169,
                                  "DeliveryWaitingTime": 10690.0,
                                  "DeliveryPriceStacks": 92,
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
                                  "PriceGold": 10079,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3050.0,
                                  "DeliveryPriceStacks": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4585
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 11765,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4150.0,
                                  "DeliveryPriceStacks": 36,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5296
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 14614,
                                  "PriceStacks": 130,
                                  "DeliveryWaitingTime": 6410.0,
                                  "DeliveryPriceStacks": 56,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6077
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 20908,
                                  "PriceStacks": 187,
                                  "DeliveryWaitingTime": 13110.0,
                                  "DeliveryPriceStacks": 112,
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
                                  "PriceGold": 7930,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1890.0,
                                  "DeliveryPriceStacks": 18,
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
                                  "PriceGold": 9438,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2670.0,
                                  "DeliveryPriceStacks": 24,
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
                                  "PriceGold": 11779,
                                  "PriceStacks": 105,
                                  "DeliveryWaitingTime": 4160.0,
                                  "DeliveryPriceStacks": 36,
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
                                  "PriceGold": 17653,
                                  "PriceStacks": 158,
                                  "DeliveryWaitingTime": 9350.0,
                                  "DeliveryPriceStacks": 80,
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
                                  "PriceGold": 3493,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 370.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0559
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 4282,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 550.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0645
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 5884,
                                  "PriceStacks": 53,
                                  "DeliveryWaitingTime": 1040.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0741
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 11444,
                                  "PriceStacks": 102,
                                  "DeliveryWaitingTime": 3930.0,
                                  "DeliveryPriceStacks": 34,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 4584,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 630.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1303
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5458,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 890.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1506
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 7063,
                                  "PriceStacks": 63,
                                  "DeliveryWaitingTime": 1500.0,
                                  "DeliveryPriceStacks": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1728
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 12352,
                                  "PriceStacks": 110,
                                  "DeliveryWaitingTime": 4580.0,
                                  "DeliveryPriceStacks": 40,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Fancy House",
                              "PriceGold": 24000,
                              "PriceStacks": 960,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "hippo",
                          "Name": "Hippo",
                          "TierIndex": 2,
                          "PriceGold": 50000,
                          "PriceStacks": 2600,
                          "DeliveryWaitingTime": 2880.0,
                          "DeliveryPriceStacks": 61.0,
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
                                  "PriceGold": 7340,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1620.0,
                                  "DeliveryPriceStacks": 16,
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
                                  "PriceGold": 8584,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2210.0,
                                  "DeliveryPriceStacks": 20,
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
                                  "PriceGold": 10700,
                                  "PriceStacks": 96,
                                  "DeliveryWaitingTime": 3430.0,
                                  "DeliveryPriceStacks": 30,
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
                                  "PriceGold": 16323,
                                  "PriceStacks": 146,
                                  "DeliveryWaitingTime": 7990.0,
                                  "DeliveryPriceStacks": 68,
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
                                  "PriceGold": 8730,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2290.0,
                                  "DeliveryPriceStacks": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4499
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 10161,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3100.0,
                                  "DeliveryPriceStacks": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5196
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 12640,
                                  "PriceStacks": 113,
                                  "DeliveryWaitingTime": 4790.0,
                                  "DeliveryPriceStacks": 42,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5963
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 18067,
                                  "PriceStacks": 161,
                                  "DeliveryWaitingTime": 9790.0,
                                  "DeliveryPriceStacks": 84,
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
                                  "PriceGold": 6876,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1420.0,
                                  "DeliveryPriceStacks": 14,
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
                                  "PriceGold": 8117,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1980.0,
                                  "DeliveryPriceStacks": 18,
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
                                  "PriceGold": 10131,
                                  "PriceStacks": 90,
                                  "DeliveryWaitingTime": 3080.0,
                                  "DeliveryPriceStacks": 28,
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
                                  "PriceGold": 15253,
                                  "PriceStacks": 136,
                                  "DeliveryWaitingTime": 6980.0,
                                  "DeliveryPriceStacks": 60,
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
                                  "PriceGold": 3021,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 270.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0548
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 3691,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 410.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0633
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 5073,
                                  "PriceStacks": 45,
                                  "DeliveryWaitingTime": 770.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0727
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 9875,
                                  "PriceStacks": 88,
                                  "DeliveryWaitingTime": 2930.0,
                                  "DeliveryPriceStacks": 26,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 3950,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 470.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1279
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 4680,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 660.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1478
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 6087,
                                  "PriceStacks": 54,
                                  "DeliveryWaitingTime": 1110.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1696
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 10707,
                                  "PriceStacks": 96,
                                  "DeliveryWaitingTime": 3440.0,
                                  "DeliveryPriceStacks": 30,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Holy-but-Horny",
                              "PriceGold": 12000,
                              "PriceStacks": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "croko",
                          "Name": "Croko",
                          "TierIndex": 2,
                          "PriceGold": 80000,
                          "PriceStacks": 3000,
                          "DeliveryWaitingTime": 2880.0,
                          "DeliveryPriceStacks": 61.0,
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
                                  "PriceGold": 8254,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2040.0,
                                  "DeliveryPriceStacks": 20,
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
                                  "PriceGold": 8961,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2410.0,
                                  "DeliveryPriceStacks": 22,
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
                                  "PriceGold": 10545,
                                  "PriceStacks": 94,
                                  "DeliveryWaitingTime": 3340.0,
                                  "DeliveryPriceStacks": 30,
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
                                  "PriceGold": 17067,
                                  "PriceStacks": 152,
                                  "DeliveryWaitingTime": 8740.0,
                                  "DeliveryPriceStacks": 74,
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
                                  "PriceGold": 9939,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2960.0,
                                  "DeliveryPriceStacks": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5349
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 10647,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3400.0,
                                  "DeliveryPriceStacks": 30,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5496
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 12357,
                                  "PriceStacks": 110,
                                  "DeliveryWaitingTime": 4580.0,
                                  "DeliveryPriceStacks": 40,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5716
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 19006,
                                  "PriceStacks": 170,
                                  "DeliveryWaitingTime": 10840.0,
                                  "DeliveryPriceStacks": 92,
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
                                  "PriceGold": 7787,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1820.0,
                                  "DeliveryPriceStacks": 18,
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
                                  "PriceGold": 8494,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2160.0,
                                  "DeliveryPriceStacks": 20,
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
                                  "PriceGold": 9978,
                                  "PriceStacks": 89,
                                  "DeliveryWaitingTime": 2990.0,
                                  "DeliveryPriceStacks": 26,
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
                                  "PriceGold": 15996,
                                  "PriceStacks": 143,
                                  "DeliveryWaitingTime": 7680.0,
                                  "DeliveryPriceStacks": 66,
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
                                  "PriceGold": 2846,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 240.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0422
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 3462,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 360.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0434
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 4736,
                                  "PriceStacks": 42,
                                  "DeliveryWaitingTime": 670.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0451
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 9709,
                                  "PriceStacks": 87,
                                  "DeliveryWaitingTime": 2830.0,
                                  "DeliveryPriceStacks": 26,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 3589,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 390.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0986
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 4077,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 500.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1012
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 5285,
                                  "PriceStacks": 47,
                                  "DeliveryWaitingTime": 840.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1053
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 10070,
                                  "PriceStacks": 90,
                                  "DeliveryWaitingTime": 3040.0,
                                  "DeliveryPriceStacks": 28,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Iron Panties",
                              "PriceGold": 18000,
                              "PriceStacks": 720,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "elephant",
                          "Name": "Elephant",
                          "TierIndex": 2,
                          "PriceGold": 60000,
                          "PriceStacks": 2700,
                          "DeliveryWaitingTime": 2880.0,
                          "DeliveryPriceStacks": 61.0,
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
                                  "PriceGold": 7343,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1620.0,
                                  "DeliveryPriceStacks": 16,
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
                                  "PriceGold": 8587,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2210.0,
                                  "DeliveryPriceStacks": 20,
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
                                  "PriceGold": 10703,
                                  "PriceStacks": 96,
                                  "DeliveryWaitingTime": 3440.0,
                                  "DeliveryPriceStacks": 30,
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
                                  "PriceGold": 16327,
                                  "PriceStacks": 146,
                                  "DeliveryWaitingTime": 8000.0,
                                  "DeliveryPriceStacks": 68,
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
                                  "PriceGold": 8733,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2290.0,
                                  "DeliveryPriceStacks": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4502
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 10165,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3100.0,
                                  "DeliveryPriceStacks": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.52
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 12645,
                                  "PriceStacks": 113,
                                  "DeliveryWaitingTime": 4800.0,
                                  "DeliveryPriceStacks": 42,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5968
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 18072,
                                  "PriceStacks": 161,
                                  "DeliveryWaitingTime": 9800.0,
                                  "DeliveryPriceStacks": 84,
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
                                  "PriceGold": 6879,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1420.0,
                                  "DeliveryPriceStacks": 14,
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
                                  "PriceGold": 8120,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1980.0,
                                  "DeliveryPriceStacks": 18,
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
                                  "PriceGold": 10184,
                                  "PriceStacks": 91,
                                  "DeliveryWaitingTime": 3110.0,
                                  "DeliveryPriceStacks": 28,
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
                                  "PriceGold": 15257,
                                  "PriceStacks": 136,
                                  "DeliveryWaitingTime": 6980.0,
                                  "DeliveryPriceStacks": 60,
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
                                  "PriceGold": 3022,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 270.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0549
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 3692,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 410.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0634
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 5074,
                                  "PriceStacks": 45,
                                  "DeliveryWaitingTime": 770.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0727
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 9875,
                                  "PriceStacks": 88,
                                  "DeliveryWaitingTime": 2930.0,
                                  "DeliveryPriceStacks": 26,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 3951,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 470.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.128
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 4681,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 660.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1479
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 6088,
                                  "PriceStacks": 54,
                                  "DeliveryWaitingTime": 1110.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1697
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 10708,
                                  "PriceStacks": 96,
                                  "DeliveryWaitingTime": 3440.0,
                                  "DeliveryPriceStacks": 30,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Grenadier",
                              "PriceGold": 12000,
                              "PriceStacks": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "unicorn",
                          "Name": "Unicorn",
                          "TierIndex": 2,
                          "PriceGold": 0,
                          "PriceStacks": 5000,
                          "DeliveryWaitingTime": 4320.0,
                          "DeliveryPriceStacks": 91.0,
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
                                  "PriceGold": 9162,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2520.0,
                                  "DeliveryPriceStacks": 24,
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
                                  "PriceGold": 11459,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3940.0,
                                  "DeliveryPriceStacks": 34,
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
                                  "PriceGold": 12447,
                                  "PriceStacks": 111,
                                  "DeliveryWaitingTime": 4650.0,
                                  "DeliveryPriceStacks": 40,
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
                                  "PriceGold": 19912,
                                  "PriceStacks": 178,
                                  "DeliveryWaitingTime": 11890.0,
                                  "DeliveryPriceStacks": 102,
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
                                  "PriceGold": 10937,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3590.0,
                                  "DeliveryPriceStacks": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.4946
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 13778,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5690.0,
                                  "DeliveryPriceStacks": 50,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6309
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 14636,
                                  "PriceStacks": 131,
                                  "DeliveryWaitingTime": 6430.0,
                                  "DeliveryPriceStacks": 56,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5857
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 22141,
                                  "PriceStacks": 198,
                                  "DeliveryWaitingTime": 14710.0,
                                  "DeliveryPriceStacks": 124,
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
                                  "PriceGold": 8592,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2210.0,
                                  "DeliveryPriceStacks": 20,
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
                                  "PriceGold": 10934,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3590.0,
                                  "DeliveryPriceStacks": 32,
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
                                  "PriceGold": 11774,
                                  "PriceStacks": 105,
                                  "DeliveryWaitingTime": 4160.0,
                                  "DeliveryPriceStacks": 36,
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
                                  "PriceGold": 18635,
                                  "PriceStacks": 166,
                                  "DeliveryWaitingTime": 10420.0,
                                  "DeliveryPriceStacks": 88,
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
                                  "PriceGold": 3255,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 320.0,
                                  "DeliveryPriceStacks": 5,
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
                                  "PriceGold": 3864,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 450.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0343
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 5274,
                                  "PriceStacks": 47,
                                  "DeliveryWaitingTime": 830.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0318
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 11011,
                                  "PriceStacks": 98,
                                  "DeliveryWaitingTime": 3640.0,
                                  "DeliveryPriceStacks": 32,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 3583,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 390.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0628
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 4416,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 590.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.08
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 5622,
                                  "PriceStacks": 50,
                                  "DeliveryWaitingTime": 950.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0743
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 11075,
                                  "PriceStacks": 99,
                                  "DeliveryWaitingTime": 3680.0,
                                  "DeliveryPriceStacks": 32,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Swordfish Helmet",
                              "PriceGold": 12000,
                              "PriceStacks": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "giraffe",
                          "Name": "Giraffe",
                          "TierIndex": 2,
                          "PriceGold": 90000,
                          "PriceStacks": 3500,
                          "DeliveryWaitingTime": 3600.0,
                          "DeliveryPriceStacks": 76.0,
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
                                  "PriceGold": 8557,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2200.0,
                                  "DeliveryPriceStacks": 20,
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
                                  "PriceGold": 9269,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2580.0,
                                  "DeliveryPriceStacks": 24,
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
                                  "PriceGold": 10912,
                                  "PriceStacks": 97,
                                  "DeliveryWaitingTime": 3570.0,
                                  "DeliveryPriceStacks": 32,
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
                                  "PriceGold": 17676,
                                  "PriceStacks": 158,
                                  "DeliveryWaitingTime": 9370.0,
                                  "DeliveryPriceStacks": 80,
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
                                  "PriceGold": 10307,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3190.0,
                                  "DeliveryPriceStacks": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5372
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 11023,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3650.0,
                                  "DeliveryPriceStacks": 32,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.552
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 12844,
                                  "PriceStacks": 115,
                                  "DeliveryWaitingTime": 4950.0,
                                  "DeliveryPriceStacks": 44,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.5741
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 19648,
                                  "PriceStacks": 175,
                                  "DeliveryWaitingTime": 11580.0,
                                  "DeliveryPriceStacks": 98,
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
                                  "PriceGold": 8090,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1960.0,
                                  "DeliveryPriceStacks": 18,
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
                                  "PriceGold": 8802,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 2320.0,
                                  "DeliveryPriceStacks": 22,
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
                                  "PriceGold": 10344,
                                  "PriceStacks": 92,
                                  "DeliveryWaitingTime": 3210.0,
                                  "DeliveryPriceStacks": 28,
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
                                  "PriceGold": 16554,
                                  "PriceStacks": 148,
                                  "DeliveryWaitingTime": 8220.0,
                                  "DeliveryPriceStacks": 70,
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
                                  "PriceGold": 2967,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 260.0,
                                  "DeliveryPriceStacks": 5,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0424
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 3583,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 390.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0436
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 4909,
                                  "PriceStacks": 44,
                                  "DeliveryWaitingTime": 720.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0453
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 10035,
                                  "PriceStacks": 90,
                                  "DeliveryWaitingTime": 3020.0,
                                  "DeliveryPriceStacks": 28,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 3689,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 410.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.099
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 4227,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 540.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1016
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 5437,
                                  "PriceStacks": 49,
                                  "DeliveryWaitingTime": 890.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1058
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 10432,
                                  "PriceStacks": 93,
                                  "DeliveryWaitingTime": 3260.0,
                                  "DeliveryPriceStacks": 30,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Zebraffe",
                              "PriceGold": 11000,
                              "PriceStacks": 480,
                              "Bonus": 250
                            }
                          ]
                        },
                        {
                          "Type": "wolf",
                          "Name": "Wolf",
                          "TierIndex": 3,
                          "PriceGold": 150000,
                          "PriceStacks": 4500,
                          "DeliveryWaitingTime": 18000.0,
                          "DeliveryPriceStacks": 151.0,
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
                                  "PriceGold": 11735,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4130.0,
                                  "DeliveryPriceStacks": 36,
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
                                  "PriceGold": 13514,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5480.0,
                                  "DeliveryPriceStacks": 48,
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
                                  "PriceGold": 16101,
                                  "PriceStacks": 216,
                                  "DeliveryWaitingTime": 7780.0,
                                  "DeliveryPriceStacks": 66,
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
                                  "PriceGold": 23880,
                                  "PriceStacks": 320,
                                  "DeliveryWaitingTime": 17110.0,
                                  "DeliveryPriceStacks": 144,
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
                                  "PriceGold": 14075,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5940.0,
                                  "DeliveryPriceStacks": 52,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6797
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 16217,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 7890.0,
                                  "DeliveryPriceStacks": 68,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7789
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 19041,
                                  "PriceStacks": 255,
                                  "DeliveryWaitingTime": 10880.0,
                                  "DeliveryPriceStacks": 92,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8436
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 27053,
                                  "PriceStacks": 362,
                                  "DeliveryWaitingTime": 21960.0,
                                  "DeliveryPriceStacks": 186,
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
                                  "PriceGold": 11113,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3700.0,
                                  "DeliveryPriceStacks": 32,
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
                                  "PriceGold": 12789,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4910.0,
                                  "DeliveryPriceStacks": 42,
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
                                  "PriceGold": 15073,
                                  "PriceStacks": 202,
                                  "DeliveryWaitingTime": 6820.0,
                                  "DeliveryPriceStacks": 58,
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
                                  "PriceGold": 22000,
                                  "PriceStacks": 295,
                                  "DeliveryWaitingTime": 14520.0,
                                  "DeliveryPriceStacks": 124,
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
                                  "PriceGold": 4507,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 610.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0537
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5376,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 870.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0615
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 7152,
                                  "PriceStacks": 96,
                                  "DeliveryWaitingTime": 1530.0,
                                  "DeliveryPriceStacks": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0666
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 13894,
                                  "PriceStacks": 186,
                                  "DeliveryWaitingTime": 5790.0,
                                  "DeliveryPriceStacks": 50,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 5534,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 920.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1252
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 6410,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1230.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1435
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 8387,
                                  "PriceStacks": 112,
                                  "DeliveryWaitingTime": 2110.0,
                                  "DeliveryPriceStacks": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1554
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 15153,
                                  "PriceStacks": 203,
                                  "DeliveryWaitingTime": 6890.0,
                                  "DeliveryPriceStacks": 60,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Space Glasses",
                              "PriceGold": 40000,
                              "PriceStacks": 1100,
                              "Bonus": 375
                            }
                          ]
                        },
                        {
                          "Type": "raccoon",
                          "Name": "Raccoon",
                          "TierIndex": 3,
                          "PriceGold": 250000,
                          "PriceStacks": 6500,
                          "DeliveryWaitingTime": 18000.0,
                          "DeliveryPriceStacks": 151.0,
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
                                  "PriceGold": 12144,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4420.0,
                                  "DeliveryPriceStacks": 38,
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
                                  "PriceGold": 14204,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 6050.0,
                                  "DeliveryPriceStacks": 52,
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
                                  "PriceGold": 16654,
                                  "PriceStacks": 223,
                                  "DeliveryWaitingTime": 8320.0,
                                  "DeliveryPriceStacks": 72,
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
                                  "PriceGold": 23684,
                                  "PriceStacks": 317,
                                  "DeliveryWaitingTime": 16830.0,
                                  "DeliveryPriceStacks": 142,
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
                                  "PriceGold": 14540,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 6340.0,
                                  "DeliveryPriceStacks": 54,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6695
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 17050,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 8720.0,
                                  "DeliveryPriceStacks": 74,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7861
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 19810,
                                  "PriceStacks": 265,
                                  "DeliveryWaitingTime": 11770.0,
                                  "DeliveryPriceStacks": 100,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8399
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 26764,
                                  "PriceStacks": 358,
                                  "DeliveryWaitingTime": 21490.0,
                                  "DeliveryPriceStacks": 182,
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
                                  "PriceGold": 11519,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3980.0,
                                  "DeliveryPriceStacks": 36,
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
                                  "PriceGold": 13424,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5410.0,
                                  "DeliveryPriceStacks": 48,
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
                                  "PriceGold": 15672,
                                  "PriceStacks": 210,
                                  "DeliveryWaitingTime": 7370.0,
                                  "DeliveryPriceStacks": 64,
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
                                  "PriceGold": 21751,
                                  "PriceStacks": 291,
                                  "DeliveryWaitingTime": 14190.0,
                                  "DeliveryPriceStacks": 120,
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
                                  "PriceGold": 4331,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 560.0,
                                  "DeliveryPriceStacks": 6,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0364
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5132,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 790.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0427
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 6929,
                                  "PriceStacks": 93,
                                  "DeliveryWaitingTime": 1440.0,
                                  "DeliveryPriceStacks": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0457
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 13584,
                                  "PriceStacks": 182,
                                  "DeliveryWaitingTime": 5540.0,
                                  "DeliveryPriceStacks": 48,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 5006,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 750.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0849
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5892,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1040.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0997
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 7801,
                                  "PriceStacks": 104,
                                  "DeliveryWaitingTime": 1830.0,
                                  "DeliveryPriceStacks": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1065
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 14313,
                                  "PriceStacks": 192,
                                  "DeliveryWaitingTime": 6150.0,
                                  "DeliveryPriceStacks": 54,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Megazorder",
                              "PriceGold": -1,
                              "PriceStacks": 1056,
                              "Bonus": 450
                            }
                          ]
                        },
                        {
                          "Type": "panda",
                          "Name": "Panda",
                          "TierIndex": 3,
                          "PriceGold": 200000,
                          "PriceStacks": 6000,
                          "DeliveryWaitingTime": 18000.0,
                          "DeliveryPriceStacks": 151.0,
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
                                  "PriceGold": 11438,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3920.0,
                                  "DeliveryPriceStacks": 34,
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
                                  "PriceGold": 13557,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5510.0,
                                  "DeliveryPriceStacks": 48,
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
                                  "PriceGold": 15964,
                                  "PriceStacks": 214,
                                  "DeliveryWaitingTime": 7650.0,
                                  "DeliveryPriceStacks": 66,
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
                                  "PriceGold": 23335,
                                  "PriceStacks": 313,
                                  "DeliveryWaitingTime": 16340.0,
                                  "DeliveryPriceStacks": 138,
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
                                  "PriceGold": 13661,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5600.0,
                                  "DeliveryPriceStacks": 48,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6279
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 16188,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 7860.0,
                                  "DeliveryPriceStacks": 68,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7486
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 18889,
                                  "PriceStacks": 253,
                                  "DeliveryWaitingTime": 10700.0,
                                  "DeliveryPriceStacks": 92,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8001
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 26213,
                                  "PriceStacks": 351,
                                  "DeliveryWaitingTime": 20610.0,
                                  "DeliveryPriceStacks": 174,
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
                                  "PriceGold": 10815,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3510.0,
                                  "DeliveryPriceStacks": 32,
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
                                  "PriceGold": 12781,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4900.0,
                                  "DeliveryPriceStacks": 42,
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
                                  "PriceGold": 14986,
                                  "PriceStacks": 201,
                                  "DeliveryWaitingTime": 6740.0,
                                  "DeliveryPriceStacks": 58,
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
                                  "PriceGold": 21356,
                                  "PriceStacks": 286,
                                  "DeliveryWaitingTime": 13680.0,
                                  "DeliveryPriceStacks": 116,
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
                                  "PriceGold": 4940,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 730.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0765
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5918,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1050.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0912
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 7766,
                                  "PriceStacks": 104,
                                  "DeliveryWaitingTime": 1810.0,
                                  "DeliveryPriceStacks": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0975
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 14518,
                                  "PriceStacks": 194,
                                  "DeliveryWaitingTime": 6320.0,
                                  "DeliveryPriceStacks": 54,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 6475,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1260.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1785
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 7609,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1740.0,
                                  "DeliveryPriceStacks": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2129
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 9688,
                                  "PriceStacks": 130,
                                  "DeliveryWaitingTime": 2820.0,
                                  "DeliveryPriceStacks": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2275
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 16409,
                                  "PriceStacks": 220,
                                  "DeliveryWaitingTime": 8080.0,
                                  "DeliveryPriceStacks": 70,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Psycho",
                              "PriceGold": 80000,
                              "PriceStacks": 2200,
                              "Bonus": 375
                            }
                          ]
                        },
                        {
                          "Type": "bunny",
                          "Name": "Bunny",
                          "TierIndex": 3,
                          "PriceGold": 400000,
                          "PriceStacks": 8000,
                          "DeliveryWaitingTime": 22500.0,
                          "DeliveryPriceStacks": 189.0,
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
                                  "PriceGold": 12782,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4900.0,
                                  "DeliveryPriceStacks": 42,
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
                                  "PriceGold": 14968,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 6720.0,
                                  "DeliveryPriceStacks": 58,
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
                                  "PriceGold": 17553,
                                  "PriceStacks": 235,
                                  "DeliveryWaitingTime": 9240.0,
                                  "DeliveryPriceStacks": 80,
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
                                  "PriceGold": 24987,
                                  "PriceStacks": 335,
                                  "DeliveryWaitingTime": 18730.0,
                                  "DeliveryPriceStacks": 158,
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
                                  "PriceGold": 15367,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 7080.0,
                                  "DeliveryPriceStacks": 62,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.674
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 17978,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 9700.0,
                                  "DeliveryPriceStacks": 82,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7914
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 20884,
                                  "PriceStacks": 280,
                                  "DeliveryWaitingTime": 13080.0,
                                  "DeliveryPriceStacks": 112,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8456
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 28245,
                                  "PriceStacks": 378,
                                  "DeliveryWaitingTime": 23930.0,
                                  "DeliveryPriceStacks": 202,
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
                                  "PriceGold": 12105,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4400.0,
                                  "DeliveryPriceStacks": 38,
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
                                  "PriceGold": 14135,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5990.0,
                                  "DeliveryPriceStacks": 52,
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
                                  "PriceGold": 16519,
                                  "PriceStacks": 221,
                                  "DeliveryWaitingTime": 8190.0,
                                  "DeliveryPriceStacks": 70,
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
                                  "PriceGold": 22952,
                                  "PriceStacks": 307,
                                  "DeliveryWaitingTime": 15800.0,
                                  "DeliveryPriceStacks": 134,
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
                                  "PriceGold": 4562,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 620.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0366
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5419,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 880.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.043
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 7269,
                                  "PriceStacks": 97,
                                  "DeliveryWaitingTime": 1590.0,
                                  "DeliveryPriceStacks": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.046
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 14324,
                                  "PriceStacks": 192,
                                  "DeliveryWaitingTime": 6160.0,
                                  "DeliveryPriceStacks": 54,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 5279,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 840.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0855
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 6178,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1150.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1004
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 8193,
                                  "PriceStacks": 110,
                                  "DeliveryWaitingTime": 2010.0,
                                  "DeliveryPriceStacks": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1072
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 15106,
                                  "PriceStacks": 202,
                                  "DeliveryWaitingTime": 6850.0,
                                  "DeliveryPriceStacks": 60,
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
                              "PriceGold": 0,
                              "PriceStacks": 10,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Carrot",
                              "PriceGold": 66000,
                              "PriceStacks": 2200,
                              "Bonus": 375
                            }
                          ]
                        },
                        {
                          "Type": "tiger",
                          "Name": "Tiger",
                          "TierIndex": 3,
                          "PriceGold": 900000,
                          "PriceStacks": 20000,
                          "DeliveryWaitingTime": 27000.0,
                          "DeliveryPriceStacks": 226.0,
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
                                  "PriceGold": 13610,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5560.0,
                                  "DeliveryPriceStacks": 48,
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
                                  "PriceGold": 15668,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 7360.0,
                                  "DeliveryPriceStacks": 64,
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
                                  "PriceGold": 18621,
                                  "PriceStacks": 249,
                                  "DeliveryWaitingTime": 10400.0,
                                  "DeliveryPriceStacks": 88,
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
                                  "PriceGold": 27689,
                                  "PriceStacks": 371,
                                  "DeliveryWaitingTime": 23000.0,
                                  "DeliveryPriceStacks": 194,
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
                                  "PriceGold": 16294,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 7960.0,
                                  "DeliveryPriceStacks": 68,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6927
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 18773,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 10570.0,
                                  "DeliveryPriceStacks": 90,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7938
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 22101,
                                  "PriceStacks": 296,
                                  "DeliveryWaitingTime": 14650.0,
                                  "DeliveryPriceStacks": 124,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8598
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 31347,
                                  "PriceStacks": 420,
                                  "DeliveryWaitingTime": 29480.0,
                                  "DeliveryPriceStacks": 248,
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
                                  "PriceGold": 12885,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4980.0,
                                  "DeliveryPriceStacks": 44,
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
                                  "PriceGold": 14789,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 6560.0,
                                  "DeliveryPriceStacks": 56,
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
                                  "PriceGold": 17490,
                                  "PriceStacks": 234,
                                  "DeliveryWaitingTime": 9180.0,
                                  "DeliveryPriceStacks": 78,
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
                                  "PriceGold": 25455,
                                  "PriceStacks": 341,
                                  "DeliveryWaitingTime": 19440.0,
                                  "DeliveryPriceStacks": 164,
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
                                  "PriceGold": 5235,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 820.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0547
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 6222,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1160.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0627
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 8310,
                                  "PriceStacks": 111,
                                  "DeliveryWaitingTime": 2070.0,
                                  "DeliveryPriceStacks": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0679
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 16067,
                                  "PriceStacks": 215,
                                  "DeliveryWaitingTime": 7740.0,
                                  "DeliveryPriceStacks": 66,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 6382,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1220.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1276
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 7452,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1670.0,
                                  "DeliveryPriceStacks": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1463
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 9707,
                                  "PriceStacks": 130,
                                  "DeliveryWaitingTime": 2830.0,
                                  "DeliveryPriceStacks": 26,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1583
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 17507,
                                  "PriceStacks": 234,
                                  "DeliveryWaitingTime": 9190.0,
                                  "DeliveryPriceStacks": 78,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Pirate Bandana",
                              "PriceGold": 20000,
                              "PriceStacks": 720,
                              "Bonus": 375
                            }
                          ]
                        },
                        {
                          "Type": "dragon",
                          "Name": "Dragon",
                          "TierIndex": 3,
                          "PriceGold": 0,
                          "PriceStacks": 9000,
                          "DeliveryWaitingTime": 22500.0,
                          "DeliveryPriceStacks": 189.0,
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
                                  "PriceGold": 12157,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4430.0,
                                  "DeliveryPriceStacks": 38,
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
                                  "PriceGold": 14416,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 6230.0,
                                  "DeliveryPriceStacks": 54,
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
                                  "PriceGold": 17012,
                                  "PriceStacks": 228,
                                  "DeliveryWaitingTime": 8680.0,
                                  "DeliveryPriceStacks": 74,
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
                                  "PriceGold": 24803,
                                  "PriceStacks": 332,
                                  "DeliveryWaitingTime": 18460.0,
                                  "DeliveryPriceStacks": 156,
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
                                  "PriceGold": 14531,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 6330.0,
                                  "DeliveryPriceStacks": 54,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6328
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 17226,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 8900.0,
                                  "DeliveryPriceStacks": 76,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7545
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 20078,
                                  "PriceStacks": 269,
                                  "DeliveryWaitingTime": 12090.0,
                                  "DeliveryPriceStacks": 102,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8064
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 27929,
                                  "PriceStacks": 374,
                                  "DeliveryWaitingTime": 23400.0,
                                  "DeliveryPriceStacks": 198,
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
                                  "PriceGold": 11533,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 3990.0,
                                  "DeliveryPriceStacks": 36,
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
                                  "PriceGold": 13588,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5540.0,
                                  "DeliveryPriceStacks": 48,
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
                                  "PriceGold": 15932,
                                  "PriceStacks": 213,
                                  "DeliveryWaitingTime": 7610.0,
                                  "DeliveryPriceStacks": 66,
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
                                  "PriceGold": 22722,
                                  "PriceStacks": 304,
                                  "DeliveryWaitingTime": 15490.0,
                                  "DeliveryPriceStacks": 132,
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
                                  "PriceGold": 5265,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 830.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0771
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 6258,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1170.0,
                                  "DeliveryPriceStacks": 12,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0919
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 8262,
                                  "PriceStacks": 111,
                                  "DeliveryWaitingTime": 2050.0,
                                  "DeliveryPriceStacks": 20,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0983
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 15418,
                                  "PriceStacks": 206,
                                  "DeliveryWaitingTime": 7130.0,
                                  "DeliveryPriceStacks": 62,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 6851,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1410.0,
                                  "DeliveryPriceStacks": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1799
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 8119,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1980.0,
                                  "DeliveryPriceStacks": 18,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2145
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 10262,
                                  "PriceStacks": 137,
                                  "DeliveryWaitingTime": 3160.0,
                                  "DeliveryPriceStacks": 28,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.2293
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 17441,
                                  "PriceStacks": 234,
                                  "DeliveryWaitingTime": 9130.0,
                                  "DeliveryPriceStacks": 78,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Samurai",
                              "PriceGold": -1,
                              "PriceStacks": 1100,
                              "Bonus": 500
                            }
                          ]
                        },
                        {
                          "Type": "reindeer",
                          "Name": "Reindeer",
                          "TierIndex": 3,
                          "PriceGold": 300000,
                          "PriceStacks": 7000,
                          "DeliveryWaitingTime": 22500.0,
                          "DeliveryPriceStacks": 189.0,
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
                                  "PriceGold": 12399,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4610.0,
                                  "DeliveryPriceStacks": 40,
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
                                  "PriceGold": 14239,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 6080.0,
                                  "DeliveryPriceStacks": 52,
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
                                  "PriceGold": 16915,
                                  "PriceStacks": 227,
                                  "DeliveryWaitingTime": 8580.0,
                                  "DeliveryPriceStacks": 74,
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
                                  "PriceGold": 25191,
                                  "PriceStacks": 337,
                                  "DeliveryWaitingTime": 19040.0,
                                  "DeliveryPriceStacks": 160,
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
                                  "PriceGold": 14823,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 6590.0,
                                  "DeliveryPriceStacks": 56,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.6845
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 17094,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 8770.0,
                                  "DeliveryPriceStacks": 76,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.7844
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 20071,
                                  "PriceStacks": 269,
                                  "DeliveryWaitingTime": 12090.0,
                                  "DeliveryPriceStacks": 102,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 1,
                                      "Value": 0.8496
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 28495,
                                  "PriceStacks": 382,
                                  "DeliveryWaitingTime": 24360.0,
                                  "DeliveryPriceStacks": 206,
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
                                  "PriceGold": 11726,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 4120.0,
                                  "DeliveryPriceStacks": 36,
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
                                  "PriceGold": 13462,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 5440.0,
                                  "DeliveryPriceStacks": 48,
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
                                  "PriceGold": 15886,
                                  "PriceStacks": 213,
                                  "DeliveryWaitingTime": 7570.0,
                                  "DeliveryPriceStacks": 66,
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
                                  "PriceGold": 23159,
                                  "PriceStacks": 310,
                                  "DeliveryWaitingTime": 16090.0,
                                  "DeliveryPriceStacks": 136,
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
                                  "PriceGold": 4751,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 680.0,
                                  "DeliveryPriceStacks": 8,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.054
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 5625,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 950.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.062
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 7555,
                                  "PriceStacks": 101,
                                  "DeliveryWaitingTime": 1710.0,
                                  "DeliveryPriceStacks": 16,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.0671
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 14603,
                                  "PriceStacks": 196,
                                  "DeliveryWaitingTime": 6400.0,
                                  "DeliveryPriceStacks": 56,
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
                              "Name": "Boost",
                              "UpgradeLevels": [
                                {
                                  "Level": 1,
                                  "PriceGold": 5834,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1020.0,
                                  "DeliveryPriceStacks": 10,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1261
                                    }
                                  ]
                                },
                                {
                                  "Level": 2,
                                  "PriceGold": 6775,
                                  "PriceStacks": 0,
                                  "DeliveryWaitingTime": 1380.0,
                                  "DeliveryPriceStacks": 14,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1446
                                    }
                                  ]
                                },
                                {
                                  "Level": 3,
                                  "PriceGold": 8862,
                                  "PriceStacks": 119,
                                  "DeliveryWaitingTime": 2360.0,
                                  "DeliveryPriceStacks": 22,
                                  "UpgradeChanges": [
                                    {
                                      "Type": 5,
                                      "Value": 0.1565
                                    }
                                  ]
                                },
                                {
                                  "Level": 4,
                                  "PriceGold": 15939,
                                  "PriceStacks": 213,
                                  "DeliveryWaitingTime": 7620.0,
                                  "DeliveryPriceStacks": 66,
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
                              "PriceGold": 0,
                              "PriceStacks": 0,
                              "Bonus": 0
                            },
                            {
                              "Name": "v2",
                              "FriendlyName": "Magic Cap",
                              "PriceGold": -1,
                              "PriceStacks": 2200,
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
                                  "AnimalType": "frogv2",
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
                                  "AnimalType": "frog",
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
                                  "AnimalType": "frog",
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
                                  "AnimalType": "frog",
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
                                  "AnimalType": "frog",
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
                                  "AnimalType": "frogv2",
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
                                  "AnimalType": "frog",
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
                                  "AnimalType": "frog",
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
                          "RewardGold": 500
                        },
                        {
                          "Level": 2,
                          "ExperienceThreshold": 17,
                          "RewardGold": 600
                        },
                        {
                          "Level": 3,
                          "ExperienceThreshold": 29,
                          "RewardGold": 700
                        },
                        {
                          "Level": 4,
                          "ExperienceThreshold": 41,
                          "RewardGold": 700
                        },
                        {
                          "Level": 5,
                          "ExperienceThreshold": 54,
                          "RewardGold": 700
                        },
                        {
                          "Level": 6,
                          "ExperienceThreshold": 67,
                          "RewardGold": 700
                        },
                        {
                          "Level": 7,
                          "ExperienceThreshold": 80,
                          "RewardGold": 700
                        },
                        {
                          "Level": 8,
                          "ExperienceThreshold": 93,
                          "RewardGold": 700
                        },
                        {
                          "Level": 9,
                          "ExperienceThreshold": 106,
                          "RewardGold": 700
                        },
                        {
                          "Level": 10,
                          "ExperienceThreshold": 120,
                          "RewardGold": 800
                        },
                        {
                          "Level": 11,
                          "ExperienceThreshold": 134,
                          "RewardGold": 800
                        },
                        {
                          "Level": 12,
                          "ExperienceThreshold": 148,
                          "RewardGold": 800
                        },
                        {
                          "Level": 13,
                          "ExperienceThreshold": 162,
                          "RewardGold": 800
                        },
                        {
                          "Level": 14,
                          "ExperienceThreshold": 176,
                          "RewardGold": 800
                        },
                        {
                          "Level": 15,
                          "ExperienceThreshold": 190,
                          "RewardGold": 800
                        },
                        {
                          "Level": 16,
                          "ExperienceThreshold": 205,
                          "RewardGold": 900
                        },
                        {
                          "Level": 17,
                          "ExperienceThreshold": 220,
                          "RewardGold": 900
                        },
                        {
                          "Level": 18,
                          "ExperienceThreshold": 235,
                          "RewardGold": 900
                        },
                        {
                          "Level": 19,
                          "ExperienceThreshold": 250,
                          "RewardGold": 900
                        },
                        {
                          "Level": 20,
                          "ExperienceThreshold": 265,
                          "RewardGold": 900
                        },
                        {
                          "Level": 21,
                          "ExperienceThreshold": 280,
                          "RewardGold": 900
                        },
                        {
                          "Level": 22,
                          "ExperienceThreshold": 295,
                          "RewardGold": 900
                        },
                        {
                          "Level": 23,
                          "ExperienceThreshold": 310,
                          "RewardGold": 900
                        },
                        {
                          "Level": 24,
                          "ExperienceThreshold": 325,
                          "RewardGold": 900
                        },
                        {
                          "Level": 25,
                          "ExperienceThreshold": 340,
                          "RewardGold": 900
                        },
                        {
                          "Level": 26,
                          "ExperienceThreshold": 356,
                          "RewardGold": 900
                        },
                        {
                          "Level": 27,
                          "ExperienceThreshold": 372,
                          "RewardGold": 900
                        },
                        {
                          "Level": 28,
                          "ExperienceThreshold": 389,
                          "RewardGold": 1000
                        },
                        {
                          "Level": 29,
                          "ExperienceThreshold": 407,
                          "RewardGold": 1000
                        },
                        {
                          "Level": 30,
                          "ExperienceThreshold": 426,
                          "RewardGold": 1100
                        },
                        {
                          "Level": 31,
                          "ExperienceThreshold": 446,
                          "RewardGold": 1100
                        },
                        {
                          "Level": 32,
                          "ExperienceThreshold": 468,
                          "RewardGold": 1300
                        },
                        {
                          "Level": 33,
                          "ExperienceThreshold": 494,
                          "RewardGold": 1500
                        },
                        {
                          "Level": 34,
                          "ExperienceThreshold": 530,
                          "RewardGold": 2100
                        },
                        {
                          "Level": 35,
                          "ExperienceThreshold": 581,
                          "RewardGold": 2900
                        },
                        {
                          "Level": 36,
                          "ExperienceThreshold": 652,
                          "RewardGold": 4000
                        },
                        {
                          "Level": 37,
                          "ExperienceThreshold": 793,
                          "RewardGold": 6000
                        },
                        {
                          "Level": 38,
                          "ExperienceThreshold": 1194,
                          "RewardGold": 7500
                        },
                        {
                          "Level": 39,
                          "ExperienceThreshold": 2795,
                          "RewardGold": 9000
                        },
                        {
                          "Level": 40,
                          "ExperienceThreshold": 12796,
                          "RewardGold": 10000
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
                    }';

    /**
     * @return array
     */
    public static function getSettings(): array
    {
        return json_decode(self::SETTINGS, true);
    }

    /**
     * @return array
     */
    public static function getLevelSettings(): array
    {
        return json_decode(self::SETTINGS, true)["PlayerLevels"];
    }
}
