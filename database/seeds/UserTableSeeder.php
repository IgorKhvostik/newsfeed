<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<6;$i++){
            $name_list=array('retard','kek','Tolya','mannequin','ant', 'jobs');
            User::create(['name' =>$name_list[$i],
                        'password' => bcrypt('123456')]);

        }
    }
}
