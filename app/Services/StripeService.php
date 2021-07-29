<?php
namespace App\Services;
use Illuminate\Http\Request;

/**
 * Class StripeService
 * @package App\Services
 */
class StripeService {

    /**
     * @var array
     */
    private $CONFIG = array();

    /**
     * StripeService constructor.
     */
    public function __construct() {
        $this->CONFIG = [
            'key' => App()['config']['services']['stripe']['key'],
            'secret' => App()['config']['services']['stripe']['secret'],
            'baseUrl' =>  App()['config']['services']['stripe']['baseUrl'],
            'createCustomerEndpoint' => App()['config']['services']['stripe']['customerEndpoint'],
            'createChargesEndpoint' => App()['config']['services']['stripe']['createChargesEndpoint'],
            'createInvoicesEndpoint' => App()['config']['services']['stripe']['createInvoicesEndpoint'],
        ];
        $this->CONFIG = array_merge(array(
            'baseSettings' => App()['config']['services']['baseSettings']),
            $this->CONFIG
        );
    }
    
    /**
     * @return bool|mixed|null
     */
    public static function createCustomer() {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['baseUrl'] . $self->CONFIG['createCustomerEndpoint']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "email=" . HelperAccountGetEmail() . "&description=");
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $self->CONFIG['secret']
        ]);
        $response = curl_exec($ch);
        if ($response) $response = json_decode($response);
        if (!isset($response)) {
            return NULL;
        } else if (isset($response->id)) {
            return $response;
        } else {
            return false;
        }
    }

    /**
     * @return bool|mixed|null
     */
    public static function getCustomer() {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['baseUrl'] . $self->CONFIG['createCustomerEndpoint'] . 
            '/' . AccountService::getStripeId());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $self->CONFIG['secret']
        ]);
        $response = curl_exec($ch);
        if ($response) $response = json_decode($response);
        if (!isset($response)) {
            return NULL;
        } else if (isset($response->id)) {
            return $response;
        } else {
            return false;
        }
    }

    /**
     * @TODO
     * @return bool|mixed|null
     */
    public static function getInvoicesByCustomer() {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['baseUrl'] . $self->CONFIG['createInvoicesEndpoint'] . 
            '?customer=' . AccountService::getStripeId());
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $self->CONFIG['secret'],
        ]);
        $response = curl_exec($ch);
        if ($response) $response = json_decode($response);
        if (!isset($response)) {
            return NULL;
        } else if (isset($response->data)) {
            return $response->data;
        } else {
            return false;
        }
    }
    
    /**
     * @TODO
     * @return bool|mixed|null
     */
    public static function getChargesByCustomer() {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['baseUrl'] . $self->CONFIG['createChargesEndpoint'] . 
            '?customer=' . AccountService::getStripeId());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $self->CONFIG['secret'],
        ]);
        $response = curl_exec($ch);
        if ($response) $response = json_decode($response);
        if (!isset($response)) {
            return NULL;
        } else if (isset($response->data)) {
            return $response->data;
        } else {
            return false;
        }
    }

    /**
     * @TODO
     * @return bool|mixed|null
     */
    public static function getSubscriptionsByCustomer() {
        if (!HelperAccountIsLogged()) {
            return false;
        }
    }

}

?>