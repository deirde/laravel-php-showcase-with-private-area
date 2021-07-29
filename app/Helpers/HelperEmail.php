<?php

if (!function_exists('HelperEmailSanitizeView')) {
    /**
     * @param $content
     * @return string
     */
    function HelperEmailSanitizeView($content) {
        $response = str_replace(chr(10), '', $content);
        $response = str_replace('  ', '', html_entity_decode($response));
        $protocol = (isset($_SERVER['HTTPS']) ? "https" : "http");
        $response = str_replace('="/', '="' . $protocol . '://' . $_SERVER['SERVER_NAME']. '/', $response);
        return html_entity_decode($response);
    }
}

?>