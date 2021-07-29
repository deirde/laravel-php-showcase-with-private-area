<?php
namespace App\Services;

/**
 * Class SendEmailService
 * @package App\Services
 */
class SendEmailService {

    /**
     * @var
     */
    public $CONFIG;

    /**
     * @var array
     */
    public $DEFAULT_HEADERS;

    /**
     * SendEmailService constructor.
     */
    public function __construct() {
        $this->CONFIG = App()['config']['services']['sendEmail'];
        $this->DEFAULT_HEADERS = [
            'Content-Type: application/x-www-form-urlencoded',
            'secret: ' . $this->CONFIG['secret'],
            'smtp_host: ' . $this->CONFIG['smtp_host'],
            'smtp_pwd: ' . $this->CONFIG['smtp_pwd'],
            'from_addr: ' . $this->CONFIG['from_addr'],
        ];
    }

    /**
     * @param $to_addrs
     * @param $subject
     * @param $body_html
     * @param null $body_plain
     * @return bool|null
     */
    public static function run($to_addrs, $subject, $body_html, $body_plain = NULL) {
        $self = new static;
        $ch = @curl_init($self->CONFIG['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['userAgent']);
        $body_html = preg_replace('/[\x0D]/', '', nl2br($body_html));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded',
            'secret: ' . $self->CONFIG['secret'],
            'campaign_name: ' . $self->CONFIG['campaign_name'],
            'smtp_host: ' . $self->CONFIG['smtp_host'],
            'smtp_uid: ' . $self->CONFIG['smtp_uid'],
            'smtp_pwd: ' . $self->CONFIG['smtp_pwd'],
            'from_addr: ' . $self->CONFIG['from_addr'],
            'to_addrs: ' . $to_addrs,
            'subject: ' . $subject,
            'body_html: ' . $body_html,
            'body_plain: ' . $body_plain
        ]);
        $response = curl_exec($ch);
        if ($response) {
            $response = json_decode($response);
        }
        curl_close($ch);
        if (!isset($response)) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            return true;
        } else {
            return false;
        }
    }

}

?>