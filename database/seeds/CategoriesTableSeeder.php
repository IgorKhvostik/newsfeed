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
           'cat_name'=>'sports'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'fashion'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'business'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'technology'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'games'
        ]);
    }
}
