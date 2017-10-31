<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           'cat_name'=>'Sports'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'Fashion'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'Business'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'Technology'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'Games'
        ]);
    }
}
