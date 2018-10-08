<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        \DB::table('clients')->delete();

        \DB::table('clients')->insert([
            0 => [
                'id'           => 1,
                'city_id'      => 1,
                'FIO'          => 'User_1',
                'email' 	   => 'a@gmail.com',
                'phone'        => '111111',
            ],
            1 => [
                'id'           => 2,
                'city_id'      => 1,
                'FIO'          => 'User_2',
                'email' 	   => 'b@gmail.com',
                'phone'        => '222222',
            ],
            2 => [
                'id'           => 3,
                'city_id'      => 1,
                'FIO'          => 'User_3',
                'email' 	   => 'c@gmail.com',
                'phone'        => '333333',
            ],
            3 => [
                'id'           => 4,
                'city_id'      => 2,
                'FIO'          => 'User_4',
                'email' 	   => 'd@gmail.com',
                'phone'        => '444444',
            ],
            4 => [
                'id'           => 5,
                'city_id'      => 2,
                'FIO'          => 'User_5',
                'email' 	   => 'e@gmail.com',
                'phone'        => '555555',
            ],
            5 => [
                'id'           => 6,
                'city_id'      => 3,
                'FIO'          => 'User_6',
                'email' 	   => 'f@gmail.com',
                'phone'        => '666666',
            ],
        ]);
    }
}
