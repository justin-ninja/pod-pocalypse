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

Route::get('/', 'DashboardController@dashboard');
Route::get('/admin', 'AdminController@dashboard');
Route::post('/pod/type/create', "PodController@podTypeCreate");
Route::post('/pod/create', "PodController@podCreate");
Route::post('/pod/update/{pod}', "PodController@podUpdate");
Route::get('/pod/buy/{pod}', 'PodController@podBuy');


Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/account/pay/{user}', 'UserAccountController@pay');
