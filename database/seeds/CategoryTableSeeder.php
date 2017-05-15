<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        		'cate_name' => 'Chưa được phân loại',
        		'slug_cate' => str_slug('Chưa được phân loại')
                'parent_id' => 0;
        	]);
    }
}
