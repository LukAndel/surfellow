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

Route::get('/', 'PageController@welcome')->name('/');
Route::post('/', 'PageController@feedback');
Route::delete('delete/{id}', 'PageController@deletefeed');

Route::get('/admin', 'SiteController@display')->name('admin');
Route::get('/admin/{id}', 'SiteController@displayEdit')->name('editEvent');
Route::post('save','SiteController@saveEvent');
Route::get('/admin/event/{id}','SiteController@event')->name('event');
Route::put('/admin/{id}','SiteController@editEvent');
Route::delete('/admin/event/{id}','SiteController@deleteEvent');

