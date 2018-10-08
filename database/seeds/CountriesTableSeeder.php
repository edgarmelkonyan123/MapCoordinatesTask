<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        \DB::table('countries')->delete();

        \DB::table('countries')->insert([
             0 => [
                'id'           => 1,
                'name'         => 'Russia',
            ],
            1 => [
                'id'           => 2,
                'name'         => 'Armenia',
            ],
        ]);
    }
}
