<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_MONETARY, config('boilerplate.php_locale'));
        setlocale(LC_TIME, config('boilerplate.php_locale'));

        Carbon::setLocale(config('app.locale'));

        Flash::levels([
            'error' => 'danger',
            'success' => 'success',
            'warning' => 'warning',
        ]);
    }
}
