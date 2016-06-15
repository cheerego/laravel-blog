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


Route::get('/', 'IndexController@blog');
Route::get('blog','IndexController@blog');
Route::get('message','IndexController@message');
Route::get('aboutme','IndexController@aboutme');
Route::get('detail/{id}','IndexController@details');
Route::get('blog/findArticlesByCategory/{id}','IndexController@findarticlesbycategory');


Route::auth();
// Authentication Routes...
//Route::get('login', 'Auth\AuthController@showLoginForm');
//Route::post('login', 'Auth\AuthController@login');
//Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
//Route::get('register', 'Auth\AuthController@showRegistrationForm');
//Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
//Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//Route::post('password/reset', 'Auth\PasswordController@reset');


Route::resource('dashboard', 'HomeController');

//category
Route::get('categories/softdelete/{id}', "CategoriesController@softdelete");
Route::get('categories/reactivate/{id}', "CategoriesController@activate");
Route::resource('categories', 'CategoriesController');

//articles
Route::post('uploadimg', "ArticlesController@uploadimg");
Route::get('articles/reactivate/{id}', "ArticlesController@reactivate");
Route::get('articles/softdelete/{id}', "ArticlesController@softdelete");
Route::resource('articles', 'ArticlesController');

//tags
Route::get('tags/softdelete/{id}', "TagController@softdelete");
Route::get('tags/reactivate/{id}', "TagController@activate");
Route::resource('tags', 'TagController');

//image
Route::resource('images', 'ImagesController');
