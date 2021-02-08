<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$mailer =require __DIR__ . '/mailer.php';
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'db' => $db,
		'mailer' =>$mailer,
    ],
	'params' => $params,
];