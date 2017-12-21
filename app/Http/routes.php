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
    return view('welcome');
});

Route::auth();

route::get('/home', 'homecontroller@index');
route::get('/kitchen', 'KitchenController@index');
route::get('/order', 'OrderController@index');
route::post('/order/submit', 'OrderController@submit');
route::get('/table', 'TableController@index');
