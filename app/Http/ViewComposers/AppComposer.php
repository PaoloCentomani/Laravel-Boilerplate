<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class AppComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('classes', implode(' ', $this->classes()));
        $view->with('currentUser', Auth::user());
    }

    /**
     * Create an array of CSS classes for the page.
     *
     * @return array
     */
    protected function classes()
    {
        $classes = [Auth::check() ? 'logged-in' : 'guest'];
        $classes = array_merge($classes, explode('.', Route::currentRouteName()));

        return $classes;
    }
}
