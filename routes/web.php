<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/registro', function () {
    return view('partials.content.buyer_form');
  })->name('registro');

/**
 * Rutas para el vendedor
 */
Route::group(['prefix' => 'seller', 'as' => 'seller.', 'middleware' => ['seller']], function(){
  Route::get('/', 'SellerController@index')->name('index');
  Route::get('/create', 'ProductController@create')->name('create');
  Route::post('/store', 'ProductController@store')->name('store'); 
  Route::put('/update', 'ProductController@update')->name('update');
});

// esta ruta da error si la pongo dentro del grupo de rutas del vendedor.
Route::get('/edit/{product}', 'ProductController@edit')->name('seller.edit');

/**
 * Rutas Comprador
 */
Route::group(['prefix' => 'buyer', 'as' => 'buyer.', 'middleware' => ['auth']], function(){
  Route::get('/', 'BuyerController@index')->name('index');
});

Auth::routes();
