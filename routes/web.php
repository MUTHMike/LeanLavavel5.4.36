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

Route::get('/', function () {return view('welcome');})->middleware('auth');
Auth::routes();

Route::get('/test','TestController@index');
Route::get('/admin','DashboardControler@index');
//Status
Route::get('/main/status.html',['uses' =>'StatusMainController@index']);
Route::get('/main/status/create.html',['uses' =>'StatusMainController@create']);
Route::post('/main/status/store',['uses' =>'StatusMainController@store']);
Route::get('/main/status/show/{id}',['uses' =>'StatusMainController@show']);
Route::get('/main/status/edit/{id}',['uses' =>'StatusMainController@edit']);
Route::post('/main/status/update',['uses' =>'StatusMainController@update']);
Route::get('/main/status/delete/{id}',['uses' =>'StatusMainController@destroy']);

//User
Route::get('/main/user.html',['uses'=> 'UserController@index']);
Route::get('/user/create.html',['uses'=> 'UserController@create']);
Route::post('/user/add_user',['uses'=> 'UserController@store']);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
