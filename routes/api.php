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

//Rutas de auth para el brewery owner.
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

//Rutas de brewery owner.
Route::group(['middleware' => ['auth:api','scope:brewery-owner']], function() {
//Rutas para las Cervecerias.
//ALTA de una cerveceria x brewery owner.
Route::post('breweries','BrewerieController@add')->name('addBreweries');
//Edit de la cerveceria del brewery owner.
Route::post('breweries/{id}','BrewerieController@edit')->name('editBreweries');
//Listado de las cervecerias.
Route::get('breweries','BrewerieController@getAll')->name('getAllBreweries');
Route::get('breweries/{id}','BrewerieController@get')->name('getBreweries');
//--------------------------------------------------------------------------------------------
//Rutas para las Ofertas.
//Alta de oferta de una cerveceria (por el momento numero indeterminado).
Route::post('offers','OfferController@add')->name('addOffer');
//Edit de la oferta seleccionada.
Route::post('offers/{id}','OfferController@edit')->name('editOffer');
//Listado de las ofertas.
Route::get('offers','OfferController@getAll')->name('getAllOffers');
Route::get('offers/{id}','OfferController@get')->name('getOffer');

});

//Rutas de normal User.
Route::group(['middleware' => ['auth:api','scope:normal-user']], function() {
    //Rutas para las Cervecerias.
    //Dar aplauso a una cerveceria.
    Route::post('breweries/{id}','BrewerieController@addClapToBrewery')->name('addClapToBrewery');
    //--------------------------------------------------------------------------------------------
    //Rutas para las Ofertas.
    //Alta de oferta de una cerveceria (por el momento numero indeterminado).
    
    
    });

/*
Route::group(['middleware' => 'auth:api'], function() {
    
    Route::get('breweries','BrewerieController@getAll')->name('getAllBreweries');
    Route::post('breweries','BrewerieController@add')->name('addBreweries');
    Route::get('breweries/{id}','BrewerieController@get')->name('getBreweries');
    Route::post('breweries/{id}','BrewerieController@edit')->name('editBreweries');
    
    //Rutas para las Ofertas.
    
    Route::get('offers','OfferController@getAll')->name('getAllOffers');
    Route::post('offers','OfferController@add')->name('addOffer');
    Route::get('offers/{id}','OfferController@get')->name('getOffer');
    Route::post('offers/{id}','OfferController@edit')->name('editOffer');
    
    });

*/
