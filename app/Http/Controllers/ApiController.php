<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class SiteController
 *
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{

    /**
     * @body $secret as string
     * @return mixed
     */
    public function enableMaintenanceMode()
    {
        $response = response('Unauthorized', 401);
        if ($this->checkSecret()) {
            HelperUpdatePermanentEnv('MAINTENANCE_MODE', true);
            $response = response('OK', 200);
        }
        return $response->header('Content-Type', 'application/json');
    }

    /**
     * @return boolean
     */
    private function checkSecret()
    {
        $headers = App()->request->headers->all();
        if (isset($headers['secret']) && isset($headers['secret'][0])) {
            if ($headers['secret'][0] === base64_encode(
                    App()['config']['app']['key']
                )
            ) {
                return true;
            }
        }
        return false;
    }

    /**
     * @body $secret as string
     * @return mixed
     */
    public function disableMaintenanceMode()
    {
        $response = response('Unauthorized', 401);
        if ($this->checkSecret()) {
            HelperUpdatePermanentEnv('MAINTENANCE_MODE', false);
            $response = response('OK', 200);
        }
        return $response->header('Content-Type', 'application/json');
    }

}

?>