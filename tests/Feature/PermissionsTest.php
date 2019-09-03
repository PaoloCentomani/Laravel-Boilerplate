<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;

class PermissionsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Role::create(['name' => 'administrator'])
            ->givePermissionTo(
                Permission::create(['name' => 'view backend'])
            );

        Role::create(['name' => 'user']);

        $this->app->make(PermissionRegistrar::class)->registerPermissions();
    }

    /**
     * An administrator can access the admin dashboard.
     *
     * @return void
     */
    public function testAdminCanAccessAdminDashboard()
    {
        $this->signIn(
            factory(User::class)->state('administrator')->create()
        );

        $this->get(route('admin.home'))
             ->assertOk();
    }

    /**
     * An administrator can access the application home.
     *
     * @return void
     */
    public function testAdminCanAccessHome()
    {
        $this->signIn(
            factory(User::class)->state('administrator')->create()
        );

        $this->get(route('home'))
             ->assertOk();
    }

    /**
     * A user can access the application home.
     *
     * @return void
     */
    public function testUserCanAccessHome()
    {
        $this->signIn(
            factory(User::class)->state('user')->create()
        );

        $this->get(route('home'))
             ->assertOk();
    }

    /**
     * A user must login to access the admin dashboard.
     *
     * @return void
     */
    public function testUserMustLoginToAccessAdminDashboard()
    {
        $this->get(route('admin.home'))
             ->assertRedirect(route('login'));
    }

    /**
     * A user cannot access the admin dashboard.
     *
     * @return void
     */
    public function testUserCannotAccessAdminDashboard()
    {
        $this->signIn(
            factory(User::class)->state('user')->create()
        );

        $this->get(route('admin.home'))
             ->assertForbidden();
    }
}
