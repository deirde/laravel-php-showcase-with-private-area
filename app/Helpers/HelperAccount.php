<?php

use Illuminate\Http\Request;

if (!function_exists('HelperAccountIsLogged')) {
    /**
     * @return bool
     */
    function HelperAccountIsLogged()
    {
        return HelperAccountGetEmail()
            && HelperAccountGetPassword()
            && HelperAccountGetToken();
    }
}

if (!function_exists('HelperAccountPutAuthSession')) {
    /**
     * @param $email
     * @param $password
     * @param $token
     *
     * @return bool
     */
    function HelperAccountPutAuthSession($email, $password, $token)
    {
        return HelperAccountSetEmail($email)
            && HelperAccountSetPassword($password)
            && HelperAccountSetToken($token);
    }
}

if (!function_exists('HelperAccountSetEmail')) {
    /**
     * @param $email
     *
     * @return bool
     */
    function HelperAccountSetEmail($email)
    {
        App()->request->session()->put('email', $email);
        App()->request->session()->save();
        return App()->request->session()->get('email') === $email;
    }
}

if (!function_exists('HelperAccountGetEmail')) {
    /**
     * @return mixed
     */
    function HelperAccountGetEmail()
    {
        return App()->request->session()->get('email');
    }
}

if (!function_exists('HelperAccountSetPassword')) {
    /**
     * @param $password
     *
     * @return bool
     */
    function HelperAccountSetPassword($password)
    {
        App()->request->session()->put('password', $password);
        App()->request->session()->save();
        return App()->request->session()->get('password') === $password;
    }
}

if (!function_exists('HelperAccountGetPassword')) {
    /**
     * @return mixed
     */
    function HelperAccountGetPassword()
    {
        return App()->request->session()->get('password');
    }
}

if (!function_exists('HelperAccountSetToken')) {
    /**
     * @param $token
     *
     * @return bool
     */
    function HelperAccountSetToken($token)
    {
        App()->request->session()->put('token', $token);
        App()->request->session()->save();
        return App()->request->session()->get('token') === $token;
    }
}

if (!function_exists('HelperAccountGetToken')) {
    /**
     * @return mixed
     */
    function HelperAccountGetToken()
    {
        return App()->request->session()->get('token');
    }
}

if (!function_exists('HelperAccountSetStripeId')) {
    /**
     * @param $stripe_id
     *
     * @return bool
     */
    function HelperAccountSetStripeId($stripe_id)
    {
        App()->request->session()->put('stripe_id', $stripe_id);
        App()->request->session()->save();
        return App()->request->session()->get('stripe_id') === $stripe_id;
    }
}

if (!function_exists('HelperAccountGetStripeId')) {
    /**
     * @return mixed
     */
    function HelperAccountGetStripeId()
    {
        if ($_COOKIE['__STRIPE_ID']) {
            return $_COOKIE['__STRIPE_ID'];
        }
        return App()->request->session()->get('stripe_id');
    }
}

if (!function_exists('HelperAccountLogout')) {
    function HelperAccountLogout()
    {
        App()->request->session()->flush();
    }
}

?>