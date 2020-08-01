<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['prefix' => 'admin'], function () {
	
	Route::get('/', 'Auth\LoginController@showAdminLoginForm');
	Route::get('/dashboard', 'Admin\AdminController@dashboard');
	Route::get('/logout', 'Admin\AdminController@logout');
	Route::get('/product', 'Admin\ProductController@index');
	Route::get('/product/add', 'Admin\ProductController@add');
	Route::get('/product/edit/{id}', 'Admin\ProductController@add');
	Route::get('/product/delete/{id}', 'Admin\ProductController@delete');
	
	Route::post('/', 'Auth\LoginController@adminLogin');
	Route::post('/product/process', 'Admin\ProductController@process');
});

Route::get('/home', 'HomeController@index')->name('home');
