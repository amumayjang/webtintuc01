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
                ['id' => 100, 'role_name' => 'Chưa phân loại'],
        		['id' => 300, 'role_name' => 'Thành viên'],
        		['id' => 500, 'role_name' => 'Cộng tác viên'],
        		['id' => 700,  'role_name' => 'Biên tập viên'],
        		['id' => 1000, 'role_name' => 'Quản trị viên'],
        	]
    	);
    }
}
