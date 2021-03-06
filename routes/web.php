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
Route::get('/add-category', 'CategoryController@getAddCategory')->name('add_category')->middleware('checkrole:administrator,moderator');
Route::post('/add-category/submit-add-category', 'CategoryController@submitAddCategory')->middleware('checkrole:administrator,moderator');
Route::get('/category/{id}', 'CategoryController@getCategory')->name('category');
Route::get('/edit-category/{id}', 'CategoryController@getEditCategory')->name('edit_category')->middleware('checkrole:administrator,moderator');
Route::post('/edit-category/submit-edit-category', 'CategoryController@submitEditCategory')->middleware('checkrole:administrator,moderator');
Route::get('/delete-category/{id}', 'CategoryController@getDeleteCategory')->name('delete_category')->middleware('checkrole:administrator,moderator');

// TOPICS
Route::post('/add-topic/submit-add-topic', 'TopicController@submitAddTopic');
Route::get('/topic/{id}', 'TopicController@getTopic')->name('topic');
Route::get('/edit-topic/{id}', 'TopicController@getEditTopic')->name('edit_topic');
Route::post('/edit-topic/submit-edit-topic', 'TopicController@submitEditTopic');
Route::get('/delete-topic/{id}', 'TopicController@getDeleteTopic')->name('delete_topic');

// COMMENTS
Route::post('/add-comment/submit-add-comment', 'CommentController@submitAddComment');
Route::get('/answer-comment/{id}', 'CommentController@getAnswerComment')->name('answer_comment');
Route::post('/answer-comment/submit-answer-comment', 'CommentController@submitAnswerComment');
Route::get('/delete-comment/{id}', 'CommentController@getDeleteComment')->name('delete_comment');