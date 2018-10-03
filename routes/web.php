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



Route::middleware(['auth'])->prefix('sistema')->group(function () {
    Route::get('/','PainelController@index');
Route::middleware(['level:0'])->group(function () {
    Route::get('eventsUser','UserEvents@index');
    });


Route::middleware(['level:1'])->group(function () {
    Route::resource('events','EventsController');
    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
