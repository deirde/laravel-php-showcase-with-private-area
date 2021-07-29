<?php
namespace App\Services;

/**
 * Class ValidateEmailService
 * @package App\Services
 */
class ValidateEmailService {

    /**
     * @var
     */
    public $CONFIG;

    /**
     * ValidateEmailService constructor.
     */
    public function __construct() {
        $this->CONFIG = App()['config']['services']['validateEmail'];
    }

    /**
     * @param $email
     * @return null
     */
    public static function run($email) {
        $self = new static;
        $ch = @curl_init($self->CONFIG['baseUrl']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            'secret: ' . $self->CONFIG['secret'],
            'email: ' . $email,
            'verify: true',
            'check_mx: true'
        ));
        $response = curl_exec($ch);
        if ($response) {
            $response = json_decode($response);
        }
        curl_close($ch);
        if (isset($response->valid)) {
            return $response->valid;
        } else {
            return NULL;
        }
    }

}

?>
