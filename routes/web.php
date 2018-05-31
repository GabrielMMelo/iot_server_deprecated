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

Route::get('/',  function() {
    // this doesn't do anything other than to
    // tell you to go to /fire
    //return view('login');
});

Route::get('/{id}',['middleware' => 'cors', function ($id) {
    // this fires the event
    event(new App\Events\Button($id));
    return "event fired";
}])->where('id', '[0-9]{1,2}');


Route::group(['middleware' => 'auth'], function() {

	Route::group(['prefix' => '/dashboard'], function() {

		Route::get('/tv/{count}/{id}',['uses'=> 'tvController@view'])->name('tv.view');

		Route::get('/','dashboardController@view')->name('dashboard.view');

		Route::post('/store','buttonController@store')->name('button.store');
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
