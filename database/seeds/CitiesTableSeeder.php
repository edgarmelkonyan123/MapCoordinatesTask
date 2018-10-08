<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        \DB::table('cities')->delete();

        \DB::table('cities')->insert([
             0 => [
                'id'           => 1,
                'country_id'   => 1,
                'name'         => 'Moscow',
                'lng' 	       => '55.7494733',
                'ltd'          => '37.3523209',
            ],
            1 => [
                'id'           => 2,
                'country_id'   => 1,
                'name'         => 'Saint Petersburg',
                'lng' 	       => '59.9171483',
                'ltd'          => '30.0448862',
            ],
            2 => [
                'id'           => 3,
                'country_id'   => 2,
                'name'         => 'Yerevan',
                'lng' 	       => '40.1533693',
                'ltd'          => '44.4185272',
            ],
        ]);
    }
}
