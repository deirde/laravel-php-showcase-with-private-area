<?php

$response = [
    'home' => '',
    'works' => 'showcase',
    'blog' => 'https://www.pinkseo.marketing/articles-and-publications/',
    'contact' => 'contatti',
    'login' => 'accedi',
    'recoverPassword' => 'recupero-password',
    'resetPassword' => 'reimposta-password',
    'logout' => 'logout',
    'signUp' => 'registrati',
    'confirmEmail' => 'conferma-email',
    'account' => 'account',
    'accountProfile' => 'account/profilo',
    'accountNotifications' => 'account/notifiche',
    'accountBilling' => 'account/pagamento',
    'accountSubscriptions' => 'account/sottoscrizioni',
    'accountPayments' => 'account/pagamenti',
    'accountPassword' => 'account/password',
    'accountAppLaunch' => 'account/app-launch'
];

/**
 * Environment values override
 */
if (file_exists(
    $_ = __DIR__.'/../_envs/'.HelperServerName().'/it/'.basename(__FILE__)
)
) {
    return array_replace_recursive($response, require_once($_));
}

return $response;