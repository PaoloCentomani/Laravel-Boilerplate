<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * The users to be seeded.
     *
     * @var array
     */
    protected $users = [
        ['first_name' => 'Admin', 'last_name' => 'Boilerplate', 'email' => 'admin@boilerplate.test'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $user) {
            factory(User::class)->create($user);
        }

        if (app()->environment('local')) {
            factory(User::class, 10)->create();
        }
    }
}
