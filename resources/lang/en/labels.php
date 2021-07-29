<?php

$response = [
    'maintenance_mode'     => 'Sorry, the website is currently down for a planned maintenance.',
    'nav'                  => [
        'top'              => [
            'home'            => 'Home',
            'blog'            => 'Blog',
            'works'           => 'Works',
            'contact'         => 'Contact',
            'login'           => 'Login',
            'recoverPassword' => 'Recover password',
            'logout'          => 'Logout',
            'signUp'          => 'Sign up',
            'confirmEmail'    => 'Confirm email',
            'account'         => 'Account'
        ],
        'account'          => [
            'profile'       => 'Profile',
            'notifications' => 'Notifications',
            'billing'       => 'Billing',
            'subscriptions' => 'Subscriptions',
            'payments'      => 'Payments',
            'email'         => 'Email',
            'password'      => 'Password'
        ],
        'link'             => [
            'home'                 => 'Home',
            'blog'                 => 'Blog',
            'works'                => 'Works',
            'contact'              => 'Contact',
            'login'                => 'Login',
            'recoverPassword'      => 'Recover password',
            'logout'               => 'Logout',
            'signUp'               => 'Sign up',
            'confirmEmail'         => 'Confirm email',
            'account'              => 'Account',
            'accountProfile'       => 'Profile',
            'accountNotifications' => 'Notifications',
            'accountBilling'       => 'Billing',
            'accountPassword'      => 'Password'
        ],
        'toggleNavigation' => 'Toggle navigation'
    ],
    'category'             => [
        'home'                 => [
            'icon'     => 'md-home',
            'title'    => 'Home',
            'subtitle' => 'Hello, I am a full stack developer passionate in new technologies.
                I am always up to something new but right now <b>I don\'t code on commission</b>. Feel free to contact me for any other question.'
        ],
        'blog'                 => [
            'icon' => 'md-insert-comment'
        ],
        'works'                => [
            'icon'     => 'md-photo',
            'title'    => 'Works',
            'subtitle' => 'My tech stack is <b>Flask</b> - <b>Node.JS</b> - <b>React</b> - <b>Laravel</b> - <b>Wordpress</b> and this is the place where you can find out what exactly I do and how I do it.
            Below the list of some relevant projects I\'ve produced across the years.'
        ],
        'contact'              => [
            'icon'     => 'md-favorite',
            'title'    => 'Contact',
            'subtitle' => 'This is the place where you can easily contact me.
            For any kind of question do not esitate to fill the form below.
            I\'ll answer you as soon as possible that usually is <b>by the next business day</b>.',
        ],
        'login'                => [
            'icon'     => 'md-vpn-key',
            'title'    => 'Login',
            'subtitle' => 'Welcome back, please fill in the form below to login.'
        ],
        'signUp'               => [
            'icon'     => 'md-add-circle',
            'title'    => 'Sign up',
            'subtitle' => "Join here creating your account, you're welcome."
        ],
        'recoverPassword'      => [
            'icon'     => 'md-help',
            'title'    => 'Recover the password',
            'subtitle' => 'No worries, you can recover your lost password filling the form below.'
        ],
        'resetPassword'        => [
            'icon'     => 'md-add-circle',
            'title'    => 'Reset the password',
            'subtitle' => 'You almost done.'
        ],
        'accountProfile'       => [
            'icon'     => 'md-accessibility',
            'title'    => 'Profile',
            'subtitle' => 'Here you can update your basic profile data.'
        ],
        'accountNotifications' => [
            'icon'     => 'md-email',
            'title'    => 'Notifications',
            'subtitle' => 'Turn notifications on or off.'
        ],
        'accountBilling'       => [
            'icon'     => 'md-payment',
            'title'    => 'Billing',
            'subtitle' => 'Manage your billing method, only debit and credit cards are accepted at this time.'
        ],
        'accountPayments'      => [
            'icon'     => 'md-add-shopping-cart',
            'title'    => 'Payments',
            'subtitle' => 'Check your payments history and download your receipts and invoices.'
        ],
        'accountPassword'      => [
            'icon'     => 'md-vpn-key',
            'title'    => 'Password',
            'subtitle' => 'Change your password.'
        ],
    ],
    'footer'               => [
        'copyright' => '©'.date('Y').' '.Config()->get('app.name')
    ],
    'auth'                 => [
        'failed'   => 'These credentials do not match our records.',
        'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    ],
    'pagination'           => [
        'previous' => '&laquo; Previous',
        'next'     => 'Next &raquo;',
    ],
    'password'             => [
        'password' => 'Password must be at least six characters and match the confirmation.',
        'reset'    => 'Your password has been reset!',
        'sent'     => 'I have e-mailed your password reset link!',
        'token'    => 'This password reset token is invalid.',
        'user'     => "I can't find a user with that e-mail address.",
    ],
    'contact'              => [
        'block' => [
            [
                'title'     => 'Subscribe and get updates',
                'paragraph' => "It could be a new project done or a new post in blog.
                    Everytime there's something new in this website you'll be updated.",
            ],
            [
                'title'     => 'Contact',
                'paragraph' => [
                    '<strong>'.Config()->get('app.name').'</strong><br/>
                    London, TW7 5FN<br/>
                    Skype: longo_davide',
                    '<strong>For any inquiries fill the form on your right or write me an email to</strong>
                    <br>
                    <a href="mailto:'.Config()->get('mail.from.address').'">'
                    .Config()->get('mail.from.address').'</a>'
                ]
            ]
        ]
    ],
    'login'                => [
        'block' => [
            [
                'title'     => 'Password lost',
                'paragraph' => [
                    "If you've lost your password you click on the button below to recover it.",
                    'Recover your password'
                ]
            ],
            [
                'title'     => 'Login',
                'paragraph' => 'Please provide your email and password to login.'
            ]
        ]
    ],
    'signup'               => [
        'block' => [
            [
                'title'     => 'Can I help you?',
                'paragraph' => [
                    "If I am providing you a service or I am building up something for you then you might find useful creating your account. 
                        Check out the link below to know more about what I can do for you.",
                    'More info'
                ]
            ],
            [
                'title'     => 'Sign up',
                'paragraph' => 'Choose your email and password to create the account.'
            ]
        ]
    ],
    'signupNotEnabled'     => 'The signup is not enabled at this time',
    'recoverPassword'      => [
        'block' => [
            [
                'title'     => 'Did you lost it?',
                'paragraph' => [
                    'In the unfortunate case you lost the password, no worries you can easily recover it.',
                    "Write your email in the form and follow the instructions I'll send to you.",
                    "If resetting doesn't work and you need help getting back into your account, please contact us."
                ]
            ],
            [
                'title'     => 'Account security',
                'paragraph' => [
                    "If you suspect that you're account has been compromised, please contact us as soon as possible.",
                    "Even if your account is compromised and the email is changed, I can still see the original
                        owner and/or billing email on the account.",
                    "If your account did not have an email address or a credit card/PayPal purchase,
                        I can still work with you to try to verify ownership and return the account."
                ]
            ],
            [
                'title'     => 'Your email',
                'paragraph' => 'Please provide me your email filling it in the box below.'
            ],
        ]
    ],
    'resetPassword'        => [
        'block' => [
            [
                'title'     => 'Please read here',
                'paragraph' => [
                    "You almost done, there's only one thing still to do.",
                    'To be sure on your identity I need you to confirm it.',
                    "In the order to close this recover procedure you have to click on the button.",
                    "I'll send you immediatily a new auto-generated password so you can login again.",
                    "Please, remember to change your password after the login."
                ]
            ],
            [
                'title'     => 'Confirm your identity',
                'paragraph' => "Please, click on the button below to proceed."
            ]
        ]
    ],
    'accountProfile'       => [
        'block' => [
            [
                'title'     => 'Actions',
                'paragraph' => [
                    'Below the sections of your account page.',
                ]
            ],
            [
                'title'     => 'Profile',
                'paragraph' => 'Please keep your profile up to date.'
            ]
        ]
    ],
    'accountNotifications' => [
        'block' => [
            'title'     => 'Click on the flag below to change it',
            'paragraph' => 'Enable it if want keep to be posted about anything new pops up on this website.'
        ]
    ],
    'accountBilling'       => [
        'block' => [
            [
                'title'     => 'Billing',
                'paragraph' => [
                    'Expiration date:',
                    'Last digits:',
                    'Name: ',
                    'Add card details',
                    'Update card details',
                    'WEBFORYOU',
                    'Provide Card Details',
                    //'Subscriptions',
                    //'You have no active subscriptions at this time',
                    //'Payment history',
                    //'There\'s nothing here yet'
                    'Please, add your card details.',
                    'Confirm card details'
                ]
            ]
        ]
    ],
    'accountPayments'      => [
        'block' => [
            [
                'title' => 'Outstanding payments',
            ],
            [
                'title' => 'Payment history',
            ]
        ],
        'date' => 'Date',
        'number' => 'Ref',
        'amount' => 'Amount',
        'action' => '',
        'pay' => 'Pay',
        'pastDue' => 'Past due',
        'pending' => 'Pending',
        'invoice' => 'Invoice',
        'receipt' => 'Receipt',
        'failed' => 'Failed',
        'na' => 'Not available yet'
    ],
    'accountPassword'      => [
        'block' => [
            [
                'title'     => 'Change your password',
                'paragraph' => 'Please notice that you will be logged out after this.'
            ]
        ]
    ],
    'form'                 => [
        'label'  => [
            'submit'           => 'Submit',
            'reset'            => 'Reset',
            'email'            => 'Email',
            'quote'            => 'Get a free quote',
            'whatFor'          => 'What are you looking for?',
            'name'             => 'Name',
            'url'              => 'Url',
            'provideDetail'    => 'Your message',
            'when'             => 'When do you need it?',
            'recoverPassword'  => 'Recover the lost password',
            'bio'              => 'Something about you',
            'company'          => 'Company',
            'location'         => 'Address',
            'password'         => 'Password',
            'confirmPassword'  => 'Confirm password',
            'opt_in_email'     => '',
            'current_password' => 'Current password',
            'new_password'     => 'New password',
            'confirm_password' => 'Confirm password'
        ],
        'error'  => [
            'email'                    => 'That email address is invalid',
            'required'                 => 'This field is required',
            'date'                     => 'That date is invalid',
            'url'                      => 'That url is invalid',
            'wrongPassword'            => 'The password must contain at least 6 characters',
            'confirmPasswordsNotMatch' => "The password confirmation doesn't match",
            'current_password'         => 'Cannot be empty',
            'new_password'             => 'The password must contain at least 6 characters',
            'confirm_password'         => 'Must match the password'
        ],
        'select' => [
            'quote' => [
                'whatFor' => [
                    'Hosting and SYS admin',
                    'Corporate website and e-Commerce',
                    'Custom web and mobile application',
                    'SEO, web marketing and social media marketing',
                    'Just to greet or anything else'
                ]
            ]
        ]
    ],
    'flash'                => [
        'appError'                       => [
            'level' => 'danger',
            'title' => "I wasn't able to complete this action",
            'msg'   => 'This is a bug I am afraid, please try again later',
        ],
        'serviceDown'                    => [
            'level' => 'danger',
            'title' => 'The service is not available at this time',
            'msg'   => 'The requested operation is not possible right now, please try again later',
        ],
        'genericSuccess'                 => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg'   => 'All done, thank you',
        ],
        'verifyEmailFail'                => [
            'level' => 'warning',
            'title' => 'Attention!',
            'msg'   => "The email you've entered seems inactive, please check it and try again",
        ],
        'wrongLogin'                     => [
            'level' => 'danger',
            'title' => 'Attention!',
            'msg'   => 'The login is wrong, check your credentials and try again'
        ],
        'loggedIn'                       => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg'   => "You're in, welcome back"
        ],
        'loggedOut'                      => [
            'level' => 'info',
            'title' => 'Bye bye',
            'msg'   => 'You have been logged out'
        ],
        'recoverPasswordAccountNotFound' => [
            'level' => 'warning',
            'title' => 'Email not found',
            'msg'   => "I'm sorry but I cannot find that email, please check it and try again"
        ],
        'recoverPasswordAccountFound'    => [
            'level' => 'success',
            'title' => 'The instruction has been sent to you',
            'msg'   => 'Please, check your email and come back'
        ],
        'resetPasswordSuccess'           => [
            'level' => 'success',
            'title' => 'It is done!',
            'msg'   => 'Your password has been reset and sent back to your email'
        ],
        'resetPasswordFail'              => [
            'level' => 'danger',
            'title' => 'Something wrong',
            'msg'   => "I couldn't complete the reset, the key provided is expired or not valid anymore, please try it again or contact me"
        ],
        'signUpEmailUnavailable'         => [
            'level' => 'danger',
            'title' => 'Cannot use that email',
            'msg'   => 'The email you used is invalid or unavailable, please check it and try again'
        ],
        'regstrationSuccess'             => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg'   => "Your account has been created but it's not active yet, please, check your email to activate it"
        ],
        'activationSuccess'              => [
            'level' => 'success',
            'title' => 'Welcome!',
            'msg'   => "Your account has been activated, now you can login"
        ],
        'activationFailed'               => [
            'level' => 'danger',
            'title' => "Something's wrong",
            'msg'   => 'I do apologize but I cannot activate this account, it could be already actived or not existing, please contact me if you need support'
        ],
        'subscribeSuccess'               => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg'   => "Your email went in, well done"
        ],
        'contactEnquirySuccess'          => [
            'level' => 'success',
            'title' => 'YAY!',
            'msg'   => 'Your enquiry has been sent, I will answer you as soon possible, thank you'
        ],
        'updateProfileSuccess'           => [
            'level' => 'success',
            'title' => 'Done!',
            'msg'   => 'Your profile has been updated'
        ],
        'updateNotificationsSuccess'     => [
            'level' => 'success',
            'title' => 'Done!',
            'msg'   => 'Your preferences has been updated'
        ],
        'updateBillingSuccess'           => [
            'level' => 'success',
            'title' => 'Great!',
            'msg'   => 'Your card details have been correctly saved'
        ],
        'updatePasswordFail'             => [
            'level' => 'danger',
            'title' => "Your password hasn't been updated",
            'msg'   => 'Something is wrong with the data you submitted, please check it and try again'
        ],
        'updatePasswordSuccess'          => [
            'level' => 'success',
            'title' => 'You have changed your password!',
            'msg'   => 'You have been logged out, log in again using your new password'
        ],
    ],
    'email'                => [
        'title'           => 'Important communication from '.Config()->get(
                'app.name'
            ),
        'footer'          => [
            Config()->get('app.name'),
            "If you wish unsubsribe and don't receive more communications please, contact us at any time.",
            'Information in this email including any attachments may be privileged, confidential and is intended exclusively for the addressee. The views expressed may not be official policy, but the personal views of the originator. If you have received it in error, please notify the sender by return e-mail and delete it from your system. You should not reproduce, distribute, store, retransmit, use or disclose its contents to anyone.'
        ],
        'recoverPassword' => [
            "It seems you lost your password.<br/><br/>No worries, I can fix this issue generating a new password
                and sending it back to you.",
            'If you want to proceed further, please, click on the link below.',
            'Reset your password'
        ],
        'resetPassword'   => [
            'It seems you lost your password.',
            'I have generated a new password you can use the login right now.',
            'Please, consider to change your new password is something else you can remeber more easily.'
        ],
        'userSubscribe'   => [
            'As you requested your email has been subscribed.',
            'Since now on I will keep you updated sending to:'
        ],
        'contactEnquiry'  => [
            'An enquiry has just been sent.',
            "Please keep in mind it's very important answer as soon as possibile."
        ]
    ],
    'lang'                 => [
        'language'       => 'Language',
        'changeLanguage' => 'Change language',
        'en'             => 'English',
        'it'             => 'Italian'
    ],
    'generic'              => [
        'open'      => 'Open',
        'more'      => 'More',
        'appLaunch' => "Launch app"
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