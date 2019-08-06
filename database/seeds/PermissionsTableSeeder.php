<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsTableSeeder extends Seeder
{
    /**
     * The permissions grouped by role.
     *
     * @var array
     */
    protected $permissions = [
        'administrator' => [
            'view backend',
        ],

        'user' => [
            //
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'super administrator']);

        foreach ($this->permissions as $role => $permissions) {
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }

            Role::create(['name' => $role])
                ->givePermissionTo($permissions);
        }

        User::first()->assignRole('super administrator');
        User::all()->each->assignRole('user');
    }
}
