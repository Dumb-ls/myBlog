<?php

return [
    [
        'name' => 'qq',
        'title' => 'QQ',
        'type' => 'array',
        'content' => [
            'app_id' => '',
            'app_secret' => '',
            'scope' => 'get_user_info',
        ],
        'value' => [
            'app_id' => '100000000',
            'app_secret' => '123456',
            'scope' => 'get_user_info',
        ],
        'rule' => 'required',
        'msg' => '',
        'tip' => '',
        'ok' => '',
        'extend' => '',
    ],
    [
        'name' => 'wechat',
        'title' => '微信',
        'type' => 'array',
        'content' => [
            'app_id' => '',
            'app_secret' => '',
            'callback' => '',
            'scope' => 'snsapi_base',
        ],
        'value' => [
            'app_id' => '100000000',
            'app_secret' => '123456',
            'scope' => 'snsapi_userinfo',
        ],
        'rule' => 'required',
        'msg' => '',
        'tip' => '',
        'ok' => '',
        'extend' => '',
    ],
    [
        'name' => 'weibo',
        'title' => '微博',
        'type' => 'array',
        'content' => [
            'app_id' => '',
            'app_secret' => '',
            'scope' => 'get_user_info',
        ],
        'value' => [
            'app_id' => '100000000',
            'app_secret' => '123456',
            'scope' => 'get_user_info',
        ],
        'rule' => 'required',
        'msg' => '',
        'tip' => '',
        'ok' => '',
        'extend' => '',
    ],
    [
        'name' => 'bindaccount',
        'title' => '账号绑定',
        'type' => 'radio',
        'content' => [
            1 => '开启',
            0 => '关闭',
        ],
        'value' => '1',
        'rule' => 'required',
        'msg' => '',
        'tip' => '',
        'ok' => '是否开启账号绑定',
        'extend' => '',
    ],
    [
        'name' => 'status',
        'title' => '前台第三方登录开关',
        'type' => 'checkbox',
        'content' => [
            'qq' => 'QQ',
            'wechat' => '微信',
            'weibo' => '微博',
        ],
        'value' => 'qq,wechat,weibo',
        'rule' => '',
        'msg' => '',
        'tip' => '',
        'ok' => '前台第三方登录的开关',
        'extend' => '',
    ],
    [
        'name' => 'rewrite',
        'title' => '伪静态',
        'type' => 'array',
        'content' => [],
        'value' => [
            'index/index' => '/third$',
            'index/connect' => '/third/connect/[:platform]',
            'index/callback' => '/third/callback/[:platform]',
            'index/bind' => '/third/bind/[:platform]',
            'index/unbind' => '/third/unbind/[:platform]',
        ],
        'rule' => 'required',
        'msg' => '',
        'tip' => '',
        'ok' => '',
        'extend' => '',
    ],
];
