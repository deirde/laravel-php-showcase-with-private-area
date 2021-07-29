<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 *
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
//        $api = App()['config']['app']['api_route_prefix'];
        if (!App()->request->is(App()->request->is('api/*'))) {
            if (App()['config']['app']['maintenance_mode']) {
                exit(__('labels.maintenance_mode'));
            }
        }
    }
}

?>