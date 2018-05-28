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
    return "go to /fire";
});

Route::get('/{id}',['middleware' => 'cors', function ($id) {
    // this fires the event
    event(new App\Events\Button($id));
    return "event fired";
}])->where('id', '[0-9]{1,2}');


Route::post('/store','buttonController@store')->name('button.store');


Route::get('/dashboard','buttonController@view')->name('button.view');
