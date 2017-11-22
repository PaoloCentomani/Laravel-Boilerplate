<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Paolo Centomani', 'email' => 'paolo@boilerplate.dev'],
        ];

        foreach ($users as $user) {
            $user['password'] = bcrypt('secret');
            $user['remember_token'] = str_random(60);
            $user['created_at'] = '2017-11-22 14:00:00';
            $user['updated_at'] = '2017-11-22 14:00:00';

            DB::table('users')->insert($user);
        }

        if (app()->environment('local')) {
            factory(App\User::class, 10)->create();
        }
    }
}
