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

// USERS
Route::get('/', 'RouteController@getHomepage');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// CATEGORIES
Route::get('/categories', 'RouteController@getCategories');
