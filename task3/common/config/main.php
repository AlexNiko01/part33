<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'redis' => [
            'class' => yii\redis\Connection::class,
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
        ],
        'mongodb' => [
            'class' => 'gepard\mongodb\Connection',
            'dsn' => 'mongodb://mongodb:27017/test',
        ],
    ],
    'controllerMap' => [
        'mongo' => \frontend\controllers\MongoController::class,
    ],
];
