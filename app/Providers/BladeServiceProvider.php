<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('widget', function ($expression) {
            $name = trim($expression, "'");

            return "<?php echo resolve('App\Http\View\Widgets\\{$name}')->view(); ?>";
        });

        Blade::directive('svg', function ($expression) {
            return  "<?php echo svg($expression); ?>";
        });
    }
}
