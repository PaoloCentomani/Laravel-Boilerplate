<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

if (! function_exists('active')) {
    /**
     * Determine if one of the given route names is active.
     *
     * @param  mixed  $routes
     * @return void
     */
    function active($routes, $class = ' active')
    {
        $current = Route::currentRouteName();
        $routes = Arr::wrap($routes);

        foreach ($routes as $route) {
            if ($route === $current) {
                echo $class;
                break;
            }
        }
    }
}

if (! function_exists('flash')) {
    /**
     * Create a flash message.
     *
     * @param  string|null  $message
     * @return \App\Support\Flash\Notifier
     */
    function flash($message = null)
    {
        $notifier = app('flash');

        if (is_null($message)) {
            return $notifier;
        }

        return $notifier->info($message);
    }
}
