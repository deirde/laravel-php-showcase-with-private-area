<?php

$response = [
    'home' => [
        'title' => 'Digital solutions',
        'description' => 'Soluzioni digitali con innovazione e creatività.'
    ],
    'blog' => [
        'title' => 'Blog',
        'description' => ''
    ],
    'works' => [
        'title' => 'Quello che faccio e come lo faccio',
        'description' => 'Le tecnologie che utilizzo sono Python (Flask) - Node.JS - React - Laravel - Wordpress e questa è la pagina dove puoi trovare quello che faccio e come lo faccio. Di seguito alcuni dei progetti che ho realizzato.'
    ],
    'contact' => [
        'title' => 'Tramite questa pagina mi puoi contattare facilmente',
        'description' => 'Per qualunque richiesta puoi compilare il modulo di questa pagina.'
    ],
    'login' => [
        'noindex' => true,
        'title' => 'Login',
        'description' => 'Sei sempre il benvenuto.'
    ],
    'signUp' => [
        'noindex' => true,
        'title' => 'Registrati',
        'description' => 'Registrati e crea il tuo account.'
    ],
    'recoverPassword' => [
        'noindex' => true,
        'title' => 'Recupero password',
        'description' => 'Non preoccuparti, se hai perso la password puoi sempre recuperarla.'
    ],
    'resetPassword' => [
        'noindex' => true,
        'title' => 'Reimposta password',
        'description' => "C'è ancora una cosa da fare prima di poter nuovamente accedere."
    ],
    'account' => [
        'noindex' => true,
        'title' => 'Il tuo account',
        'description' => ''
    ],
    'accountProfile' => [
        'noindex' => true,
        'title' => 'Il tuo profilo',
        'description' => ''
    ],
    'accountPotifications' => [
        'noindex' => true,
        'title' => 'Configura le tue notifiche',
        'description' => ''
    ],
    'accountBilling' => [
        'noindex' => true,
        'title' => 'Opzioni di pagamento',
        'description' => ''
    ],
    'accountSubscriptions' => [
        'noindex' => true,
        'title' => 'Servizi in abbonamento',
        'description' => ''
    ],
    'accountPayments' => [
        'noindex' => true,
        'title' => 'Tutti i pagamenti',
        'description' => ''
    ],
    'accountPassword' => [
        'noindex' => true,
        'title' => 'Cambia la tua password',
        'description' => ''
    ]
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