<?php

namespace Blog;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

use Blog\Controller\BlogController;

return [
    'controllers' => [
        'factories' => [
            Controller\BlogController::class => InvokableFactory::class,
        ]
    ],
    'router' => [
        'routes' => [
            'blog' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/blog[/:action]',
                    'defaults' => [
                        'controller' => Controller\BlogController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ]
        
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ]
];
