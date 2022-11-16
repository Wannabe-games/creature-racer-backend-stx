<?php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;

final class UserCreaturesDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {}

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['UserCreatures'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'creatures' => [
                    'type' => 'array',
                    'example' => '[
                        {
                            "id": "1eca648f-f94a-600c-966e-eda9b0f7948a",
                            "creatureId": 14,
                            "name": "creature_9",
                            "type": "giraffe",
                            "boostAcceleration": {
                                "value": 3.0737,
                                "max": 5.5854
                            },
                            "acceleration": {
                                "value": 0.1233,
                                "max": 0.1732
                            },
                            "boostTime": {
                                "value": 2.4,
                                "max": 2.6312
                            },
                            "speed": {
                                "value": 27.5112,
                                "max": 36.5501
                            },
                            "belly": 3,
                            "buttocks": 4,
                            "heart": 2,
                            "lungs": 2,
                            "muscles": 4,
                            "contract": null,
                            "isForGame": true,
                            "isStacked": false,
                            "nftExpiryDate": "2022-12-21 16:38:42",
                            "rewardPool": null,
                            "bonus": false,
                            "skinColor": 0,
                            "hash": null
                        },
                        {
                            "id": "1eca648f-f941-6902-a036-eda9b0f7948a",
                            "creatureId": 4,
                            "name": "creature_8",
                            "type": "cow",
                            "boostAcceleration": {
                                "value": 2.4508,
                                "max": 5.5854
                            },
                            "acceleration": {
                                "value": 0.1019,
                                "max": 0.1732
                            },
                            "boostTime": {
                                "value": 2.1571,
                                "max": 2.6312
                            },
                            "speed": {
                                "value": 23.7574,
                                "max": 36.5501
                            },
                            "belly": 4,
                            "buttocks": 2,
                            "heart": 4,
                            "lungs": 3,
                            "muscles": 2,
                            "contract": null,
                            "isForGame": true,
                            "isStacked": false,
                            "nftExpiryDate": "2022-12-21 16:38:42",
                            "rewardPool": null,
                            "bonus": false,
                            "skinColor": 0,
                            "hash": null
                        }
                    ]'
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'User Creature',
            get: new Model\Operation(
                operationId: 'userCreatures',
                tags: ['Creature'],
                responses: [
                    '200' => [
                        'description' => 'Get all creatures signed to user',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/UserCreatures',
                                ],
                            ],
                        ],
                    ],
                ],
                summary: 'User Creature',
                parameters: [
                    new Model\Parameter('itemsPerPage', 'query', 'How many creature on page'),
                    new Model\Parameter('page', 'query', 'Page number'),
                ],
            ),
        );
        $openApi->getPaths()->addPath('/api/portal/user-creatures', $pathItem);

        return $openApi;
    }
}