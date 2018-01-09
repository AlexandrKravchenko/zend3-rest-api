<?php

namespace Rest;

use Zend\Router\Http\Segment;

return [

    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'rest' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/rest[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\RestController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

];