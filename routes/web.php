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

Route::get('/', function () {
    return view('complains.search');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/conteo','homeController@countComplainToChart');


Route::resource('branches','BranchController');
Route::resource('complains','ComplainController');


Route::get('/dropdown-regions','ComboBoxController@region');
Route::get('/dropdown-departments/{id}','ComboBoxController@department');
Route::get('/dropdown-municipalities/{id}','ComboBoxController@municipality');
Route::get('/dropdown-branches/{id}','ComboBoxController@branch');
Route::get('search','ComplainController@index')->name('complains.search');
Route::post('search','ComplainController@search')->name('complains.search');

Route::get('/vista','VistasController@vistaConteoQuejas')->name('datatable');
Route::get('/data','VistasController@index')->name('vistaQuejas');
