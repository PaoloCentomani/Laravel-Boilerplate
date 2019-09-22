<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Google Analytics
    |--------------------------------------------------------------------------
    |
    | Configure here your Google Analytics tracking code.
    |
    */

    'analytics_id' => env('ANALYTICS_ID'),

    /*
    |--------------------------------------------------------------------------
    | PHP Locale
    |--------------------------------------------------------------------------
    |
    | The PHP locale determines the locale that will be used by PHP.
    |
    */

    'php_locale' => 'it_IT.UTF-8',

    /*
    |--------------------------------------------------------------------------
    | Time
    |--------------------------------------------------------------------------
    |
    | Here you may configure the parameters related to time.
    |
    */

    'time' => [

        'default' => 'd/m/Y H:i',

        'day' => 'd/m/Y',
        'hour' => 'H:i',

    ],

    /*
    |--------------------------------------------------------------------------
    | Version
    |--------------------------------------------------------------------------
    |
    | Here you can configure the application version number.
    |
    */

    'version' => '1.0.0',

];
