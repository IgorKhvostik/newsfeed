<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<7;$i++){
            $name_list=array('retard','kek','Tolya','mannequin','ant', 'jobs', 'sos');
            DB::table('users')->insert([
                'userName' =>$name_list[$i],

                'password' => bcrypt('123456')]);
        }
    }
}
