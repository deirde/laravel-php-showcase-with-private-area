<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use App\Services\SendEmailService;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Validator;

/**
 * Class AccountController
 *
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function login($locale, Request $request)
    {
        if (HelperAccountIsLogged()) {
            return redirect(HelperNavUrl(__('urls.accountProfile')));
        } else {
            $response = view('login', ['meta' => __('meta.login')]);
            if ($request->isMethod('post')) {
                $attrs = $request->all();
                $validator = Validator::make(
                    $attrs,
                    [
                        'email'    => 'required|email|max:64',
                        'password' => 'required|max:32',
                    ]
                );
                if ($validator->fails()) {
                    $response = abort(404);
                } else {
                    unset($_POST);
                    $payload = AccountService::login(
                        $attrs['email'],
                        $attrs['password']
                    );
                    if ($payload) {
                        if (key($_GET) !== null) {
                            return redirect(key($_GET));
                        } else {
                            HelperFlash(['loggedIn']);
                            return redirect(__('urls.home'));
                        }
                    } else {
                        if ($payload === false) {
                            HelperFlash(['wrongLogin']);
                        } else {
                            HelperFlash(['serviceDown']);
                        }
                    }
                }
            }
            return $response;
        }
    }

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function signUp($locale, Request $request)
    {
        if (HelperAccountIsLogged()) {
            return abort(404);
        } else {
            $response = view('signUp', ['meta' => __('meta.signUp')]);
            if (
                App()['config']['app']['feature_signup_enabled']
                && $request->isMethod('post')
            ) {
                $attrs = $request->all();
                $validator = Validator::make(
                    $attrs,
                    [
                        'email'           => 'required|email|max:64',
                        'password'        => 'required|min:6|max:64',
                        'confirmPassword' => 'required|min:6|max:64'
                    ]
                );
                if (
                    $validator->fails()
                    || $attrs['password'] !== $attrs['confirmPassword']
                ) {
                    $response = abort(404);
                } else {
                    unset($_POST);
                    if ($payload = AccountService::signUp(
                        $attrs['email'],
                        $attrs['password']
                    )) {
                        if ($payload->status === 409) {
                            HelperFlash(['signUpEmailUnavailable']);
                        } else {
                            if ($payload && $payload->status === 200) {
                                $params = [
                                    'locale' => $locale,
                                    'key'    => $payload->key
                                ];
                                $view = HelperEmailSanitizeView(
                                    view(
                                        'emails.regstrationSuccess',
                                        $params
                                    )->render()
                                );
                                if (SendEmailService::run(
                                    $attrs['email'],
                                    __('labels.email.title'),
                                    $view,
                                    '.'
                                )) {
                                    HelperFlash(['regstrationSuccess']);
                                    HelperAccountSetEmail($attrs['email']);
                                    return redirect(__('urls.home'));
                                } else {
                                    HelperFlash(['appError']);
                                }
                            } else {
                                HelperFlash(['appError']);
                            }
                        }
                    } else {
                        HelperFlash(['serviceDown']);
                    }
                }
            }
            return $response;
        }
    }

    /**
     * @param           $locale
     * @param           $key
     * @param  Request  $request
     *
     * @return mixed
     */
    public function confirmEmail($locale, $key, Request $request)
    {
        if (HelperAccountIsLogged()) {
            return abort(404);
        } else {
            $payload = AccountService::activate($key);
            if ($payload === true) {
                HelperFlash(['activationSuccess']);
                return redirect(HelperNavUrl(__('urls.login')));
            } else {
                if ($payload === false) {
                    HelperFlash(['activationFailed']);
                } else {
                    HelperFlash(['serviceDown']);
                }
            }
            return redirect(HelperNavUrl(__('urls.home')));
        }
    }

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function recoverPassword($locale, Request $request)
    {
        if (HelperAccountIsLogged()) {
            return abort(404);
        } else {
            $response = view(
                'recoverPassword',
                ['meta' => __('meta.recoverPassword')]
            );
            if ($request->isMethod('post')) {
                $attrs = $request->all();
                $validator = Validator::make(
                    $attrs,
                    [
                        'email' => 'required|email|max:64'
                    ]
                );
                if ($validator->fails()) {
                    $response = abort(404);
                } else {
                    $payload = AccountService::isValid($attrs['email']);
                    if ($payload) {
                        $params = [
                            'locale' => $locale,
                            'key'    => $payload->key
                        ];
                        $view = HelperEmailSanitizeView(
                            view('emails.recoverPassword', $params)->render()
                        );
                        if (SendEmailService::run(
                            $attrs['email'],
                            __('labels.email.title'),
                            $view,
                            '.'
                        )) {
                            HelperFlash(['recoverPasswordAccountFound']);
                            HelperAccountSetEmail($attrs['email']);
                            return redirect(__('urls.home'));
                        } else {
                            HelperFlash(['appError']);
                        }
                    } else {
                        if ($payload === false) {
                            HelperFlash(['recoverPasswordAccountNotFound']);
                        } else {
                            HelperFlash(['serviceDown']);
                        }
                    }
                }
            }
            return $response;
        }
    }

    /**
     * @param           $locale
     * @param           $key
     * @param  Request  $request
     *
     * @return mixed
     */
    public function resetPassword($locale, $key, Request $request)
    {
        if (HelperAccountIsLogged()) {
            AccountService::logout();
            HelperAccountLogout();
            HelperFlash(['loggedOut']);
        }
        $response = view('resetPassword', ['meta' => __('meta.resetPassword')]);
        if ($request->isMethod('post')) {
            $payload = AccountService::resetPassword($key);
            if ($payload) {
                $params = [
                    'locale'   => $locale,
                    'password' => base64_decode($payload->password)
                ];
                $view = HelperEmailSanitizeView(
                    view('emails.resetPassword', $params)->render()
                );
                if (SendEmailService::run(
                    HelperAccountGetEmail(),
                    __('labels.email.title'),
                    $view,
                    '.'
                )) {
                    HelperFlash(['resetPasswordSuccess']);
                    return redirect(HelperNavUrl(__('urls.login')));
                } else {
                    HelperFlash(['appError']);
                }
            } else {
                if (false === $payload) {
                    HelperFlash(['resetPasswordFail']);
                    return redirect(__('urls.recoverPassword'));
                } else {
                    HelperFlash(['serviceDown']);
                }
            }
        }
        return $response;
    }

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function account($locale, Request $request)
    {
        return redirect(HelperNavUrl(__('urls.accountProfile')));
    }

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function accountProfile($locale, Request $request)
    {
        if (!HelperAccountIsLogged()) {
            return redirect(HelperNavUrl(__('urls.login')));
        } else {
            $this->updateAccountProfile($request);
            $params = ['meta' => __('meta.accountProfile')];
            $payload = AccountService::getRegistry();
            if ($payload === false || $payload === null) {
                HelperAccountLogout();
                if ($payload === false) {
                    HelperFlash(['appError']);
                } else {
                    HelperFlash(['serviceDown']);
                }
                return redirect(__('urls.home'));
            }
            if (isset($payload->registry)) {
                $params['registry'] = $payload->registry;
            }
            return view('accountProfile', $params);
        }
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */

    private function updateAccountProfile($request)
    {
        if ($request->isMethod('post')) {
            $attrs = $request->all();
            $validator = Validator::make(
                $attrs,
                [
                    'name'     => 'max:64',
                    'bio'      => 'max:512',
                    'url'      => 'url|max:128',
                    'company'  => 'max:128',
                    'location' => 'max:128'
                ]
            );
            if ($validator->fails()) {
                return abort(404);
            } else {
                $payload = AccountService::updateRegistry($attrs);
                if ($payload === false || $payload === null) {
                    HelperAccountLogout();
                    if ($payload === false) {
                        HelperFlash(['appError']);
                    } else {
                        HelperFlash(['serviceDown']);
                    }
                } else {
                    unset($_POST);
                    HelperFlash(['updateProfileSuccess']);
                    return redirect(HelperNavUrl(__('urls.accountProfile')));
                }
            }
        }
    }

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function accountNotifications($locale, Request $request)
    {
        if (!HelperAccountIsLogged()) {
            return redirect(HelperNavUrl(__('urls.login')));
        }
        $this->updateAccountNotifications($request);
        $params = ['meta' => __('meta.accountNotifications')];
        $payload = AccountService::getRegistry();
        if ($payload === false || $payload === null) {
            HelperAccountLogout();
            if ($payload === false) {
                HelperFlash(['appError']);
            } else {
                HelperFlash(['serviceDown']);
            }
            return redirect(__('urls.home'));
        }
        if (isset($payload->registry)) {
            $params['registry'] = $payload->registry;
        }
        return view('accountNotifications', $params);
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    private function updateAccountNotifications($request)
    {
        if ($request->isMethod('post')) {
            $attrs = $request->all();
            if (!isset($attrs['opt_in_email'])) {
                $attrs['opt_in_email'] = 'off';
            }
            $validator = Validator::make(
                $attrs,
                [
                    'opt_in_email' => 'alpha_num|max:64'
                ]
            );
            if ($validator->fails()) {
                return abort(404);
            } else {
                $payload = AccountService::updateRegistry($attrs);
                if ($payload === false || $payload === null) {
                    HelperAccountLogout();
                    if ($payload === false) {
                        HelperFlash(['appError']);
                    } else {
                        HelperFlash(['serviceDown']);
                    }
                } else {
                    unset($_POST);
                    HelperFlash(['updateNotificationsSuccess']);
                    return redirect(
                        HelperNavUrl(__('urls.accountNotifications'))
                    );
                }
            }
        }
    }

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function accountBilling($locale, Request $request)
    {
        if (!HelperAccountIsLogged()) {
            return redirect(HelperNavUrl(__('urls.login')));
        }
        if ($this->updateAccountBilling($request) !== true) {
            HelperFlash(['appError']);
        }
        $params = [
            'meta'    => __('meta.accountBilling'),
            'payload' => StripeService::getCustomer()
        ];
        return view('accountBilling', $params);
    }

    /**
     * @param $request
     *
     * @return bool
     */
    private function updateAccountBilling($request): bool
    {
        if ($request->isMethod('post')) {
            $stripeId = AccountService::getStripeId();
            if (!$stripeId) {
                $stripeId = StripeService::createCustomer()->id;
                AccountService::setStripeId($stripeId);
            }
            \Stripe\Stripe::setApiKey(
                App()['config']['services']['stripe']['secret']
            );
            if (isset($_POST['stripeToken'])) {
                try {
                    $cu = \Stripe\Customer::retrieve($stripeId);
                    $cu->source = $_POST['stripeToken'];
                    $cu->save();
                    HelperFlash(['updateBillingSuccess']);
                } catch (\Stripe\Error\Card $e) {
                    HelperFlash(['serviceDown']);
                    return $e->getJsonBody();
                }
            }
        }
        return true;
    }

    /**
     * @param $request
     *
     * @return mixed
     */
    public function accountSubscriptions($request)
    {
        if (!HelperAccountIsLogged()) {
            return redirect(HelperNavUrl(__('urls.login')));
        }

        $params = [
            'meta' => __('meta.accountSubscriptions'),
        ];
        return view('accountSubscriptions', $params);
    }

    /**
     * @param $request
     *
     * @return mixed
     */
    public function accountPayments($request)
    {
        if (!HelperAccountIsLogged()) {
            return redirect(HelperNavUrl(__('urls.login')));
        }
        //        $stripeId = AccountService::getStripeId();
        $invoices = StripeService::getInvoicesByCustomer();
        //-dd(StripeService::getChargesByCustomer());
        $charges = $this->accountPaymentsTransformCharges($invoices);
        $params = [
            'meta'     => __('meta.accountPayments'),
            'invoices' => (!StripeService::getInvoicesByCustomer())
                ? []
                : array_filter(
                    StripeService::getInvoicesByCustomer(),
                    array(__CLASS__, 'accountPaymentsFilterInvoices')
                ),
            'charges'  => $charges
        ];
        return view('accountPayments', $params);
    }

    /**
     * @param $invoices
     *
     * @return array
     */
    private function accountPaymentsTransformCharges($invoices): array
    {
        /*if (!$invoices) {
            return [];
        }*/

        $response = [];

        // The manually paid invoices are converted into charges
        foreach ($invoices as $invoice) {
            if ($invoice->status === 'paid' && !$invoice->charge) {
                $response[$invoice->created] = $invoice;
            }
        }

        $items = array_filter(
            StripeService::getChargesByCustomer(),
            array(__CLASS__, 'accountPaymentsFilterCharges')
        );
        foreach ($items as $item) {
            $response[$item->created] = $item;
        }
        rsort($response);
        return $response;
    }

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function accountPassword($locale, Request $request)
    {
        if (!HelperAccountIsLogged()) {
            return redirect(HelperNavUrl(__('urls.login')));
        }
        if ($this->updateAccountPassword($request) === true) {
            return redirect(HelperNavUrl(__('urls.login')));
        }
        $params = ['meta' => __('meta.accountPassword')];
        return view('accountPassword', $params);
    }

    /**
     * @param $request
     *
     * @return mixed
     */
    private function updateAccountPassword($request)
    {
        if ($request->isMethod('post')) {
            $attrs = $request->all();
            $validator = Validator::make(
                $attrs,
                [
                    'old_password'         => 'required|min:6|max:16',
                    'new_password'         => 'required|min:6|max:16',
                    'confirm_new_password' => 'required|min:6|max:16',
                ]
            );
            if ($validator->fails()) {
                return abort(404);
            }
            if (
                $attrs['old_password'] !== HelperAccountGetPassword()
                || $attrs['new_password'] !== $attrs['confirm_new_password']
            ) {
                HelperFlash(['updatePasswordFail']);
            } else {
                if ($payload = (AccountService::updatePassword(
                    $attrs['old_password'],
                    $attrs['new_password']
                ) === true)) {
                    AccountService::logout();
                    HelperAccountLogout();
                    HelperFlash(['updatePasswordSuccess']);
                    return true;
                }
                HelperFlash(['appError']);
            }
        }
        return null;
    }

    /**
     * @param           $locale
     * @param           $appName
     * @param  Request  $request
     *
     * @return mixed
     */
    public function accountAppLaunch($locale, $appName, Request $request)
    {
        if (!HelperAccountIsLogged()) {
            return redirect(
                HelperNavUrl(__('urls.login') . '?' . $_SERVER['REDIRECT_URL'])
            );
        }
        if ($appName === 'default') {
            $payload = AccountService::appLaunch($appName);
            if (isset($payload->status) && $payload->status === 200) {
                return redirect(
                    $payload->appLaunch['default'] . HelperAccountGetEmail() .
                        DIRECTORY_SEPARATOR . $payload->token
                );
            }
            HelperFlash(['serviceDown']);
            return redirect(__('urls.home'));
        }
        HelperFlash(['appError']);
        return redirect(__('urls.home'));
    }

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function logout($locale)
    {
        if (HelperAccountIsLogged()) {
            AccountService::logout();
            HelperAccountLogout();
            HelperFlash(['loggedOut']);
            return redirect(__('urls.home'));
        }
        return abort(404);
    }

    /**
     * @param $item
     *
     * @return bool
     */
    private function accountPaymentsFilterInvoices($item): bool
    {
        return $item->status === 'open';
    }

    /**
     * @param $item
     *
     * @return bool
     */
    private function accountPaymentsFilterCharges($item): bool
    {
        // Note! Please, report the failed charges as well
        return $item->status === 'pending' || $item->status === 'succeeded' || $item->status === 'failed';
    }
}
