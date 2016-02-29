<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layouts.site');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/admin', 'AdminController@index');
    Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {

            Route::get('/shopinfo','ShopinfoController@index');
            Route::put('/shopinfo','ShopinfoController@update');

 			Route::resource('rates', 'RatesController',
 			        ['only' => ['index','store','destroy']]);
 			Route::post('/rates/{id}','RatesController@update');

 			//Log
            Route::get('/log','LogController@index');
            //Girls
            Route::get('/girls/role','GirlRoleController@index');
            Route::post('/girls/role','GirlRoleController@store');
            Route::delete('/girls/role/{id}','GirlRoleController@destroy');

            Route::get('/girls/roster','GirlRosterController@index');
            Route::get('/girls/photo','GirlPhotoController@index');



    });
});
