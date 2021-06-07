<?php

use Illuminate\Support\Str;

if (! function_exists('banner')) {
    /**
     * Show a notification banner.
     *
     * @param  string  $message
     * @param  string  $style
     * @return void
     */
    function banner(string $message, string $style = 'success')
    {
        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', $style);
    }
}

if (! function_exists('excerpt')) {
    /**
     * Show an excerpt for the given text.
     *
     * @param  string  $text
     * @param  int  $length
     * @return string
     */
    function excerpt($text, $length = 90)
    {
        return Str::of($text)->limit($length, '…');
    }
}

if (! function_exists('money')) {
    /**
     * Render a money field.
     *
     * @param  string  $field
     * @return string
     */
    function money($field)
    {
        return (new NumberFormatter(config('settings.php_locale'), NumberFormatter::CURRENCY))
            ->format($field);
    }
}
