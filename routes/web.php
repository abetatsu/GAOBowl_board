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
    return redirect('/home');
});


Route::get('hello', 'HelloController@index');
Route::get('hello/{id}', 'HelloController@show');
Route::post('hello', 'HelloController@post');

Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');

Auth::routes();

Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});

Route::get('posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
Route::get('posts/{post}/removefavorites', 'FavoriteController@destroy')->name('removefavorites');
Route::get('posts/{post}/countfavorites', 'FavoriteController@count');
Route::get('posts/{post}/hasfavorites', 'FavoriteController@hasfavorite');

Route::get('posts/{post}/unfavorites', 'UnfavoriteController@store')->name('unfavorites');
Route::get('posts/{post}/removeunfavorites', 'UnfavoriteController@destroy')->name('removeunfavorites');
Route::get('posts/{post}/countunfavorites', 'FavoriteController@count');
Route::get('posts/{post}/hasunfavorites', 'FavoriteController@hasfavorite');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@send');

Route::resource('contacts', 'ContactController');