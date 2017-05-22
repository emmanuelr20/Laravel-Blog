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

Route::get('/', 'IndexController@index');
Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/{slug}', 'ArticlesController@view');
Route::post('/articles/{article}/comment', 'CommentsController@store');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'admin' ], function() {
    
    Route::get('/', 'AdminController@index');
    Route::get('/articles', 'AdminController@viewAll');
    //Route::get('/articles/new', 'AdminController@createView');
    Route::post('/articles/new', 'AdminController@create');
    Route::get('/articles/{article}', 'AdminController@view');
    Route::get('/articles/{article}/edit', 'AdminController@edit');
    Route::patch('/articles/{article}/update', 'AdminController@update');
    Route::delete('/articles/{article}/delete', 'AdminController@delete');
    
});

