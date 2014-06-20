<?php

return [
    'my_module' => [

    ],
    'service_manager' => [
        'invokables' => [
            'MyModule\Service\FooService' => 'MyModule\Service\FooService',
        ],
        'factories' => [
            'MyModule\Service\BarService' => 'MyModule\Factory\BarServiceFactory',
        ],
    ]
];
