<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET')
    ],
    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1'
    ],
    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET')
    ],
    'stripe' => [
        //'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'baseUrl' => env('SERVICE_STRIPE_BASE_URL'),
        'customerEndpoint' => env('SERVICE_STRIPE_CUSTOMER_ENDPOINT'),
        'createChargesEndpoint' => env('SERVICE_STRIPE_CHARGES_ENDPOINT'),
        'createInvoicesEndpoint' => env('SERVICE_STRIPE_INVOICES_ENDPOINT')
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for custom services.
    |
    */
    'baseSettings' => [
        'contentType' => 'application/x-www-form-urlencoded',
        'userAgent' => env('SERVICE_USER_AGENT')
    ],
    'validateEmail' => [
        'baseUrl' => env('SERVICE_VALIDATE_EMAIL_URL'),
        'userAgent' => env('SERVICE_USER_AGENT'),
        'secret' => env('SERVICE_SECRET')
    ],
    'sendEmail' => [
        'baseUrl' => env('SERVICE_SEND_EMAIL_URL'),
        'userAgent' => env('SERVICE_USER_AGENT'),
        'secret' => env('SERVICE_SECRET'),
        'campaign_name' => env('SERVICE_SEND_EMAIL_CAMPAIGN_NAME', 'default'),
        'smtp_host' => env('MAIL_HOST') . ':' . env('MAIL_PORT'),
        'smtp_uid' => env('MAIL_USERNAME'),
        'smtp_pwd' => env('MAIL_PASSWORD'),
        'from_addr' => env('MAIL_USERNAME')
    ],
    'accountSignUp' => [
        'baseUrl' => env('SERVICE_ACCOUNT_SIGNUP_URL'),
        'secret' => env('SERVICE_SECRET')
    ],
    'accountActivate' => [
        'baseUrl' => env('SERVICE_ACCOUNT_ACTIVATE_URL'),
        'secret' => env('SERVICE_SECRET')
    ],
    'accountAuthenticate' => [
        'baseUrl' => env('SERVICE_ACCOUNT_AUTHENTICATE_URL'),
        'secret' => env('SERVICE_SECRET')
    ],
    'accountAuthorize' => [
        'baseUrl' => env('SERVICE_ACCOUNT_AUTHORIZE_URL'),
        'secret' => env('SERVICE_SECRET')
    ],
    'accountIsValid' => [
        'baseUrl' => env('SERVICE_ACCOUNT_IS_VALID_URL'),
        'secret' => env('SERVICE_SECRET')
    ],
    'accountResetPassword' => [
        'baseUrl' => env('SERVICE_ACCOUNT_RESET_PASSWORD_URL'),
        'secret' => env('SERVICE_SECRET')
    ],
    'accountOttGenerate' => [
        'baseUrl' => env('SERVICE_ACCOUNT_OTT_GENERATE_URL'),
        'secret' => env('SERVICE_SECRET')
    ],
    'accountGetRegistry' => [
        'baseUrl' => env('SERVICE_ACCOUNT_GET_REGISTRY')
    ],
    'accountUpdateRegistry' => [
        'baseUrl' => env('SERVICE_ACCOUNT_UPDATE_REGISTRY')
    ],
    'accountAppLaunch' => [
        'default' => env('SERVICE_ACCOUNT_APP_DEFAULT_LAUNCH')
    ],
    'accountGetStripeId' => [
        'baseUrl' => env('SERVICE_ACCOUNT_GET_STRIPE_ID')
    ],
    'accountSetStripeId' => [
        'baseUrl' => env('SERVICE_ACCOUNT_SET_STRIPE_ID')
    ],
    'accountUpdatePassword' => [
        'baseUrl' => env('SERVICE_ACCOUNT_UPDATE_PASSWORD')
    ],
    'accountLogout' => [
        'baseUrl' => env('SERVICE_ACCOUNT_LOGOUT')
    ]
];

?>