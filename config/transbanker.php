<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Environment
    |--------------------------------------------------------------------------
    |
    | By default, the environment in your application will be 'integration'.
    | When you're ready to accept real payments using Transbank services,
    | change the environment to 'production' to use your credentials.
    |
    | Supported: 'integration', 'production'
    |
    */

    'environment' => env('TRANSBANK_ENV', 'integration'),

    /*
    |--------------------------------------------------------------------------
    | Credentials
    |--------------------------------------------------------------------------
    |
    | Here you put the location of your credentials for each service. These
    | should be inside your 'storage/app/transbank' folder except for the
    | Commerce Code for Webpay. Check the 'README.md' for more details.
    |
    */

    'credentials' => [
        'webpay' => [
            'commerceCode' => env('WEBPAY_COMMERCE_CODE'),
            'privateKey' => env('WEBPAY_PRIVATE_KEY', 'privateKey.crt'),
            'publicCert' => env('WEBPAY_PUBLIC_CERT', 'publicCert.crt'),
            'webpayCert' => env('WEBPAY_CERT', null)
        ],
        'onepay' => [
            'apiKey' => env('ONEPAY_API_KEY', ''),
            'secret' => env('ONEPAY_SECRET', ''),
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Defaults
    |--------------------------------------------------------------------------
    |
    | Here you can put the default values for each service. For simplicity,
    | we used average values that should work for your application. You
    | are free to change these values for what work the most for you.
    |
    */

    'defaults' => [
        'webpay' => [
            'plusReturnUrl'         => env('APP_URL') . '/webpay/result',
            'plusFinalUrl'          => env('APP_URL') . '/webpay/receipt',
            'plusMallReturnUrl'     => env('APP_URL') . '/webpay/mall/result',
            'plusMallFinalUrl'      => env('APP_URL') . '/webpay/mall/receipt',
            'oneclickResponseURL'   => env('APP_URL') . '/webpay/registration',
        ],
        'onepay' => [
            'channel'               => 'web',
            'generateOttQrCode'     => true,
            'callbackUrl'           => env('APP_URL') . '/onepay/result',
            'appScheme'             => 'my-app://onepay/result',
        ],
    ],

];
