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
Route::get('/admin/login', 'User\LoginCtrl@getLogin')->name('login')->middleware('guest');
// Route::post('/login', 'User\LoginCtrl@postLogin')->name('postLogin')->middleware('guest');
// Route::get('/logout', 'User\LoginCtrl@logout')->name('logout');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
