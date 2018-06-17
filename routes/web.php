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
    $eventos = \App\Evento::Paginate(1);
    //return  \Redirect::away('https://eventos.local/');
    //dd($eventos);
    return view('evento.index', compact('eventos'));
})->name('index');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('evento','EventoController');

Route::post('evento.redimir','EventoController@redimir')->name('evento.redimir');