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
           'cat_name'=>'music'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'it'
        ]);
        DB::table('categories')->insert([
            'cat_name'=>'economics'
        ]);
    }
}
