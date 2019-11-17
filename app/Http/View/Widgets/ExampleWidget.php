<?php

namespace App\Http\View\Widgets;

class ExampleWidget extends Widget
{
    /**
     * The widget title.
     *
     * @var string
     */
    public $title = 'Example Widget';

    /**
     * Sample widget content.
     *
     * @return array
     */
    public function articles()
    {
        return [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        ];
    }
}
