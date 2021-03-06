<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * The permissions to be seeded.
     *
     * @var array
     */
    protected $permissions = [
        //
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'Administrator']);

        foreach ($this->permissions as $role => $permissions) {
            foreach ($permissions as $permission) {
                Permission::findOrCreate($permission);
            }

            Role::create(['name' => $role])
                ->givePermissionTo($permissions);
        }
    }
}
