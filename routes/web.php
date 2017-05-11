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

Route::get('/', 'OrderController@index');

Route::get('/orders', 'OrderController@viewAllOrders');

Route::get('/orders/new', 'OrderController@createNewOrder');

Route::post('/orders/new', 'OrderController@storeNewOrder');

Route::get('/orders/{id}', 'OrderController@show');

Route::get('/orders/edit/{id}', 'OrderController@edit');

Route::post('/orders/edit', 'OrderController@saveEdits');

Route::get('/orders/delete/{id}', 'OrderController@confirmDeletion');

Route::post('/orders/delete', 'OrderController@delete');

if(config('app.env')=='local'){
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}
