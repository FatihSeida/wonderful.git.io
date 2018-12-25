<?php

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

Auth::routes();

Route::group(["middleware" => "auth"], function(){
	Route::get('/admin', 'PagesController@admin');
	Route::resource('/admin/wisata', 'WisataController');	
	Route::get('/admin/masukan', 'MasukanController@index');
	Route::delete('/admin/masukan/{idMasukan}', 'MasukanController@destroy');
	Route::resource('/admin/{idWisata}', 'VillaController', ['parameters' => ['{idWisata}' => 'idWisata1']]);
});

Route::get('/', 'PagesController@home');

Route::post('/masukan/{idWisata}', 'MasukanController@store');

Route::post('/rating/{idWisata}', 'WisataController@rating');

Route::post('/rating/villa/{idVilla}', 'VillaController@rating');

Route::get('/{slugWisata}', 'PagesController@showWisata');

Route::get('/{slugWisata}/{slugVilla}', 'PagesController@showVilla');