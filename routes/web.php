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

Route::get('/', function () {
    return view('welcome');
});

//課題
Route::get('XXX', 'AAAController@bbb');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::group(['prefix' => 'news'], function(){
        Route::get('create', 'Admin\NewsController@add');
        Route::post('create', 'Admin\NewsController@create');        
    });
    Route::group(['prefix' => 'profile'], function(){
        Route::get('create', 'Admin\ProfileController@add');
        Route::get('edit', 'Admin\ProfileController@edit');
        Route::post('create', 'Admin\ProfileController@create');
        Route::post('edit', 'Admin\ProfileController@edit');
    });
});