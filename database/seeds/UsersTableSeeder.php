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
        \DB::table('users')->insert([
            'name' => "admin",
            'phone' => "admin",
            'role_id' => 1,
            'position_id' => 1,
            'lastname' => "admin",
            'username' => "admin",
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
