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

Auth::routes();

Route::get('/item/index', 'ItemsController@index')->name('item.index');
Route::get('/user/index', 'UsersController@index')->name('user.index');

Route::get('/channel/index/{id?}', 'ChannelsController@index')->name('channels.index');
Route::get('{channelId}/item/create', 'ItemsController@create')->name('item.create');
Route::post('item/create', 'ItemsController@store')->name('item.store');
Route::get('item/edit/{id}', 'ItemsController@edit')->name('item.edit');
Route::post('/item/edit/{id}', 'ItemsController@update')->name('item.update');
Route::get('/item/delete/{id}', 'ItemsController@delete')->name('item.delete');
