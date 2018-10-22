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
//login
Route::get('/login', 'User\LoginCtrl@getLogin')->name('login')->middleware('guest');
Route::post('/login', 'User\LoginCtrl@postLogin')->name('postLogin')->middleware('guest');
Route::get('/logout', 'User\LoginCtrl@logout')->name('logout');

//admin
Route::group(['prefix' => '/admin', 'middleware'=> ['web', 'auth']], function () {
	Route::get("/products", "Backend\Products\ProductCtrl@products")->name('products');

	//user
	Route::get("/userInfo", "Backend\User\UserCtrl@userInfo")->name('userInfo');

});

//Rest
Route::group(['prefix' => 'rest', 'middleware'=> 'auth'], function () {
	//user
	Route::get('/user/auth/info', 'Backend\Rest\UserCtrl@authUser');
	Route::post('/userInfo', 'Backend\Rest\UserCtrl@updateUserSelf');
	Route::put('/userInfo/password', 'Backend\Rest\UserCtrl@updatePasswordSelf');
});

//customer
Route::get("/", "Frontend\Home\HomeCtrl@home")->name('home');

//Modal
Route::get('modal/{modalName}', 'ModalCtrl@index')->name('viewModal');

//file
Route::get('/file/avatar', 'File\FileCtrl@avatar');

