<?php
return [
    'class' => 'yii\swiftmailer\Mailer',
    'viewPath' => '@app/mail',
    'useFileTransport' => false,
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'smtp.honbow.com',
        'username'=>'app-noreply@letsfit.com',
        'password'=>'hb@lfapp&04-27#',
        'port' => '465',
        'encryption' => 'ssl',
        'streamOptions' => [
            'ssl' => ['verify_peer_name' => FALSE,]
        ],

    ],
];