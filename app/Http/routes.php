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
	Route::get('/', function () {
	    return view('en/home');
	});
	Route::get('/terhah-lang', function () {
	    return view('en/terhah-lang');
	});
});