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
Route::get('/', 'RouteController@getHomepage')->name('homepage');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// CATEGORIES
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/add-category', 'CategoryController@getAddCategory')->name('add_category');
Route::post('/add-category/submit-add-category', 'CategoryController@submitAddCategory');
Route::get('/category/{id}', 'CategoryController@getCategory')->name('category');
