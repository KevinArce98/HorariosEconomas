<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->insert([
            'name' => "admin",
            'description' => "admin",
        ]);
        DB::table('positions')->insert([
            'name' => "cajero",
            'description' => "cajero",
            'payforhour' => 1500,
        ]);
        DB::table('users')->insert([
            'name' => "admin",
            'phone' => "admin",
            'role_id' => 1,
            'position_id' => 1,
            'lastname' => "admin",
            'username' => "admin",
            'avatar' => "https://s25.postimg.org/4dmmf6rkv/avatar_blanco.png",
            'password' => bcrypt('123456'),
        ]);
    }
}