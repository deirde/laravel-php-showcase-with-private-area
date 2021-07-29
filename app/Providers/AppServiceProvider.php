<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

/**********************************************************************/
class AppServiceProvider extends ServiceProvider {

    /**********************************************************************/
    public function boot() {
        view()->composer('*', function($view){
            $view_name = str_replace('.', '-', $view->getName());
            view()->share('view_name', $view_name);
        });
    }

    /**********************************************************************/
    public function register() {}
    
}

?>
