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

use App\Http\Controllers\Admin\PostController;

// User Routes
Route::group(['namespace' => 'User'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('user/post', 'PostController@index')->name('post');
});

// Admin Routes
Route::group(['namespace' => 'Admin'], function() {
    Route::get('admin/home', 'HomeController@index')->name('admin.home');
    // USERS ROUTES
    Route::resource('admin/user', 'UserController');
    // POST ROUTES
    Route::resource('admin/post', 'PostController');
    // TAG ROUTES
    Route::resource('admin/tag', 'TagController');
    // CATEGORY ROUTES
    Route::resource('admin/category', 'CategoryController');
});


