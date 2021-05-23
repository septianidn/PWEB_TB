<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

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

Route::view('/',  'welcome');

Route::get('/mahasiswa', 'MahasiswaController@index');
Route::get('/mahasiswa/tambah', 'MahasiswaController@create');
Route::post('/mahasiswa/tambah', 'MahasiswaController@store');
Route::get('/mahasiswa/{mhs}/edit', 'MahasiswaController@edit');
Route::patch('/mahasiswa/update', 'MahasiswaController@update');
Route::get('/mahasiswa/{mhs}/hapus', 'MahasiswaController@destroy');

