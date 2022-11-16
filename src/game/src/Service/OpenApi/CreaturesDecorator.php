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
                    'example' => '[{
                        "id":0,
                        "name":"Boar",
                        "tier":1,
                        "deliveryDelay":120,
                        "diamondCost":4,
                        "instantDeliveryDiamondCost":20
                      },
                      {
                        "id":1,
                        "name":"Bird",
                        "tier":1,
                        "deliveryDelay":120,
                        "diamondCost":8,
                        "instantDeliveryDiamondCost":20
                      },
                      {
                        "id":2,
                        "name":"Cow",
                        "tier":1,
                        "deliveryDelay":120,
                        "diamondCost":12,
                        "instantDeliveryDiamondCost":20
                      },
                      {
                        "id":3,
                        "name":"Frog",
                        "tier":1,
                        "deliveryDelay":120,
                        "diamondCost":16,
                        "instantDeliveryDiamondCost":20
                      },
                      {
                        "id":4,
                        "name":"Dog",
                        "tier":1,
                        "deliveryDelay":150,
                        "diamondCost":20,
                        "instantDeliveryDiamondCost":20
                      },
                      {
                        "id":5,
                        "name":"Squirrel",
                        "tier":1,
                        "deliveryDelay":150,
                        "diamondCost":24,
                        "instantDeliveryDiamondCost":20
                      },
                      {
                        "id":6,
                        "name":"Rhino",
                        "tier":1,
                        "deliveryDelay":180,
                        "diamondCost":28,
                        "instantDeliveryDiamondCost":20
                      },
                      {
                        "id":7,
                        "name":"Hippo",
                        "tier":2,
                        "deliveryDelay":2880,
                        "diamondCost":88,
                        "instantDeliveryDiamondCost":61
                      },
                      {
                        "id":8,
                        "name":"Elephant",
                        "tier":2,
                        "deliveryDelay":2880,
                        "diamondCost":99,
                        "instantDeliveryDiamondCost":61
                      },
                      {
                        "id":9,
                        "name":"Gorilla",
                        "tier":2,
                        "deliveryDelay":2880,
                        "diamondCost":110,
                        "instantDeliveryDiamondCost":61
                      },
                      {
                        "id":10,
                        "name":"Croko",
                        "tier":2,
                        "deliveryDelay":2880,
                        "diamondCost":121,
                        "instantDeliveryDiamondCost":61
                      },
                      {
                        "id":11,
                        "name":"Giraffe",
                        "tier":2,
                        "deliveryDelay":3600,
                        "diamondCost":132,
                        "instantDeliveryDiamondCost":76
                      },
                      {
                        "id":12,
                        "name":"Turtle",
                        "tier":2,
                        "deliveryDelay":4320,
                        "diamondCost":143,
                        "instantDeliveryDiamondCost":91
                      },
                      {
                        "id":13,
                        "name":"Unicorn",
                        "tier":2,
                        "deliveryDelay":4320,
                        "diamondCost":154,
                        "instantDeliveryDiamondCost":91
                      },
                      {
                        "id":14,
                        "name":"Wolf",
                        "tier":3,
                        "deliveryDelay":18000,
                        "diamondCost":255,
                        "instantDeliveryDiamondCost":151
                      },
                      {
                        "id":15,
                        "name":"Panda",
                        "tier":3,
                        "deliveryDelay":18000,
                        "diamondCost":272,
                        "instantDeliveryDiamondCost":151
                      },
                      {
                        "id":16,
                        "name":"Raccoon",
                        "tier":3,
                        "deliveryDelay":18000,
                        "diamondCost":289,
                        "instantDeliveryDiamondCost":151
                      },
                      {
                        "id":17,
                        "name":"Reindeer",
                        "tier":3,
                        "deliveryDelay":22500,
                        "diamondCost":306,
                        "instantDeliveryDiamondCost":189
                      },
                      {
                        "id":18,
                        "name":"Bunny",
                        "tier":3,
                        "deliveryDelay":22500,
                        "diamondCost":323,
                        "instantDeliveryDiamondCost":189
                      },
                      {
                        "id":19,
                        "name":"Dragon",
                        "tier":3,
                        "deliveryDelay":22500,
                        "diamondCost":340,
                        "instantDeliveryDiamondCost":189
                      },
                      {
                        "id":20,
                        "name":"Tiger",
                        "tier":3,
                        "deliveryDelay":27000,
                        "diamondCost":357,
                        "instantDeliveryDiamondCost":226
                      }]',
                ],
            ],
        ]);

        $pathItem = new Model\PathItem(
            ref: 'Creature',
            get: new Model\Operation(
                operationId: 'creatures',
                tags: ['Creatures'],
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
        $openApi->getPaths()->addPath('/api/game/creatures', $pathItem);

        return $openApi;
    }
}