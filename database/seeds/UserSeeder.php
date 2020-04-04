<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * The super administrators to be seeded.
     *
     * @var array
     */
    protected $superAdministrators = [
        ['first_name' => 'Admin', 'last_name' => 'Boilerplate', 'email' => 'admin@boilerplate.test'],
    ];

    /**
     * The administrators to be seeded.
     *
     * @var array
     */
    protected $administrators = [
        //
    ];

    /**
     * The users to be seeded.
     *
     * @var array
     */
    protected $users = [
        //
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->superAdministrators as $user) {
            factory(User::class)->state('super administrator')->create($user);
        }

        foreach ($this->administrators as $user) {
            factory(User::class)->state('administrator')->create($user);
        }

        foreach ($this->users as $user) {
            factory(User::class)->state('user')->create($user);
        }

        if (app()->environment('local')) {
            factory(User::class, 15)->state('user')->create();
        }
    }
}
