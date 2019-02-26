<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            ['name' => 'Paolo Centomani', 'email' => 'paolo@boilerplate.test'],
        ];

        foreach ($users as $user) {
            $user['email_verified_at'] = '2019-02-26 14:00:00';
            $user['password'] = Hash::make('secret');
            $user['created_at'] = '2019-02-26 14:00:00';
            $user['updated_at'] = '2019-02-26 14:00:00';

            DB::table('users')->insert($user);
        }

        if (app()->environment('local')) {
            factory(App\User::class, 10)->create();
        }
    }
}
