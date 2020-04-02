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

//Rutas de auth.
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');   
    Route::post('sociallogin', 'AuthController@socialLogin');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        
    });
});

//Rutas de brewery owner.
Route::group(['middleware' => ['auth:api','scope:brewery-owner']], function() {

Route::resource('photo','PhotoController');
Route::get('images','PhotoController@index')->name('getAllImages');
//Rutas para las Cervecerias.
//ALTA de una cerveceria x brewery owner.
Route::post('breweries','BrewerieController@add')->name('addBreweries');
//Edit de la cerveceria del brewery owner.
Route::post('breweries/{id}','BrewerieController@edit')->name('editBreweries');

//Rutas para las Ofertas.
//Alta de oferta de una cerveceria (por el momento numero indeterminado).
Route::post('offers','OfferController@add')->name('addOffer');
//Edit de la oferta seleccionada.
Route::post('offers/{id}','OfferController@edit')->name('editOffer');
//Delete de oferta eliminada.
Route::delete('offers/{id}','OfferController@deleteOffer')->name('deleteOffer');
//Listado de las ofertas.
Route::get('offers','OfferController@getAll')->name('getAllOffers');
Route::get('offers/{id}','OfferController@get')->name('getOffer');

});

//Rutas de normal User.
Route::group(['middleware' => ['auth:api','scope:normal-user']], function() {
    //Rutas para las Cervecerias.
    //Dar aplauso a una cerveceria.
    Route::post('breweriesclap','BrewerieController@addClapToBrewery')->name('addClapToBrewery');
    Route::delete('breweriesclap/{id}','BrewerieController@deleteClapToBrewery')->name('deleteClapToBrewery');
    //--------------------------------------------------------------------------------------------
    //Rutas para las Ofertas.
    //Alta de oferta de una cerveceria (por el momento numero indeterminado).
    
    
    });



//Rutas de usuario sin rol. 
//Listado de todas las cervecerias.
Route::get('breweries','BrewerieController@getAll')->name('getAllBreweries');
Route::get('bestbreweries','BrewerieController@getBestBre weries')->name('getBestBreweries');
//Cerveceria por id.
Route::get('breweries/{id}','BrewerieController@get')->name('getBreweries');

Route::get('offersByBrewery/{id}','OfferController@getOffersByBrewery')->name('getAllOffersByBrewery');

