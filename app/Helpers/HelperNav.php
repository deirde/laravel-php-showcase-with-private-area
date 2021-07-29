<?php

if (!function_exists('HelperNavUrl')) {
    /**
     * @param $url
     * @return string
     */
    function HelperNavUrl($url) {

        // It is an external link
        if (strpos($url, 'http') === 0) {
            return $url;
        }

        $response = '/' . App::getLocale();
        if ($url) {
            $response .= '/' . $url;
        }

        return $response;
    }
}

if (!function_exists('HelperNavRouteUri')) {
    /**
     * @param $url
     * @return string
     */
    function HelperNavRouteUri($url) {
        return '/{locale}/' . $url;
    }
}

if (!function_exists('HelperNavIsActive')) {
    /**
     * @param $url
     * @return string
     */
    function HelperNavIsActive($url) {
        $response = '';
        if (App()->request->getPathInfo() === HelperNavUrl($url)) {
            $response = 'active';
        }
        if (strlen($url) > 3 && strpos(App()->request->getPathInfo(), HelperNavUrl($url)) === 0) {
            $response = 'active';
        }
        return $response;
    }
}

if (!function_exists('HelperNavGetLangs')) {
    /**
     * @return array
     */
    function HelperNavGetLangs() {
        $response = [];
        foreach (Config()->get('app.langs') as $lang) {
            $isCurrentLang = false;
            $response[$lang]['label'] = __('labels.lang.' . $lang);
            if ($lang == App::getLocale()) {
                $response[$lang]['isActive'] = true;
            } else {
                $response[$lang]['isActive'] = false;
            }
        }
        return $response;
    }
}

if (!function_exists('HelperNavGetUrlInLocale')) {
    /**
     * @param $locale
     * @return string
     */
    function HelperNavGetUrlInLocale($locale) {
        $langs = Config()->get('app.langs');
        $_locale = App()->getLocale();
        $uri = str_replace('/' . $_locale . '/', '', App()->request->getPathInfo());
        $_uri = array_search($uri, __('urls'));
        App()->setLocale($locale);
        if (!$_uri) {
            $_ = 'urls.home';
        } else {
            $_ = 'urls.' . $_uri;
        }
        $response = HelperNavUrl(__($_));
        App()->setLocale($_locale);
        return $response;
    }
}

if (!function_exists('HelperNavSetLocale')) {
    /**
     * @return null
     */
    function HelperNavSetLocale() {
        $locale = explode('/', App()->request->getPathInfo())[1];
        if (!($locale === App()['config']['app']['api_route_prefix'])) {
            if (empty($locale)) {
                if (isset($_COOKIE['locale'])) {
                    $locale = $_COOKIE['locale'];
                }
                if (empty($locale) && isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
                    $locale = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
                }
                if (empty($locale)) {
                    $locale = Config()->get('app.fallback_locale');
                }
            }
            setcookie('locale', $locale, -1);
            App()->setLocale($locale);
        }
    }
}

?>