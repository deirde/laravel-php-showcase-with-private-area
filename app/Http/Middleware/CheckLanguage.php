<?php
namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

/**
 * Class CheckLanguage
 * @package App\Http\Middleware
 */
class CheckLanguage {

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (array_search(App()->getLocale(), Config()->get('app.langs')) === false) {
            App()->abort(404);
        }
        return $next($request);
    }

}

?>