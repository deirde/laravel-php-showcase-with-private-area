<?php

$response = [
    'home' => [
        'title' => 'Digital solutions',
        'description' => 'A wide range of web design, development & consultancy services with attention to the design and creativity.'
    ],
    'blog' => [
        'title' => 'Blog',
        'description' => ''
    ],
    'works' => [
        'title' => 'Check out what I have done so far',
        'description' => 'Programming, backend production, frontend production, full stack web development, concept development, site and interface design.'
    ],
    'contact' => [
        'title' => 'The place where you can easily contact me',
        'description' => 'For any kind of question do not esitate to contact me.'
    ],
    'login' => [
        'noindex' => true,
        'title' => 'Login',
        'description' => 'Developers, digital marketers, tech-kids and lazy cats, you are all welcome back.'
    ],
    'signUp' => [
        'noindex' => true,
        'title' => 'Sign up',
        'description' => 'Join here and create your pesonal account.'
    ],
    'recoverPassword' => [
        'noindex' => true,
        'title' => 'Recover password',
        'description' => 'No worries, you can recover your lost password filling the form below.'
    ],
    'resetPassword' => [
        'noindex' => true,
        'title' => 'Reset password',
        'description' => 'You are few steps away from getting back your password.'
    ],
    'account' => [
        'noindex' => true,
        'title' => 'Your account',
        'description' => ''
    ],
    'accountProfile' => [
        'noindex' => true,
        'title' => 'Your profile',
        'description' => ''
    ],
    'accountNotifications' => [
        'noindex' => true,
        'title' => 'Your notifications settings',
        'description' => ''
    ],
    'accountBilling' => [
        'noindex' => true,
        'title' => 'Your billing settings and history',
        'description' => ''
    ],
    'accountSubscriptions' => [
        'noindex' => true,
        'title' => 'Your subscriptions.',
        'description' => ''
    ],
    'accountPayments' => [
        'noindex' => true,
        'title' => 'Your payments history, receipts and invoices.',
        'description' => ''
    ],
    'accountPassword' => [
        'noindex' => true,
        'title' => 'Update your password',
        'description' => ''
    ]
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