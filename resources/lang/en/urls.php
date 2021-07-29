<?php

$response = [
    'home'                 => '',
    'works'                => 'works',
    'blog'                 => 'https://www.pinkseo.marketing/articles-and-publications/',
    'contact'              => 'contact',
    'login'                => 'login',
    'recoverPassword'      => 'recover-password',
    'resetPassword'        => 'reset-password',
    'logout'               => 'logout',
    'signUp'               => 'sign-up',
    'confirmEmail'         => 'confirm-email',
    'account'              => 'account',
    'accountProfile'       => 'account/profile',
    'accountNotifications' => 'account/notifications',
    'accountBilling'       => 'account/billing',
    'accountSubscriptions' => 'account/subscriptions',
    'accountPayments'      => 'account/payments',
    'accountPassword'      => 'account/password',
    'accountAppLaunch'     => 'account/app-launch'
];

/**
 * Environment values override
 */
if (file_exists(
    $_ = __DIR__.'/../_envs/'.HelperServerName().'/en/'.basename(__FILE__)
)
) {
    return array_replace_recursive($response, require_once($_));
}

return $response;