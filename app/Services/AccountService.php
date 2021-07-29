<?php
namespace App\Services;
use Illuminate\Http\Request;

/**
 * Class AccountService
 * @package App\Services
 */
class AccountService {

    /**
     * @var array
     */
    private $CONFIG = array();

    /**
     * AccountService constructor.
     */
    public function __construct() {
        $this->CONFIG = [
            'signUp' => App()['config']['services']['accountSignUp'],
            'activate' => App()['config']['services']['accountActivate'],
            'authenticate' => App()['config']['services']['accountAuthenticate'],
            'authorize' => App()['config']['services']['accountAuthorize'],
            'isValid' => App()['config']['services']['accountIsValid'],
            'resetPassword' => App()['config']['services']['accountResetPassword'],
            'ottGenerate' => App()['config']['services']['accountOttGenerate'],
            'appLaunch' => App()['config']['services']['accountAppLaunch'],
            'getRegistry' => App()['config']['services']['accountGetRegistry'],
            'updateRegistry' => App()['config']['services']['accountUpdateRegistry'],
            'getStripeId' => App()['config']['services']['accountGetStripeId'],
            'setStripeId' => App()['config']['services']['accountSetStripeId'],
            'updatePassword' => App()['config']['services']['accountUpdatePassword'],
            'logout' => App()['config']['services']['accountLogout']
        ];
        $this->CONFIG = array_merge(array(
            'baseSettings' => App()['config']['services']['baseSettings']),
            $this->CONFIG
        );
    }

    /**
     * @param $email
     * @param $password
     * @return bool|null
     */
    public static function login($email, $password) {
        if (HelperAccountIsLogged()) {
            return true;
        } else {
            $self = new static;
            return $self->authenticate($email, $password);
        }
    }

    /**
     * @param $email
     * @param $password
     * @return bool|null
     */
    private function authenticate($email, $password) {
        //$self = new static;
        $ch = @curl_init($this->CONFIG['authenticate']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $this->CONFIG['baseSettings']['contentType'],
            'secret: ' . $this->CONFIG['authenticate']['secret'],
            'email: ' . $email,
            'password: ' . $password,
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response) || !isset($response->status)) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            HelperAccountPutAuthSession($email, $password, $response->token);
            //HelperAccountSetStripeId($self->getStripeId()->stripe_id);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param bool $retry
     * @return bool|null
     */
    public static function authorize($retry = true) {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['authorize']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'email: ' . HelperAccountGetEmail(),
            'token: ' . HelperAccountGetToken()
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response)) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            return true;
        } else if ($retry) {
            if ($self->authenticate(HelperAccountGetEmail(), HelperAccountGetPassword())) {
                if ($self->authorize(false)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param $email
     * @param $password
     * @return bool|mixed|null
     */
    public static function signUp($email, $password) {
        if (HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['signUp']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['signUp']['secret'],
            'email: ' . $email,
            'password: ' . $password
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response) || isset($response) && !$response) {
            return NULL;
        } else if (isset($response->status)  && $response->status === 200) {
            return $response;
        } else {
            return false;
        }
    }

    /**
     * @param $key
     * @return bool|null
     */
    public static function activate($key) {
        if (HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['activate']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'key: ' . $key
        ]);
        $response = curl_exec($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response) || isset($response) && !$response) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $email
     * @return bool|mixed|null
     */
    public static function isValid($email) {
        if (HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['isValid']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'email: ' . $email
        ]);
        $response = curl_exec($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response) || isset($response) && !$response) {
            return NULL;
        } else if (isset($response->status)) {
            if ($response->status === 200 && isset($response->key)) {
                return $response;
            } else {
                return NULL;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $key
     * @return bool|mixed|null
     */
    public static function resetPassword($key) {
        if (HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['resetPassword']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'key: ' . $key
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response) || isset($response) && !$response) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            if (isset($response->password)) {
                return $response;
            } else {
                return NULL;
            }
        } else {
            return false;
        }
    }

    /**
     * It retrieves the ott token containing the user identity
     * It is needed to authenticate the user in external apps
     *
     * @param bool $retry
     * @return bool|mixed|null
     */
    public static function appLaunch($retry = true) {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['ottGenerate']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'email: ' . HelperAccountGetEmail(),
            'password: ' . HelperAccountGetPassword(),
            'token: ' . HelperAccountGetToken()
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response) || isset($response) && !$response) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            $response->appLaunch = $self->CONFIG['appLaunch'];
            return $response;
        } else if ($retry) {
            if ($self->authenticate(HelperAccountGetEmail(), HelperAccountGetPassword())) {
                return $self->appLaunch(false);
            } else {
                return NULL;
            }
        }
        return false;
    }

    /**
     * @param bool $retry
     * @return bool|mixed|null
     */
    public static function getRegistry($retry = true) {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['getRegistry']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'email: ' . HelperAccountGetEmail(),
            'token: ' . HelperAccountGetToken(),
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response) || isset($response) && !$response) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            return $response;
        } else if ($retry) {
            if ($self->authenticate(HelperAccountGetEmail(), HelperAccountGetPassword())) {
                return $self->getRegistry(false);
            } else {
                return NULL;
            }
        }
        return false;
    }

    /**
     * @param array $attrs
     * @param bool $retry
     * @return bool|mixed|null
     */
    public static function updateRegistry($attrs = array(), $retry = true) {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['updateRegistry']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        $_params = [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'email: ' . HelperAccountGetEmail(),
            'token: ' . HelperAccountGetToken()
        ];
        foreach (['name', 'bio', 'url', 'company', 'location', 'opt_in_email'] as $attr) {
            if (isset($attrs[$attr])) {
                $_params[] = $attr . ': ' . $attrs[$attr];
            }
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $_params);
        $response = curl_exec($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response) || isset($response) && !$response) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            return $response;
        } else if ($retry) {
            if ($self->authenticate(HelperAccountGetEmail(), HelperAccountGetPassword())) {
                return $self->updateRegistry($attrs, false);
            } else {
                return NULL;
            }
        }
        return false;
    }

    /**
     * @param bool $retry
     * @return bool|mixed|null
     */
    public static function getStripeId($retry = true) {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        if (HelperAccountGetStripeId()) {
            return HelperAccountGetStripeId();
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['getStripeId']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'email: ' . HelperAccountGetEmail(),
            'token: ' . HelperAccountGetToken()
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response)) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200 && isset($response->stripe_id)) {
            HelperAccountSetStripeId($response->stripe_id);
            return $response->stripe_id;
        } else if ($retry) {
            if ($self->authenticate(HelperAccountGetEmail(), HelperAccountGetPassword())) {
                if ($self->getStripeId(false)) {
                    return $response;
                }
            }
        }
        return false;
    }

    /**
     * @param $stripe_id
     * @param bool $retry
     * @return bool|mixed|null
     */
    public static function setStripeId($stripe_id, $retry = true) {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        if (HelperAccountGetStripeId()) {
            return true;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['setStripeId']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'email: ' . HelperAccountGetEmail(),
            'token: ' . HelperAccountGetToken(),
            'stripe_id: ' . $stripe_id
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response)) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            HelperAccountSetStripeId($self->getStripeId());
            return true;
        } else if ($retry) {
            if ($self->authenticate(HelperAccountGetEmail(), HelperAccountGetPassword())) {
                if ($self->setStripeId($stripe_id, false)) {
                    return $response;
                }
            }
        }
        return false;
    }

    /**
     * @param array $attrs
     * @param bool $retry
     * @return bool|mixed|null
     */
    public static function updatePassword($oldPassword, $newPassword, $retry = true) {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['updatePassword']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'email: ' . HelperAccountGetEmail(),
            'token: ' . HelperAccountGetToken(),
            'old_password:' . $oldPassword,
            'new_password:' . $newPassword
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response)) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            return true;
        } else if ($retry) {
            if ($self->authenticate(HelperAccountGetEmail(), HelperAccountGetPassword())) {
                if ($self->updatePassword($oldPassword, $newPassword, false)) {
                    return $response;
                }
            }
        }
        return false;
    }

    /**
     * @param bool $retry
     * @return bool|mixed|null
     */
    public static function logout($retry = true) {
        if (!HelperAccountIsLogged()) {
            return false;
        }
        $self = new static;
        $ch = @curl_init($self->CONFIG['logout']['baseUrl']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $self->CONFIG['baseSettings']['userAgent']);
        $_params = [
            'Content-Type: ' . $self->CONFIG['baseSettings']['contentType'],
            'secret: ' . $self->CONFIG['authenticate']['secret'],
            'email: ' . HelperAccountGetEmail(),
            'token: ' . HelperAccountGetToken()
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $_params);
        $response = curl_exec($ch);
        if ($response) {
            $response = json_decode($response);
        }
        if (!isset($response) || isset($response) && !$response) {
            return NULL;
        } else if (isset($response->status) && $response->status === 200) {
            return $response;
        } else if ($retry) {
            if ($self->authenticate(HelperAccountGetEmail(), HelperAccountGetPassword())) {
                return $self->logout(false);
            } else {
                return NULL;
            }
        }
        return false;
    }

}

?>