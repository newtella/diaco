<?php

use App\Resolution;
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
    return redirect()->route('searches.search');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/conteo','homeController@countComplainToChart');

//Rutas
Route::get('resolution/{complain}', 'ResolutionController@create')->name('resolutions.create')->middleware('auth');
Route::get('search','SearchController@index')->name('searches.search');
Route::post('search','SearchController@search')->name('searches.search');
Route::resource('resolutions', 'ResolutionController', ['except' => ['create']])->middleware('auth');
Route::resource('branches','BranchController');
Route::resource('searches','SearchController');
Route::resource('shops','ShopController');
Route::resource('complains','ComplainController')->middleware('auth');

//Consultas
Route::get('/dropdown-regions','ComboBoxController@region');
Route::get('/dropdown-departments/{id}','ComboBoxController@department');
Route::get('/dropdown-municipalities/{id}','ComboBoxController@municipality');
Route::get('/dropdown-branches/{id}','ComboBoxController@branch');


Route::get('/vista','VistasController@vistaConteoQuejas')->name('datatable');
Route::get('/data','VistasController@index')->name('vistaQuejas');


Route::get('/vquejas','VistasController@vistaQuejas')->name('vquejas');
Route::get('/vreport_quejas','VistasController@toViewQA')->name('vreport_quejas');

Route::get('/vsinquejas','VistasController@vistaSinQuejas')->name('vsinquejas');
Route::get('/vreport_sinquejas','VistasController@toViewSQ')->name('vreport_sinquejas');






