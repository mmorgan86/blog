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
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('post/{post}', 'PostController@post')->name('post');

    Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('post/category/{category}', 'HomeController@category')->name('category');
});

// Admin Routes
Route::group(['namespace' => 'Admin'], function() {
    Route::get('admin/home', 'HomeController@index')->name('admin.home');
    // USERS ROUTES
    Route::resource('admin/user', 'UserController');
    // ROLE ROUTES
    Route::resource('admin/role', 'RoleController');
    // PERMISSION ROUTES
    Route::resource('admin/permission', 'PermissionController');
    // POST ROUTES
    Route::resource('admin/post', 'PostController');
    // TAG ROUTES
    Route::resource('admin/tag', 'TagController');
    // CATEGORY ROUTES
    Route::resource('admin/category', 'CategoryController');

    // Admin Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
