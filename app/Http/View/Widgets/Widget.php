<?php

namespace App\Http\View\Widgets;

use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;
use Illuminate\Support\Str;

abstract class Widget
{
    /**
     * Load the view with the necessary data.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return $this->buildView()->with($this->buildViewData());
    }

    /**
     * Build the view for the widget.
     *
     * @return \Illuminate\View\View
     */
    protected function buildView()
    {
        $name = Str::kebab(class_basename($this));

        return view("widgets.{$name}");
    }

    /**
     * Build the view data.
     *
     * @throws \ReflectionException
     * @return array
     */
    protected function buildViewData()
    {
        $viewData = [];

        foreach ((new ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $viewData[$property->getName()] = $property->getValue($this);
        }

        foreach ((new ReflectionClass($this))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if (($name = $method->getName()) !== 'view') {
                $viewData[$name] = $this->$name();
            }
        }

        return $viewData;
    }
}
