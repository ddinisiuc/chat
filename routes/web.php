<?php

use App\Events\WebsocketDemoEvent;
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
Auth::routes();

Route::get('/', 'FrontendController@index');
Route::get('/product', 'FrontendController@getJson');
Route::get('/chart', 'FrontendController@chartData');

Route::get('/socket-chart', 'FrontendController@newEvent');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sign-in/google', 'Auth\LoginController@google')->name('sign_google');
Route::get('/sign-in/google/redirect', 'Auth\LoginController@googleRedirect');

Route::get('/sign-in/facebook', 'Auth\LoginController@facebook')->name('sign_facebook');
Route::get('/sign-in/facebook/redirect', 'Auth\LoginController@facebookRedirect');

Route::get('/albums', 'FrontendController@getFacebookAlbum');
Route::get('/albums/photos', 'FrontendController@getAlbumPhotos');
