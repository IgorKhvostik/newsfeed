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
        for ($i=0;$i<5;$i++){
            $name_list=array('retard','kek','Tolya','mannequin');
            $sec_name_list=array('ant', 'jobs', 'sos');
            $key_first=array_rand($name_list);
            $key_sec=array_rand($sec_name_list);
            DB::table('users')->insert([
                'first_name' =>$name_list[$key_first],
                'second_name' =>$sec_name_list[$key_sec],
                'password' => bcrypt('secret')]);
        }
    }
}
