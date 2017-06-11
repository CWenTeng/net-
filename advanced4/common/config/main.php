<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //开启RBAC，来管理用户
        'authManager'=>[
          'class'=>'yii\rbac\DbManager',
        ],
    ],
];
