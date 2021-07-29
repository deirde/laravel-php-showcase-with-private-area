<?php

if (!function_exists('HelperServerName')) {
    /**
     * @return string
     */
    function HelperServerName() {
        $response = $_SERVER['SERVER_NAME'];
        $response = str_replace('www.', '', $response);
        $response = str_replace('.123beta.net', '', $response);
        $response = explode('.', $response);
        if (count($response) === 3) {
            unset($response[0]);
        }
        return implode('.', $response);
    }
}

if (!function_exists('HelperDataJsonToAttr')) {
    /**
     * @param $obj
     * @param $attr
     * @return mixed|null
     */
    function HelperDataJsonToAttr($obj, $attr) {
        $attrs = explode(".", $attr);
        if (Count($attrs) > 1) {
            if ($obj->{$attrs[0]} !== NULL) {
                $response = json_decode(stripslashes($obj->{$attrs[0]}));
                if ($response !== NULL) {
                    unset($attrs[0]);
                    foreach ($attrs as $attr) {
                        if (!property_exists($response, $attr)) {
                            return NULL;
                        } else {
                            $response = $response->{$attr};
                        }
                    }
                    return $response;
                }
            }
        }
    }
}

if (!function_exists('HelperUpdatePermanentEnv')) {
    /**
     * @param string $key
     * @param string $value
     * @param null
     */
    function HelperUpdatePermanentEnv($key, $value) {
        $path = app()->environmentFilePath();
        $escaped = preg_quote('='.env($key), '/');
        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}

?>