<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * The administrators to be seeded.
     *
     * @var array
     */
    protected $administrators = [
        ['first_name' => 'Admin', 'last_name' => 'Boilerplate', 'email' => 'admin@boilerplate.test'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->administrators as $user) {
            User::factory()->administrator()->create($user);
        }
    }
}
