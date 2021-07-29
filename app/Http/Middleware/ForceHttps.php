<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

/**
 * Class ForceHttps
 * @package App\Http\Middleware
 */
class ForceHttps {

    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next) {
        Request::setTrustedProxies([$request->getClientIp()]);
        if (!$request->isSecure()) {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }
}

?>