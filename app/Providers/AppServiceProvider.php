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
        $this->app->singleton('flash', function () {
            return $this->app->make(\App\Support\Flash\Notifier::class);
        });

        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, config('boilerplate.php_locale'));

        Carbon::setLocale(config('app.locale'));

        Flash::levels([
            'error' => 'alert-error',
            'success' => 'alert-success',
            'warning' => 'alert-warning',
        ]);
    }
}
