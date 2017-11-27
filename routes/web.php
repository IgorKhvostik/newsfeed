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

Route::get('/', 'IndexController@index')->name('indexController');

Route::prefix('category')->group(function(){
    Route::get('{categoryName}', 'IndexController@category')->name('categoryController');
    Route::get('{categoryName}/{id}', 'IndexController@post')->name('postController');
});

Route::get('user/{userId}', 'IndexController@userPosts')->name('userPostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-post', 'AddPostController@addPost')->name('addPost');
