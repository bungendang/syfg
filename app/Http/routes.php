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

Route::group(['domain' => 'admin.syfg.dev'], function () {
    Route::get('/', ['middleware' => 'auth','uses'=>'AdminController@terhahGetAll','as'=>'admin']);
	Route::get('/translate',['as'=>'admin.translate','uses'=>'AdminController@terhahGetAll']);
	Route::get('/terhah/',['as'=>'admin.terhah','uses'=>'AdminController@terhahGetAll']);
	Route::get('/terhah/add','AdminController@terhahGetAdd');
	Route::post('/terhah/add','AdminController@terhahPostAdd');
	Route::get('/edit/th/{id}','AdminController@getEditTerhahId');
	Route::post('/edit/th/{id}','AdminController@postEditTerhahId');
	Route::get('/delete/th/{id}','AdminController@deleteTerhahId');
	Route::get('/delete/id/{id}/{thid}','AdminController@deleteIndonesianId');
	Route::get('/delete/en/{id}/{thid}','AdminController@deleteEnglishId');
	Route::get('/drive','AdminController@drive');
	Route::get('/drive/edit/{id}','AdminController@getDriveEdit');
	Route::post('/drive/edit/{id}','AdminController@postDriveEdit');
	Route::any('/drive/delete/{id}','AdminController@postDriveDelete');
	Route::post('/drive','ApiController@postUploadFile');
	Route::get('/drive/upload',['as'=>'admin.getUploadFile','uses'=>'AdminController@driveGetUpload']);
	Route::post('/drive/upload','AdminController@drivePostUpload');
	Route::get('/api/v1/file',['as'=>'api.listFolder','uses'=>'ApiController@fileAll']);
	Route::get('/api/v1/upload',['as'=>'uploadFile.get','uses'=>'ApiController@getUploadFile']);
	Route::post('/api/v1/upload',['as'=>'uploadFile.post','uses'=>'ApiController@postUploadFile']);
});



Route::group(['domain' => 'syfg.dev'],function(){
	Route::get('/', ['as'=>'th.index', 'uses'=>'TerhahController@index'] );
	Route::get('/terhah-lang', ['as'=>'th.terhah-lang','uses'=>'TerhahController@terhahLang'] );
	Route::get('/works', ['as'=>'th.works', 'uses'=>'TerhahController@works']);
	Route::get('/works/{slug}',['as'=>'th.worksub','uses'=>'TerhahController@worksTitle'] );
	Route::get('/bio',['as'=>'th.bio','uses'=>'TerhahController@bio']);
	Route::get('/publication',['as'=>'th.publication','uses'=>'TerhahController@publication']);
	Route::get('/contact',['as'=>'th.contact','uses'=>'TerhahController@contact']);
	
	Route::group(['prefix'=>'en'],function(){
		Route::get('/', ['as'=>'en.index', 'uses'=>'EnglishController@index'] );
		Route::get('/terhah-lang', ['as'=>'en.terhah-lang','uses'=>'EnglishController@terhahLang'] );
		Route::get('/works', ['as'=>'en.works', 'uses'=>'EnglishController@works']);
		Route::get('/works/{slug}',['as'=>'en.worksub','uses'=>'EnglishController@worksTitle'] );
		Route::get('/bio',['as'=>'en.bio','uses'=>'EnglishController@bio']);
		Route::get('/publication',['as'=>'en.publication','uses'=>'EnglishController@publication']);
		Route::get('/contact',['as'=>'en.contact','uses'=>'EnglishController@contact']);
	});

});

Route::get('/login', ['uses'=>'Auth\AuthController@getLogin','as'=>'login']);
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/logout', 'Auth\AuthController@getLogout');