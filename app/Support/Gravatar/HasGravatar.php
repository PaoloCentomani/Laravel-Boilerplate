<?php

namespace App\Support\Gravatar;

trait HasGravatar
{
    /**
     * Get the gravatar.
     *
     * @return string
     */
    public function getGravatarAttribute()
    {
        $email = strtolower($this->email);

        return 'https://www.gravatar.com/avatar/' . md5($email) . '?s=256&d=retro';
    }
}
