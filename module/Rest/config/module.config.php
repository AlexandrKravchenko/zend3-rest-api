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
                    'route' => '/api[/:id]',
                    // 'route' => '/api[/:action]',
                    'defaults' => [
                        'controller' => Controller\RestController::class
                    ],
                ],
            ],
        ],
    ],

    // This is default Zend Framework Stuff. We can ignore it.
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],

        // We need to set this up so that we're allowed to return JSON
        // responses from our controller.
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],

];