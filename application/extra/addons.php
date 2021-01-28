<?php

return [
    'autoload' => false,
    'hooks' => [
        'app_init' => [
            'crontab',
            'epay',
            'log',
        ],
        'ems_send' => [
            'faems',
        ],
        'ems_notice' => [
            'faems',
        ],
        'admin_login_init' => [
            'loginbg',
        ],
        'response_send' => [
            'loginbgindex',
        ],
        'index_login_init' => [
            'loginbgindex',
        ],
        'config_init' => [
            'third',
        ],
    ],
    'route' => [
        '/example$' => 'example/index/index',
        '/example/d/[:name]' => 'example/demo/index',
        '/example/d1/[:name]' => 'example/demo/demo1',
        '/example/d2/[:name]' => 'example/demo/demo2',
        '/third$' => 'third/index/index',
        '/third/connect/[:platform]' => 'third/index/connect',
        '/third/callback/[:platform]' => 'third/index/callback',
        '/third/bind/[:platform]' => 'third/index/bind',
        '/third/unbind/[:platform]' => 'third/index/unbind',
    ],
    'priority' => [],
];
