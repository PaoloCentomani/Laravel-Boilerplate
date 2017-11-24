<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, config('boilerplate.time.locale'));

        \Carbon\Carbon::setLocale(config('app.locale'));
    }

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

        if ($this->app->environment('local')) {
            $this->setupLocalEnvironment();
        }
    }

    /**
     * Configure the development environment.
     *
     * @return void
     */
    protected function setupLocalEnvironment()
    {
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('it_IT');
        });
    }
}
