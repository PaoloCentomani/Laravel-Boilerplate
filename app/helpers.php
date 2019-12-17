<?php

use Illuminate\Support\Facades\Request;

if (! function_exists('active')) {
    /**
     * Determine if one of the given route names is active.
     *
     * @param  mixed  $routes
     * @return string
     */
    function active($routes)
    {
        return Request::routeIs($routes) ? ' active' : '';
    }
}

if (! function_exists('money_field')) {
    /**
     * Render a money field.
     *
     * @param  string  $field
     * @return string
     */
    function money_field($field)
    {
        return (new NumberFormatter(config('boilerplate.php_locale'), NumberFormatter::CURRENCY))->format($field);
    }
}

if (! function_exists('optional_field')) {
    /**
     * Render an optional field that might be null.
     *
     * @param  string  $field
     * @param  string|null  $output
     * @return string
     */
    function optional_field($field, $output = null)
    {
        if (! $field) {
            return '―';
        }

        return $output ?: $field;
    }
}

if (! function_exists('svg')) {
    /**
     * Render an SVG file.
     *
     * @param  string  $name
     * @param  string|null  $title
     * @param  string|null  $class
     * @return string
     */
    function svg($name, $title = '', $class = '')
    {
        $output = file_get_contents(resource_path("svg/{$name}.svg"));

        if ($title) {
            $output = str_replace('</svg>', "<title>{$title}</title></svg>", $output);
        }

        if ($class) {
            $output = str_replace('<svg', "<svg class=\"{$class}\"", $output);
        }

        return $output;
    }
}
