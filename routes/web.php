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



Route::middleware(['auth'])->prefix('painel')->group(function () {

    Route::get('/','PainelController@index');
Route::middleware(['level:0'])->group(function () {
    
    });


Route::middleware(['level:1'])->group(function () {
    Route::resource('events','EventsController');
    Route::resource('usuarios-registrados-eventos','EventRegisterController');
    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
