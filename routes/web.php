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

Route::get('/', 'HomeController@getIndex');

// Route::resource('topic', 'TopicController');

Route::get('topic', 'TopicController@getIndex');
Route::get('topic/save', 'TopicController@getSave');
Route::get('topic/save/{id}', 'TopicController@getSave');
Route::post('topic/save', 'TopicController@postSave');
Route::get('topic/delete/{id}', 'TopicController@getDelete');


Route::get('news', 'NewsController@getIndex');
Route::get('news/save', 'NewsController@getSave');
Route::get('news/save/{id}', 'NewsController@getSave');
Route::post('news/save', 'NewsController@postSave');
Route::get('news/delete/{id}', 'NewsController@getDelete');
