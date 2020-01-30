<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrewerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breweries')->insert([
            'name' => 'Porter',
            'claps' => '14',
        ]);
        DB::table('breweries')->insert([
            'name' => 'Tbc',
            'claps' => '10',
        ]);
        DB::table('breweries')->insert([
            'name' => 'Antares',
            'claps' => '23',
        ]);
        DB::table('breweries')->insert([
            'name' => 'Rocson',
            'claps' => '3',
        ]);
        DB::table('breweries')->insert([
            'name' => 'La calle Cerveceria',
            'claps' => '2',
        ]);
        DB::table('breweries')->insert([
            'name' => 'Rufino Boris',
            'claps' => '14',
        ]);
    }
}
