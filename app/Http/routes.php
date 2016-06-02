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


Route::get('/', 'IndexController@index');
Route::get('blog','IndexController@blog');
Route::get('aboutme','IndexController@aboutme');


Route::auth();



Route::resource('dashboard', 'HomeController');


//articles
Route::get('uploadimg', "ArticlesController@uploadimg");
Route::get('reactivate', "ArticlesController@reactivate");
Route::resource('articles', 'ArticlesController');
