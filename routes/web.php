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

Route::resource('customers', 'CustomersController');
//Route::get('/customers', 'CustomersController@index');
//Route::get('/customers/create', 'CustomersController@create');
//Route::post('/customers', 'CustomersController@store');
//Route::get('/customers/{customer}', 'CustomersController@show');
//Route::get('/customers/{customer}/edit', 'CustomersController@edit');
//Route::patch('/customers/{customer}', 'CustomersController@update');
//Route::delete('/customers/{customer}', 'CustomersController@delete');
Route::post('/customers/filter', 'CustomersController@filter');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');