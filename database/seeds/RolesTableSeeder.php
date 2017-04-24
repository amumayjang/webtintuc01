<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
        	[
        		['role_name' => 'Thành viên'],
        		['role_name' => 'Cộng tác viên'],
        		['role_name' => 'Biên tập viên'],
        		['role_name' => 'Quản trị viên'],
        	]
    	);
    }
}
