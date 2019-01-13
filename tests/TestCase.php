<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Sign in the user.
     *
     * @param  \App\User  $user
     * @return $this
     */
    protected function signIn(User $user = null)
    {
        return $this->actingAs($user ?? factory(User::class)->create());
    }
}
