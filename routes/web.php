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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('branches','BranchController');
Route::resource('Complains','ComplainController');
Route::get('/dropdown-regions','ComboBoxController@region');
Route::get('/dropdown-departments/{id}','ComboBoxController@department');
Route::get('/dropdown-municipalities/{id}','ComboBoxController@municipality');
