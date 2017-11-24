<?php

namespace App\Support\Flash;

class Message
{
    /**
     * The title of the message.
     *
     * @var string
     */
    public $title;

    /**
     * The body of the message.
     *
     * @var string
     */
    public $message;

    /**
     * The message level.
     *
     * @var string
     */
     public $level = 'info';

    /**
     * Whether the message should be dismissable.
     *
     * @var bool
     */
    public $important = false;

    /**
     * Create a new message instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct($attributes = [])
    {
        $this->update($attributes);
    }

    /**
     * Update the attributes.
     *
     * @param  array $attributes
     * @return $this
     */
    public function update($attributes = [])
    {
        $attributes = array_filter($attributes);

        foreach ($attributes as $key => $attribute) {
            $this->$key = $attribute;
        }

        return $this;
    }
}
