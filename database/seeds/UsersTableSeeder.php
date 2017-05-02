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
        DB::table('users')->insert([
        		'name' => 'Le Huu Truong', 
        		'email' => 'admin@gmail.com',
        		'password' => '123456',
        		'role_id' => 1
        	]);
    }
}
