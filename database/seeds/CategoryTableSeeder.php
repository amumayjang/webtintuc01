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
        		'cate_name' => 'Kinh tế',
        		'slug' => str_slug('Kinh tế')
        	]);
    }
}
