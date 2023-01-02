<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use ArrayObject;

final class PlayerDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['Player'] = new \ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'player' => [
                        'type' => 'array',
                        'example' => '{
                      "IsFirstRaceCompleted": true,
                      "Gold": 3090,
                      "Stacks": 10,
                      "Energy_": {
                        "Value": 10,
                        "RestoreStartTime": 0
                      },
                      "PlayerProgress_": {
                        "TierEvents": [
                          {
                            "TierType": "tier1",
                            "TierEventType": "boss",
                            "RacesFinished": 0,
                            "Params": ""
                          },
                          {
                            "TierType": "tier1",
                            "TierEventType": "ladder",
                            "RacesFinished": 0,
                            "Params": ""
                          },
                          {
                            "TierType": "tier1",
                            "TierEventType": "regullar",
                            "RacesFinished": 4,
                            "Params": ""
                          },
                          {
                            "TierType": "tier1",
                            "TierEventType": "daily",
                            "RacesFinished": 0,
                            "Params": "ride_timestamp=0;ride_won_timestamp=0;days_in_a_row=0"
                          },
                          {
                            "TierType": "tier2",
                            "TierEventType": "boss",
                            "RacesFinished": 0,
                            "Params": ""
                          },
                          {
                            "TierType": "tier2",
                            "TierEventType": "ladder",
                            "RacesFinished": 0,
                            "Params": ""
                          },
                          {
                            "TierType": "tier2",
                            "TierEventType": "regullar",
                            "RacesFinished": 0,
                            "Params": ""
                          },
                          {
                            "TierType": "tier2",
                            "TierEventType": "daily",
                            "RacesFinished": 0,
                            "Params": "ride_timestamp=0;ride_won_timestamp=0;days_in_a_row=0"
                          },
                          {
                            "TierType": "tier3",
                            "TierEventType": "boss",
                            "RacesFinished": 0,
                            "Params": ""
                          },
                          {
                            "TierType": "tier3",
                            "TierEventType": "ladder",
                            "RacesFinished": 0,
                            "Params": ""
                          },
                          {
                            "TierType": "tier3",
                            "TierEventType": "regullar",
                            "RacesFinished": 0,
                            "Params": ""
                          },
                          {
                            "TierType": "tier3",
                            "TierEventType": "daily",
                            "RacesFinished": 0,
                            "Params": "ride_timestamp=0;ride_won_timestamp=0;days_in_a_row=0"
                          }
                        ],
                        "_OtherEvents": {
                          "Difficulty1UnlockedPopup": {
                            "Value": false
                          },
                          "Difficulty2UnlockedPopup": {
                            "Value": false
                          },
                          "RewardBoxUsedOnce": {
                            "Value": false
                          },
                          "LastTutorialRaceFinished": {
                            "Value": true
                          }
                        },
                        "LastEvent": {
                          "TierIndex": 0,
                          "TierEventType": "regullar",
                          "LastSelectedDifficulty": 0,
                          "TimeStamp": 637816923159468464
                        },
                        "LastBossFight": {
                          "TierIndex": 0,
                          "TimeStamp": 637813435026903610
                        },
                        "PersonalBest": {
                          "Value": 17.53005
                        },
                        "RacesPlayed": 7,
                        "MPRacesPlayed": 0
                      },
                      "ActiveAnimalType": "boar",
                      "Experience": 13,
                      "Pet": {
                        "LastHappy": 637813395522539658
                      },
                      "Animals": [
                        {
                          "AnimalType": "boar",
                          "ColorOption": 1,
                          "ActiveAttachment": "v1",
                          "AvailableAttachments": [
                            {
                              "Name": "v1"
                            }
                          ],
                          "Upgrades": [
                            {
                              "UpgradeType": "muscles",
                              "Level": 0,
                              "NextLevelTime": 0
                            },
                            {
                              "UpgradeType": "lung",
                              "Level": 1,
                              "NextLevelTime": 0
                            },
                            {
                              "UpgradeType": "reflex",
                              "Level": 0,
                              "NextLevelTime": 0
                            },
                            {
                              "UpgradeType": "boost",
                              "Level": 0,
                              "NextLevelTime": 0
                            },
                            {
                              "UpgradeType": "boost2",
                              "Level": 0,
                              "NextLevelTime": 0
                            }
                          ],
                          "DeliveryTime": 0,
                          "TimeStamp": 637813395522309466
                        }
                      ]
                    }',
                    ],
                ],
            ]
        );

        $schemas['PlayerPostStatus'] = new \ArrayObject(
            [
                'type' => 'object',
                'properties' => [
                    'status' => [
                        'type' => 'string',
                        'example' => 'success',
                    ],
                ],
            ]
        );

        $pathItem = new Model\PathItem(
            ref:  'Player',
            get:  new Model\Operation(
                      operationId: 'playerGet',
                      tags:        ['Player'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Player',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/Player',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Player',
                  ),
            post: new Model\Operation(
                      operationId: 'playerUpdate',
                      tags:        ['Player'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Status',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/PlayerPostStatus',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Player',
                      requestBody: new Model\RequestBody(
                                       description: 'Player',
                                       content:     new \ArrayObject([
                                                                         'application/json' => [
                                                                             'schema' => [
                                                                                 '$ref' => '#/components/schemas/Player',
                                                                             ],
                                                                         ],
                                                                     ]
                                                    ),
                                   ),
                  ),
        );
        $openApi->getPaths()->addPath('/api/game/player', $pathItem);

        $pathItemByWallet = new Model\PathItem(
            ref:  'Player',
            get:  new Model\Operation(
                      operationId: 'playerGetByWallet',
                      tags:        ['Player'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Player',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/Player',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Player',
                      parameters:  [
                                       new Model\Parameter('id', 'path'),
                                   ],
                  ),
            post: new Model\Operation(
                      operationId: 'playerUpdate',
                      tags:        ['Player'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Status',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/PlayerPostStatus',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Player',
                      parameters:  [
                                       new Model\Parameter('id', 'path'),
                                   ],
                      requestBody: new Model\RequestBody(
                                       description: 'Player',
                                       content:     new ArrayObject([
                                                                        'application/json' => [
                                                                            'schema' => [
                                                                                '$ref' => '#/components/schemas/Player',
                                                                            ],
                                                                        ],
                                                                    ]),
                                   ),
                  ),
        );
        $openApi->getPaths()->addPath('/api/game/wallet/{id}/player', $pathItemByWallet);

        return $openApi;
    }
}
