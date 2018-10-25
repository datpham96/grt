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
	//product
	Route::get("/products", "Backend\Products\ProductCtrl@main")->name('products');
	Route::get("/mainProducts", "Backend\Products\ProductCtrl@products")->name('mainProducts');
	Route::get("/productDetail", "Backend\Products\ProductCtrl@productDetail")->name('productDetail');

	//user
	Route::get("/userInfo", "Backend\User\UserCtrl@userInfo")->name('userInfo');

	//category
	Route::get("/categorys", "Backend\Category\CategoryCtrl@categorys")->name('categorys');

	//post
	Route::get("/posts", "Backend\Posts\PostsCtrl@main")->name('posts');
	Route::get("/mainPosts", "Backend\Posts\PostsCtrl@posts")->name('mainPosts');
	Route::get("/postDetail", "Backend\Posts\PostsCtrl@postDetail")->name('postDetail');

	//link
	Route::get("/links", "Backend\Links\LinksCtrl@links")->name('links');

	//support
	Route::get("/supports", "Backend\Supports\SupportsCtrl@supports")->name('supports');
});

//Rest
Route::group(['prefix' => 'backend/rest', 'middleware'=> 'auth'], function () {
	//user
	Route::get('/user/auth/info', 'Backend\Rest\UserCtrl@authUser');
	Route::post('/userInfo', 'Backend\Rest\UserCtrl@updateUserSelf');
	Route::put('/userInfo/password', 'Backend\Rest\UserCtrl@updatePasswordSelf');

	//support
	Route::get('/support', 'Backend\Rest\SupportCtrl@list');
	Route::post('/support', 'Backend\Rest\SupportCtrl@insert');
	Route::post('/support/{id}', 'Backend\Rest\SupportCtrl@update');
	Route::delete('/support/{id}', 'Backend\Rest\SupportCtrl@delete');

	//links
	Route::get('/link', 'Backend\Rest\LinkCtrl@list');
	Route::post('/link', 'Backend\Rest\LinkCtrl@insert');
	Route::post('/link/{id}', 'Backend\Rest\LinkCtrl@update');
	Route::delete('/link/{id}', 'Backend\Rest\LinkCtrl@delete');

	//category
	Route::get('/category', 'Backend\Rest\CategoryCtrl@list');
	Route::post('/category', 'Backend\Rest\CategoryCtrl@insert');
	Route::post('/category/{id}', 'Backend\Rest\CategoryCtrl@update');
	Route::delete('/category/{id}', 'Backend\Rest\CategoryCtrl@delete');

	//post
	Route::get('/post', 'Backend\Rest\PostCtrl@list');
	Route::get('/post/{id}', 'Backend\Rest\PostCtrl@info');
	Route::post('/post', 'Backend\Rest\PostCtrl@insert');
	Route::post('/post/{id}', 'Backend\Rest\PostCtrl@update');
	Route::delete('/post/{id}', 'Backend\Rest\PostCtrl@delete');

	//product
	Route::get('/product', 'Backend\Rest\ProductCtrl@list');
	Route::get('/product/{id}', 'Backend\Rest\ProductCtrl@info');
	Route::post('/product', 'Backend\Rest\ProductCtrl@insert');
	Route::post('/product/{id}', 'Backend\Rest\ProductCtrl@update');
	Route::delete('/product/{id}', 'Backend\Rest\ProductCtrl@delete');
});

//customer
Route::get("/", "Frontend\Home\HomeCtrl@home")->name('home');

//Modal
Route::get('modal/{modalName}', 'ModalCtrl@index')->name('viewModal');

//file
Route::get('/file/avatar', 'File\FileCtrl@avatar');

