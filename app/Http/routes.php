<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('th/home');
});


Route::group(['prefix'=>'en'],function(){
	Route::get('/', ['as'=>'en.index', 'uses'=>'EnglishController@index'] );
	Route::get('/terhah-lang', ['as'=>'en.terhah-lang','uses'=>'EnglishController@terhahLang'] );
	Route::get('/works', ['as'=>'en.works', 'uses'=>'EnglishController@works']);
	Route::get('/works/{slug}',['as'=>'en.worksub','uses'=>'EnglishController@worksTitle'] );
	Route::get('/bio',['as'=>'en.bio','uses'=>'EnglishController@bio']);
	Route::get('/publication',['as'=>'en.publication','uses'=>'EnglishController@publication']);
	Route::get('/contact',['as'=>'en.contact','uses'=>'EnglishController@contact']);
});

Route::group(['prefix'=>'admin'], function(){
	Route::get('/', ['middleware' => 'auth','uses'=>'AdminController@index','as'=>'admin']);
	Route::get('/translate','AdminController@translate');
	Route::get('/drive','AdminController@drive');
});

Route::get('/login', ['uses'=>'Auth\AuthController@getLogin','as'=>'login']);
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/logout', 'Auth\AuthController@getLogout');