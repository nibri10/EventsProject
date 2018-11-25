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

    Route::get('files', 'FileEntriesController@index');
    Route::get('files/create', 'FileEntriesController@create')->name('files.create');
    Route::post('files/upload-file', 'FileEntriesController@uploadFile');
    Route::get('files/{path_file}/{file}', function($path_file = null, $file = null) {
        $path = storage_path().'/files/uploads/'.$path_file.'/'.$file;
        if(file_exists($path)) {
            return Response::download($path);
        }
    });

    Route::get('/','PainelController@index')->name('painel.index');
Route::middleware(['level:0'])->group(function () {
    Route::post('usuarios', 'UserRegistrationEventController@store')->name('usuarios.store');
    Route::get('usuarios/{id}', 'UserRegistrationEventController@show')->name('usuarios.show');
    Route::delete('usuarios/{id}', 'UserRegistrationEventController@destroy')->name('usuarios.destroy');
    Route::get('usuarios/{id}','UserRegistrationEventController@Subscription')->name('usuarios.subscription');
});

Route::middleware(['level:1'])->group(function () {

    Route::resource('events','EventsController');
    Route::get('usuarios','UserRegistrationEventController@index')->name('usuarios.index');
    Route::post('events/{id}','EventsController@desactive')->name('events.desactive');
    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
