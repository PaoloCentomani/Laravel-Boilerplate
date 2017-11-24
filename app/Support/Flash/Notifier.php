<?php

namespace App\Support\Flash;

use Illuminate\Session\Store as SessionStore;

class Notifier
{
    /**
     * The messages collection.
     *
     * @var \Illuminate\Support\Collection
     */
    public $messages;

    /**
     * The session store.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param  \Illuminate\Session\Store  $session
     * @return void
     */
    public function __construct(SessionStore $session)
    {
        $this->messages = collect();
        $this->session = $session;
    }

    /**
     * Flash an error message.
     *
     * @param  string  $message
     * @return $this
     */
    public function error($message)
    {
        $this->message($message, 'danger');

        return $this;
    }

    /**
     * Add an "important" flag to the last message.
     *
     * @return $this
     */
    public function important()
    {
        return $this->updateLastMessage(['important' => true]);
    }

    /**
     * Flash an information message.
     *
     * @param  string  $message
     * @return $this
     */
    public function info($message)
    {
        $this->message($message, 'info');

        return $this;
    }

    /**
     * Flash a success message.
     *
     * @param  string  $message
     * @return $this
     */
    public function success($message)
    {
        $this->message($message, 'success');

        return $this;
    }

    /**
     * Add a title to the last message.
     *
     * @param  string  $title
     * @return $this
     */
    public function title($title)
    {
        return $this->updateLastMessage(['title' => $title]);
    }

    /**
     * Flash a warning message.
     *
     * @param  string  $message
     * @return $this
     */
    public function warning($message)
    {
        $this->message($message, 'warning');

        return $this;
    }

    /**
     * Clear all registered messages.
     *
     * @return $this
     */
    public function clear()
    {
        $this->messages = collect();

        return $this;
    }

    /**
     * Flash a general message.
     *
     * @param  string  $message
     * @param  string  $level
     * @return $this
     */
    protected function message($message, $level)
    {
        $this->messages->push(new Message([
            'level' => $level,
            'message' => $message,
        ]));

        return $this->flash();
    }

    /**
     * Flash all messages to the session.
     *
     * @return void
     */
    protected function flash()
    {
        $this->session->flash('flash_notification', $this->messages);

        return $this;
    }

    /**
     * Modify the most recently added message.
     *
     * @param  array  $overrides
     * @return $this
     */
    protected function updateLastMessage($overrides = [])
    {
        $this->messages->last()->update($overrides);

        return $this;
    }
}
