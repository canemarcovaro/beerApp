<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers')->insert([
            'name' => '2x1',
            'detail' => '2x1 en birra',
            'brewery_id' => '1',
        ]);
        DB::table('offers')->insert([
            'name' => 'happy extendido',
            'detail' => 'happy hour extendido',
            'brewery_id' => '2',
        ]);
        DB::table('offers')->insert([
            'name' => 'Papas gratis',
            'detail' => 'Papas gratis con la consumision de una cerveza',
            'brewery_id' => '3',
        ]);
        DB::table('offers')->insert([
            'name' => 'Promo cumpleaños',
            'detail' => 'Se regala una cerveza al cumpleañero',
            'brewery_id' => '4',
        ]);
        DB::table('offers')->insert([
            'name' => 'Poste 2x1',
            'detail' => '2x1 en todos tipos de postres',
            'brewery_id' => '5',
        ]);
        DB::table('offers')->insert([
            'name' => '2x1',
            'detail' => '2 x1 en birras artesanales',
            'brewery_id' => '6',
        ]);
    }
}
