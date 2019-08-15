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

Auth::routes();

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['middleware' => 'role:admin', 'prefix'=> 'admin', 'as' =>'admin.'], function () {
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', ['as'           => 'index', 'uses'   => 'UserController@index']);
        Route::get('getData', ['as'     => 'getData', 'uses' => 'UserController@getData']);
        Route::get('create', ['as'      => 'create', 'uses'  => 'UserController@create']);
        Route::get('edit/{id}', ['as'   => 'edit', 'uses'    => 'UserController@edit']);
        Route::post('store', ['as'      => 'store', 'uses'   => 'UserController@store']);
        Route::post('update', ['as'     => 'update', 'uses'  => 'UserController@update']);
        Route::get('delete/{id}', ['as' => 'delete', 'uses'  => 'UserController@destroy']);
    });
});
