<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas para las Cervecerias.

Route::get('breweries','BrewerieController@getAll')->name('getAllBreweries');

Route::post('breweries','BrewerieController@add')->name('addBreweries');

Route::get('breweries/{id}','BrewerieController@get')->name('getBreweries');

Route::post('breweries/{id}','BrewerieController@edit')->name('editBreweries');

//Rutas para las Ofertas.

Route::get('offers','OfferController@getAll')->name('getAllOffers');
Route::post('offers','OfferController@add')->name('addOffer');
Route::get('offers/{id}','OfferController@get')->name('getOffer');
Route::post('offers/{id}','OfferController@edit')->name('editOffer');
