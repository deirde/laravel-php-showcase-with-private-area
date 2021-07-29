<?php

if (!function_exists('HelperFlashInit')) {
    /**
     * @param $labelKey
     * @return array
     */
    function HelperFlashInit($labelKey) {
        $response = __('labels.flash.' . $labelKey);
        if (isset($response['level'])
            && isset($response['title'])
            && isset($response['msg'])) {
            return [
                'level' => $response['level'],
                'title' => $response['title'],
                'msg' => $response['msg']
            ];
        }
    }
}

if (!function_exists('HelperFlash')) {
    /**
     * @param $labelsKey
     */
    function HelperFlash($labelsKey) {
        $_ = [];
        foreach ($labelsKey as $labelKey) {
            $_[] = HelperFlashInit($labelKey);
        }
        App()->request->session()->put('flash', $_);
        App()->request->session()->save();
    }
}

?>