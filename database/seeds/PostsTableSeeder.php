<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<5;$i++){
        DB::table('posts')->insert([
            'user_id'=>rand(1,4) ,
            'name'=>'Greater their one face in morning winged for.',
            'description'=>'Them be itself deep in, you\'re, moved sixth. Brought creepeth, thing moved have fowl for make you\'ll subdue years replenish.',
            'text'=>'Greater their one face in morning winged for. Dominion Seasons which land own. In Moving have seasons gathered land living was own replenish there creeping yielding third unto creeping created appear won\'t. Male them beast fish so. Have made day.',
            'category_id'=>2,
            'likes'=> 10,
            'picture'=>'images/2517-1.jpg',
            'created_at'=>now()
        ]);
        }
    }
}
