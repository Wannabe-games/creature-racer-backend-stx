<?php
// api/src/OpenApi/JwtDecorator.php

declare(strict_types=1);

namespace App\Service\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use ArrayObject;

final class FinishRaceDecorator implements OpenApiFactoryInterface
{
    public function __construct(
        private OpenApiFactoryInterface $decorated
    ) {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);
        $schemas = $openApi->getComponents()->getSchemas();

        $schemas['FinishRaceResponse'] = new ArrayObject([
                                                              'type' => 'object',
                                                              'properties' => [
                                                                  'status' => [
                                                                      'type' => 'string',
                                                                      'example' => 'ok',
                                                                  ],
                                                              ],
                                                          ]);
        $schemas['FinishRaceRequest'] = new ArrayObject([
                                                             'type' => 'object',
                                                             'properties' => [
                                                                 'raceId' => [
                                                                     'type' => 'string',
                                                                     'example' => 'NQwyegfnxYGWQEfngx83274rgtx8nf2g',
                                                                 ],
                                                                 'maxScore' => [
                                                                     'type' => 'int',
                                                                     'example' => 10,
                                                                 ],
                                                             ],
                                                         ]);

        $pathItem = new Model\PathItem(
            ref:  'Race Finish',
            post: new Model\Operation(
                      operationId: 'raceFinish',
                      tags:        ['Race'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Finish the Race',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/FinishRaceResponse',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Race finish',
                      requestBody: new Model\RequestBody(
                                       description: 'Race finish',
                                       content:     new ArrayObject([
                                                                         'application/json' => [
                                                                             'schema' => [
                                                                                 '$ref' => '#/components/schemas/FinishRaceRequest',
                                                                             ],
                                                                         ],
                                                                     ]),
                                   ),
                  ),
        );
        $openApi->getPaths()->addPath('/api/game/race/finish', $pathItem);

        $pathItemByWallet = new Model\PathItem(
            ref:  'Race Finish',
            post: new Model\Operation(
                      operationId: 'raceFinishGetByWallet',
                      tags:        ['Race'],
                      responses:   [
                                       '200' => [
                                           'description' => 'Finish the Race',
                                           'content' => [
                                               'application/json' => [
                                                   'schema' => [
                                                       '$ref' => '#/components/schemas/FinishRaceResponse',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                      summary:     'Race finish by Wallet',
                      requestBody: new Model\RequestBody(
                                       description: 'Race finish',
                                       content:     new ArrayObject([
                                                                         'application/json' => [
                                                                             'schema' => [
                                                                                 '$ref' => '#/components/schemas/FinishRaceRequest',
                                                                             ],
                                                                         ],
                                                                     ]),
                                   ),
                  ),
        );
        $openApi->getPaths()->addPath('/api/game/wallet/{id}/race/finish', $pathItemByWallet);

        return $openApi;
    }
}
