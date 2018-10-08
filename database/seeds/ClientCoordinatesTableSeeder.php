<?php

use Illuminate\Database\Seeder;

class ClientCoordinatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \DB::table('client_coordinates')->delete();

        \DB::table('client_coordinates')->insert([
            0 => [
                'id'           => 1,
                'client_id'    => 1,
                'lng' 	       => '55.7665425',
                'ltd'          => '37.6352492',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            1 => [
                'id'           => 2,
                'client_id'    => 1,
                'lng' 	       => '55.7804406',
                'ltd'          => '37.5176172',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            2 => [
                'id'           => 3,
                'client_id'    => 1,
                'lng' 	       => '55.750805',
                'ltd'          => '37.4394828',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            3 => [
                'id'           => 4,
                'client_id'    => 4,
                'lng' 	       => '59.9036707',
                'ltd'          => '30.3088814',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            4 => [
                'id'           => 5,
                'client_id'    => 4,
                'lng' 	       => '59.8798346',
                'ltd'          => '30.3824852',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            5 => [
                'id'           => 6,
                'client_id'    => 2,
                'lng' 	       => '55.8000042',
                'ltd'          => '37.5598177',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            6 => [
                'id'           => 7,
                'client_id'    => 3,
                'lng' 	       => '55.8026582',
                'ltd'          => '37.5995714',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            7 => [
                'id'           => 8,
                'client_id'    => 5,
                'lng' 	       => '59.9126713',
                'ltd'          => '30.2828544',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            8 => [
                'id'           => 9,
                'client_id'    => 6,
                'lng' 	       => '40.1780917',
                'ltd'          => '44.513689',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            9 => [
                'id'           => 10,
                'client_id'    => 6,
                'lng' 	       => '40.2000917',
                'ltd'          => '44.613689',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
            10 => [
                'id'           => 11,
                'client_id'    => 6,
                'lng' 	       => '40.2050917',
                'ltd'          => '44.518689',
                'created_at'   => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
