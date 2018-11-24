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

Route::get('/','HomeController@index')->name('Home');
Route::post('reservation','ReservationController@reserve')->name('reservation.reserve');
Route::post('contact','ContactController@send')->name('contact.send');

Auth::routes();


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){
    Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
    Route::resource('slider','SliderController');
    Route::resource('category','CategoryController');
    Route::resource('item','ItemController');
    Route::resource('dish','DishController');
    Route::resource('social','SocialMenuController');
    Route::get('reservation','ReservationController@index')->name('reservation.index');
    Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('reservation/{id}','ReservationController@delete')->name('reservation.delete');
    Route::get('contact','ContactController@index')->name('contact.index');
});
