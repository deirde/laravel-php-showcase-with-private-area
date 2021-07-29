<?php
use App\Http\Middleware\CheckLanguage;
use App\Http\Middleware\CompressOutput;
use App\Http\Middleware\PageCache;
HelperNavSetLocale();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/
Route::middleware([CompressOutput::class])->group(function () {
    Route::middleware([CheckLanguage::class])->group(function () {
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.contact')), 'ContactController@contact');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.login')), 'AccountController@login');
        Route::get(HelperNavRouteUri(__('urls.logout')), 'AccountController@logout');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.recoverPassword')), 'AccountController@recoverPassword');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.resetPassword')) . '/{key}', 'AccountController@resetPassword');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.signUp')), 'AccountController@signUp');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.confirmEmail')) . '/{key}', 'AccountController@confirmEmail');
        Route::get(HelperNavRouteUri(__('urls.account')), 'AccountController@account');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.accountProfile')), 'AccountController@accountProfile');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.accountNotifications')), 'AccountController@accountNotifications');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.accountBilling')), 'AccountController@accountBilling');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.accountSubscriptions')), 'AccountController@accountSubscriptions');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.accountPayments')), 'AccountController@accountPayments');
        Route::match(['get', 'post'], HelperNavRouteUri(__('urls.accountPassword')), 'AccountController@accountPassword');
        Route::middleware(PageCache::class)->group(function () {
            Route::get('/', 'SiteController@index');
            Route::get(HelperNavRouteUri(__('urls.home')), 'SiteController@home');
            Route::get(HelperNavRouteUri(__('urls.blog')), 'SiteController@blog');
            Route::get(HelperNavRouteUri(__('urls.works')), 'SiteController@works');
            Route::get('/{locale}/{slug}', 'SiteController@post');
        });
    });
    Route::get(HelperNavRouteUri(__('urls.accountAppLaunch')) . '/{appName}', 'AccountController@accountAppLaunch');
});

?>