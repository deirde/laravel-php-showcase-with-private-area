<?php

$response = [
    'nav' => [
        'top' => [
            'home' => 'Home',
            'blog' => 'Blog',
            'works' => 'Showcase',
            'contact' => 'Contatti',
            'login' => 'Accedi',
            'recoverPassword' => 'Password smarrita',
            'logout' => 'Logout',
            'signUp' => 'Registrati',
            'confirmEmail' => 'Conferma email',
            'account' => 'Account'
        ],
        'account' => [
            'profile' => 'Profilo',
            'notifications' => 'Notifiche',
            'billing' => 'Pagamento',
            'email' => 'Email',
            'password' => 'Password'
        ],
        'link' => [
            'home' => 'Home',
            'blog' => 'Blog',
            'works' => 'Showcase',
            'contact' => 'Contatti',
            'login' => 'Accedi',
            'recoverPassword' => 'Password smarrita',
            'logout' => 'Logout',
            'signUp' => 'Registrati',
            'confirmEmail' => 'Conferma email',
            'account' => 'Account',
            'accountProfile' => 'Profilo',
            'accountNotifications' => 'Notifiche',
            'accountBilling' => 'Pagamento',
            'accountPassword' => 'Password'
        ],
        'toggleNavigation' => 'Toggle navigation'
    ],
    'category' => [
        'home' => [
            'icon' => 'md-home',
            'title' => 'Home',
            'subtitle' => 'Ciao! Mi chiamo Davide e sono un appassionato sviluppatore di apps and siti internet.
                In questo momento <b>non sviluppo codice su commissione</b> ma ti invito a contattarmi per qualunque richiesta.'
        ],
        'blog' => [
            'icon' => 'md-home'
        ],
        'works' => [
            'icon' => 'md-photo',
            'title' => 'Showcase',
            'subtitle' => 'Le tecnologie che utilizzo sono <b>Python (Flask)</b> - <b>Node.JS</b> - <b>React</b> - <b>Laravel</b> - <b>Wordpress</b> e questa è la pagina dove puoi trovare quello che faccio e come lo faccio.
            Di seguito alcuni dei progetti che ho realizzato.'
        ],
        'contact' => [
            'icon' => 'md-favorite',
            'title' => 'Contatti',
            'subtitle' => 'Tramite questa pagina mi puoi contattare facilmente.
            Per qualunque richiesta puoi compilare il modulo sottostante.
            Provvederò a risponderti al più possibile, solitamente entro il giorno successivo alla richiesta.',
        ],
        'login' => [
            'icon' => 'md-vpn-key',
            'title' => 'Accedi',
            'subtitle' => 'Bentornato, compila il modulo sottostante per accedere al tuo account.'
        ],
        'signUp' => [
            'icon' => 'md-add-circle',
            'title' => 'Registrati',
            'subtitle' => 'Sei sempre il benvenuto.'
        ],
        'recoverPassword' => [
            'icon' => 'md-help',
            'title' => 'Recupera la password',
            'subtitle' => 'Non preoccuparti, puoi sempre recuperare la password compilando il modulo di questa pagina.'
        ],
        'resetPassword' => [
            'icon' => 'md-add-circle',
            'title' => 'Reimposta la password',
            'subtitle' => 'Hai quasi finito.'
        ],
        'accountProfile' => [
            'icon' => 'md-accessibility',
            'title' => 'Profilo',
            'subtitle' => 'Qui puoi aggiornare il tuo profilo.'
        ],
        'accountNotifications' => [
            'icon' => 'md-email',
            'title' => 'Notifiche',
            'subtitle' => 'Attiva o disattiva le notifiche.'
        ],
        'accountBilling' => [
            'icon' => 'md-add-shopping-cart',
            'title' => 'Pagamento',
            'subtitle' => 'Aggiungi o modifica la tua carta, gestisci i servizi in ricorrenza, verifica i pagamenti e scarica la fatture.'
        ],
        'accountPassword' => [
            'icon' => 'md-vpn-key',
            'title' => 'Password',
            'subtitle' => 'Modifica la tua password.'
        ],
    ],
    'footer' => [
        'copyright' => '©' . date('Y') . ' ' . Config()->get('app.name')
    ],
    'auth' => [
        'failed' => 'Alle credenziali inserite non corrispondono profili.',
        'throttle' => 'Troppi tentativi di accesso. Per piacere, riprova tra :seconds secondi.',
    ],
    'pagination' => [
        'previous' => '&laquo; Precedente',
        'next' => 'Successivo &raquo;',
    ],
    'password' => [
        'password' => 'Le password devono contenere almeno 6 caratteri e coincidere.',
        'reset' => 'La tua password è stata reimpostata!',
        'sent' => 'Ti ho appena inviato il link necessario per reimpostare la tua password!',
        'token' => 'Il token utilizzato non è valido.',
            'user' => "Non trovo un utente con l'email che hai inserito.",
    ],
    'contact' => [
        'block' => [
            [
                'title' => 'Inscriviti e rimani aggiornato',
                'paragraph' => "Potrebbe essere un nuovo progetto nello showcase oppure un nuovo articolo nel blog.
                    Ogni volta che un nuovo contenuto verrà esposto provvederò ad aggiornarti.",
            ],
            [
                'title' => 'Contatti',
                'paragraph' => [
                    '<strong>' . Config()->get('app.name') . '</strong><br/>
                    Londra, TW7 5FN<br/>
                    Skype: longo_davide',
                    '<strong>Per qualunque richiesta compila il modulo o scrivimi una email a</strong>
                    <br>
                    <a href="mailto:' . Config()->get('mail.from.address') . '">' . Config()->get('mail.from.address') . '</a>'
                ]
            ]
        ]
    ],
    'login' => [
        'block' => [
            [
                'title' => 'Password dimenticata',
                'paragraph' => [
                    "Se hai perso la password puoi recuperarla cliccando sul bottone sottostante",
                    'Recupera la password'
                ]
            ],
            [
                'title' => 'Accedi',
                'paragraph' => 'Inserisci la tua email e password per accedere.'
            ]
        ]
    ],
    'signup' => [
        'block' => [
            [
                'title' => 'Posso fare qualcosa per te?',
                'paragraph' => [
                    "Tramite il tuo account potrai accedere a tutti gli strumenti e dati sensibili messi a tua disposizione. Potrai inoltre controllare lo stato dei tui ordini e verificare scadenze e rinnovi.",
                    'Maggiori informazioni'
                ]
            ],
            [
                'title' => 'Registrati',
                'paragraph' => 'Indica la tua email e password e crea il tuo account.'
            ]
        ]
    ],
    'signupNotEnabled' => 'In questo momento la registrazione è disabilitata',
    'recoverPassword' => [
        'block' => [
            [
                'title' => "L'hai smarrita?",
                'paragraph' => [
                    'Qualora tu abbia perso la password, non proccuparti, posso facilmente recuperarla.',
                    "Per procedere inserisci la tua email nel box di questa pagina.",
                    "Alternativamente puoi sempre contattarmi direttamente inviandomi una email."
                ]
            ],
            [
                'title' => "Sicurezza dell'account",
                'paragraph' => [
                    "Se sospetti che il tuo account sia stato compromesso, contattami al più presto possible.",
                    "Anche se il tuo account fosse veramente compromesso, con la tua collaborazione, posso sempre risalire al precedente
                    proprietario e recuperare la tua email."
                ]
            ],
            [
                'title' => 'La tua email',
                'paragraph' => 'Per piacere inserisci la tua email nel box sottostante.'
            ],
        ]
    ],
    'resetPassword' => [
        'block' => [
            [
                'title' => 'Per piacere leggi quanto segue',
                'paragraph' => [
                    "Abbiamo quasi finito..",
                    'Per procedere mi devo accertare della tua identità.',
                    "Per completare la procedura di recupero della password clicca sul bottone sottostante",
                    "Ti invierò una email contente la nuova password e cosí potrai nuovamente accedere.",
                    "Please, remember to change your password after the login."
                ]
            ],
            [
                'title' => 'Conferma la tua identità',
                'paragraph' => "Per piacere, clicca sul pulsante sottostante per procedere."
            ]
        ]
    ],
    'accountProfile' => [
        'block' => [
            [
                'title' => 'Azioni',
                'paragraph' => [
                    'Le sezioni del tuo account.',
                ]
            ],
            [
                'title' => 'Profilo',
                'paragraph' => 'Per piacere mantieni il tuo profilo aggiornato.'
            ]
        ]
    ],
    'accountNotifications' => [
        'block' => [
            'title' => 'Attiva o disattiva le notifiche.',
            'paragraph' => 'Se abilitate provvederò a inviarti delle email riassuntive con tutte le importanti novità.'
        ]
    ],
    'accountBilling' => [
        'block' => [
            [
                'title' => 'Pagamento',
                'paragraph' => [
                    'Data di scadenza:',
                    'Ultime 4 cifre:',
                    'Email: ',
                    'Aggiungi la carta',
                    'Cambia o aggiorna la carta',
                    'WEBFORYOU',
                    'Inserisci i dettagli della carta',
                    //'Subscriptions',
                    //'You have no active subscriptions at this time',
                    //'Payment history',
                    //'There\'s nothing here yet'
                    'Aggiungi la tua carta',
                    'Conferma carta'
                ]
            ]
        ]
    ],
    'accountPassword' => [
        'block' => [
            [
                'title' => 'Cambia la tua password',
                'paragraph' => 'Una volta aggiornata la password dovrai fare di nuovo login.'
            ]
        ]
    ],
    'form' => [
        'label' => [
            'submit' => 'Invia',
            'reset' => 'Reimposta',
            'email' => 'Email',
            'quote' => 'Richiedi la tua quotazione',
            'whatFor' => 'Di cosa hai bisogno?',
            'name' => 'Nome',
            'url' => 'Url',
            'provideDetail' => 'Il tuo messaggio',
            'when' => 'Per quando ti serve?',
            'recoverPassword' => 'Recupera la password',
            'bio' => 'Informazioni biografiche',
            'company' => 'Azienda',
            'location' => 'Indirizzo',
            'password' => 'Password',
            'confirmPassword' => 'Conferma password',
            'opt_in_email' => '',
            'current_password' => 'Password corrente',
            'new_password' => 'Nuova password',
            'confirm_password' => 'Conferma password'
        ],
        'error' => [
            'email' => "L'email inserita non è valida",
            'required' => 'Campo obbligatorio',
            'date' => 'La data non è valida',
            'url' => "L'url non è valido",
            'wrongPassword' => 'La password deve contenere almeno 6 caratteri',
            'confirmPasswordsNotMatch' => 'Le due password non corrispondono',
            'current_password' => 'Campo obbligatorio',
            'new_password' => 'La password deve contenere almeno 6 caratteri',
            'confirm_password' => 'Deve essere uguale alla nuova password'
        ],
        'select' => [
            'quote' => [
                'whatFor' => [
                    'Hosting e sistemistica',
                    'eCommerce e siti internet',
                    'Applicazioni desktop e mobile',
                    'SEO, web marketing e social media marketing',
                    'Tutto il resto'
                ]
            ]
        ]
    ],
    'flash' => [
        'appError' => [
            'level' => 'danger',
            'title' => "Non ho potuto completare l'azione richiesta",
            'msg' => 'Questo è un bug, sono desolato, riprova o contattami',
        ],
        'serviceDown' => [
            'level' => 'danger',
            'title' => 'Il servizio non è al momento disponibile',
            'msg' => "In questo momento non posso completare l'operazione che hai richiesto, riprova o contattami",
        ],
        'genericSuccess' => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg' => 'Fatto, grazie',
        ],
        'verifyEmailFail' => [
            'level' => 'warning',
            'title' => 'Attention!',
            'msg' => "L'email inserita non sembra essere attiva, controlla e riprova",
        ],
        'wrongLogin' => [
            'level' => 'danger',
            'title' => 'Attenzione!',
            'msg' => 'Le credenziali inserite non risultano essere corrette, controlla e riprova'
        ],
        'loggedIn' => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg' => "Bentornato!"
        ],
        'loggedOut' => [
            'level' => 'info',
            'title' => 'Ciao!',
            'msg' => "Logout eseguito"
        ],
        'recoverPasswordAccountNotFound' => [
            'level' => 'warning',
            'title' => "L'email inserita non esiste",
            'msg' => "Non trovo l'email che hai inserito nel nostro database, controlla e riprova"
        ],
        'recoverPasswordAccountFound' => [
            'level' => 'success',
            'title' => 'Ti ho appena inviato una email',
            'msg' => 'Per piacere, controlla le tue email e segui le istruzione che ti ho inviato'
        ],
        'resetPasswordSuccess' => [
            'level' => 'success',
            'title' => 'Fatto!',
            'msg' => 'La tua password è stata reimpostata e inviata alla tua email'
        ],
        'resetPasswordFail' => [
            'level' => 'danger',
            'title' => 'Qualcosa è andato storto',
            'msg' => "Non sono riuscito a resettare la password, la chiave utilizzata non è valida, riprova oppure contattami"
        ],
        'signUpEmailUnavailable' => [
            'level' => 'danger',
            'title' => 'Email non valida',
            'msg' => "L'email che hai utilizzato non mi risulta essere valida, per piacere, riprova o contattami"
        ],
        'regstrationSuccess' => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg' => "Il tuo account è stato creato ma non è ancora attivo, controlla la tua email per l'attivazione"
        ],
        'activationSuccess' => [
            'level' => 'success',
            'title' => 'Welcome!',
            'msg' => "Il tuo account è stato correttamente attivato, adesso puoi di nuovo accedere"
        ],
        'activationFailed' => [
            'level' => 'danger',
            'title' => "Qualcosa è andato storto",
            'msg' => "Sono desolato ma non riesco ad attivare l'account, si è verificato un problema inatteso, riprova o contattami"
        ],
        'subscribeSuccess' => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg' => "La tua email è stata correttamente inserita nel database"
        ],
        'contactEnquirySuccess' => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg' => 'La tua richiesta è stata inviata, provvederò a risponderti al più presto possibile, grazie'
        ],
        'updateProfileSuccess' => [
            'level' => 'success',
            'title' => 'Fatto!',
            'msg' => 'Il tuo profile è stato aggiornato'
        ],
        'updateNotificationsSuccess' => [
            'level' => 'success',
            'title' => 'Fatto!',
            'msg' => 'Le tue preferenze sono state aggiornate'
        ],
        'updateBillingSuccess' => [
            'level' => 'success',
            'title' => 'Fatto!',
            'msg' => 'I dettagli della tua carta sono stati aggiornati'
        ],
        'updatePasswordFail' => [
            'level' => 'danger',
            'title' => 'La tua password non è stata aggiornata',
            'msg' => 'Qualcosa è andato storto, controlla e riprova'
        ],
        'updatePasswordSuccess' => [
            'level' => 'success',
            'title' => 'La tua password è stata aggiornata!',
            'msg' => 'Esegui nuovamente il login utilizzando la tua nuova password'
        ],
    ],
    'email' => [
        'title' => 'Importante comunicazione da ' . Config()->get('app.name'),
        'footer' => [
            Config()->get('app.name'),
            "Se preferisci non ricevere più comunicazioni, inviami una email e provvederò a rimuovere il tuo indirizzo immediatamente.",
            "Le informazioni in questa email inclusi allegati sono riservate, confidenziali ed esclusive per il ricevente. Qualora avessi ricevuto questa email per errore, per piacere, segnalami l'errore ed elimina l'email. La riproduzione o distribuzione del messaggio non è consentita."
        ],
        'recoverPassword' => [
            "A quanto pare hai perso la password.<br/><br/>Nessun problema, posso generare una nuova password e inviarla al tuo indirizzo email.",
            'Per procedere, clicca sul link sottostante.',
            'Reimposta la password'
        ],
        'resetPassword' => [
            'Sembra che tu abbia perso la password.',
            'Ho generato una nuova password che puoi già utilizzare per autenticarti di nuovo.',
            "Per piacere, considera di modificare la password con un'altra che puoi facilmente ricordare."
        ],
        'userSubscribe' => [
            'Come hai richiesto la tua email è stata registrata.',
            'Da adesso in poi provvedermo ad aggiornarti scrivendoti a:'
        ],
        'contactEnquiry' => [
            'La tua richiesta è stata inviata',
            "Per piacere, ricorda che è molto importante rispondere al più presto possibile."
        ]
    ],
    'lang' => [
        'language' => 'Lingua',
        'changeLanguage' => 'Cambia lingua',
        'en' => 'Inglese',
        'it' => 'Italiano'
    ],
    'generic' => [
        'open' => 'Apri',
        'more' => 'Vai',
        'appLaunch' => "Vai all'app"
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