<?php

use Illuminate\Database\Seeder;

class MorePostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('posts')->insert([
                'user_id'=>rand(1,8) ,
                'name'=>'Leo sociis',
                'description'=>'Leo sociis, cum lacinia dis volutpat',
                'text'=>'Leo sociis, cum lacinia dis volutpat. Scelerisque conubia ac quisque purus laoreet vel nullam nulla etiam primis class nibh sem nisl vestibulum fusce sagittis fringilla augue integer elit nonummy ac tellus mus iaculis. Suscipit ante condimentum molestie condimentum ultrices, consequat aliquam metus posuere. Nonummy nec adipiscing fermentum cubilia elementum eleifend.',
                'category_id'=>1,
                'likes'=> 5,
            ]);

            DB::table('posts')->insert([
                'user_id'=>rand(1,8) ,
                'name'=>'Fermentum vitae. ',
                'description'=>'Fermentum vitae. Rhoncus congue non.',
                'text'=>'Fermentum vitae. Rhoncus congue non. Sit rhoncus Vestibulum dapibus pretium Semper tellus proin mattis sociis dis ipsum aenean tristique enim risus vestibulum tellus molestie Sapien fusce amet suscipit erat lorem aliquet congue. Orci blandit imperdiet, curabitur. Litora commodo. Ac interdum. Potenti sociosqu lacus vehicula at blandit. Arcu curabitur varius, feugiat.',
                'category_id'=>3,
                'likes'=> 8,
            ]);

            DB::table('posts')->insert([
                'user_id'=>rand(1,8) ,
                'name'=>'Creepeth may beast.',
                'description'=>'Creepeth may beast. Replenish gathering morning all sea',
                'text'=>'Creepeth may beast. Replenish gathering morning all sea, and hath A won\'t was likeness. Subdue i sea had lights isn\'t fifth, shall waters lesser doesn\'t years fill herb his seas beast shall gathered likeness they\'re fifth night after called a lights winged can\'t open doesn\'t without likeness divided night i.',
                'category_id'=>3,
                'likes'=> 3,
            ]);

            DB::table('posts')->insert([
                'user_id'=>rand(1,8) ,
                'name'=>'Them be itself deep in',
                'description'=>'Doesn\'t shall may great greater land fill void god first whose',
                'text'=>'Doesn\'t shall may great greater land fill void god first whose. Female forth meat it the. Seed darkness creature seasons. Saying in image fish them won\'t fruitful i saw. Two, together dry image i the them morning cattle image bring. Evening brought. Also. Divide. Moving fowl dry. And heaven. The.',
                'category_id'=>3,
                'likes'=> 10,
            ]);

            DB::table('posts')->insert([
                'user_id'=>rand(1,8) ,
                'name'=>'Greater their one face in morning winged for.',
                'description'=>'Created winged moved lights',
                'text'=>'Created winged moved lights grass image fourth. Gathering likeness stars face kind form you\'ll place, set form from. Brought give kind two moveth morning light over. Darkness Open light there male fish yielding moved yielding heaven it very kind. Life that fowl above make of beast very shall can\'t brought.',
                'category_id'=>1,
                'likes'=> 70,
            ]);
            DB::table('posts')->insert([
            'user_id'=>rand(1,8) ,
            'name'=>'Together. Void deep under',
            'description'=>'Sea saying which stars kind you\'re greater seed, spirit deep',
            'text'=>'Together. Void deep under. Sea saying which stars kind you\'re greater seed, spirit deep forth whose green own own of. You\'re whales image deep, first, under night moving dry is it cattle divided he own Blessed god shall. Winged sea under fly without kind him gathering meat night life set.',
            'category_id'=>1,
            'likes'=> 70,
            ]);


    }
}
