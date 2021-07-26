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
            'description' => "Admin",
        ]);
        DB::table('markets')->insert([
            'name' => "Gran Economas",
            'location' => "Aguas Zarcas",
            'description' => "El punto de venta más grande",
            'picture' => "/img/markets/1523667594.jpg",
        ]);
        DB::table('positions')->insert([
            'name' => "Cajero",
            'description' => "Cajero",
            'payforhour' => 1500,
        ]);
        DB::table('users')->insert([
            'name' => "Admin",
            'phone' => "84388120",
            'role_id' => 1,
            'position_id' => 1,
            'lastname' => "Page",
            'username' => "admin",
            'avatar' => "/img/avatar-1.jpg",
            'password' => bcrypt('123456'),
        ]);
    }
}
