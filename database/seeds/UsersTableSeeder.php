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
        //
        DB::table('users')->insert([
            'name' => "Jean Paul CaMi Byiringiro",
            'email' => 'admin@gmail.com',
            'user_name' => 'admin@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('password'),
        ]);
    }
}
