<?php

namespace Auth;

use Zend\Router\Http\Segment;

return [

    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'auth' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/api/auth[/:action]',
                    'defaults' => [
                        'controller' => Controller\AuthController::class
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],

];