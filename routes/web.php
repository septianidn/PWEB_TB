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

Route::view('/',  'login');

Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');


Route::group(['middleware' => ['auth', 'CheckRole:1']], function () {
    
    
    Route::get('/mahasiswa', 'MahasiswaController@index');
    Route::get('/mahasiswa/tambah', 'MahasiswaController@create');
    Route::post('/mahasiswa/tambah', 'MahasiswaController@store');
    Route::get('/mahasiswa/{mhs}/edit', 'MahasiswaController@edit');
    Route::patch('/mahasiswa/update', 'MahasiswaController@update');
    Route::delete('/mahasiswa/{mhs}/hapus', 'MahasiswaController@destroy');
    
    Route::get('/kelas/tambah','KelasController@create');
    Route::post('/kelas/tambah','KelasController@store');
    Route::get('/kelas/{kelas}/edit','KelasController@edit');
    Route::patch('/kelas/{kelas}/edit','KelasController@update');
    
    Route::get('/pertemuan/{kelas}','PertemuanController@index');
    Route::get('/pertemuan/{kelas}/tambah','PertemuanController@create');
    Route::post('/pertemuan/{kelas}/create','PertemuanController@store');
    Route::get('/pertemuan/{pertemuan}/detail','PertemuanController@show');   
    Route::get('/kelas/{kelas}/detail','KelasController@show');
    
    Route::get('/kelas/{kelas}/detail','KelasController@show')->name('Detail_Kelas');
    Route::get('/{kelas}/peserta/tambah','KelasController@peserta');
    Route::post('/{kelas}/peserta/tambah','KelasController@tambahpeserta');
    Route::get('/peserta/{kelas_id}/{mahasiswa_id}/hapus','KelasController@hapuspeserta');
});

Route::group(['middleware' => ['auth', 'CheckRole:1,2']], function () {
    
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('/kelas','KelasController@index');
    Route::get('logout', 'AuthController@logout')->name('logout');
});
Route::group(['middleware' => ['auth', 'CheckRole:2']], function () {

   
    Route::get('/kelas/{kelas}/detail','KelasController@index');
});

