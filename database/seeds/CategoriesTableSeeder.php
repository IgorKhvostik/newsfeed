<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'music',
        ]);

        Category::create([
            'name'=>'it',
        ]);

        Category::create([
            'name'=>'economics',
        ]);


    }
}
