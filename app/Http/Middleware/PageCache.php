<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Cache;

/**
 * Class PageCache
 * @package App\Http\Middleware
 */
class PageCache {

    /**
     * @param $request
     * @param $next
     * @return mixed
     */
    public function handle($request, $next) {
        $app = App();
        $fragment = $request->url();
        if (isset($app['config']['cache.active']) &&
            $app['config']['cache.active'] === false) {
            Cache::forget($fragment);
        } else {
            if (Cache::has($fragment)) {
                return response(Cache::get($fragment));
            }
        }
        return $next($request);
    }

    /**
     * @param $request
     * @param $response
     */
    public function terminate($request, $response) {
        $app = App();
        if ($app['config']['cache.active'] === true) {
            $fragment = $request->url();
            Cache::put($fragment, $response->getContent(), 3600);
        }
    }

}

?>