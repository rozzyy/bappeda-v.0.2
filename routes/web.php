<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/admin', '/dashboard');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'BeritaController@index')->name('dashboard');
    Route::post('/create', 'BeritaController@store')->name('create');
    Route::get('/add', 'BeritaController@create')->name('add');
    Route::get('/edit/{id}', 'BeritaController@edit')->name('edit');
    Route::patch('/update/{id}', 'BeritaController@update')->name('update');
    Route::delete('/delete/{id}', 'BeritaController@destroy')->name('delete');
    Route::get('/search', 'BeritaController@search')->name('search');

    Route::get('/pengumuman', 'PengumumanController@index')->name('pengumuman');
    Route::post('/pengumuman/create', 'PengumumanController@store')->name('create_pengumuman');
    Route::get('/pengumuman/add', 'PengumumanController@create')->name('add_pengumuman');
    Route::get('/pengumuman/edit/{id}', 'PengumumanController@edit')->name('edit_pengumuman');
    Route::patch('/pengumuman/edit/{id}', 'PengumumanController@update')->name('update_pengumuman');
    Route::delete('/pengumuman/delete/{id}', 'PengumumanController@destroy')->name('delete_pengumuman');
    Route::get('/hapus', 'BeritaController@hapus')->name('hapus');
    Route::get('/pengumuman/hapus', 'PengumumanController@hapus')->name('hapus_pengumuman');

    Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan');
    Route::delete('/pengaduan/delete/{id}', 'PengaduanController@destroy')->name('pengaduan_delete');
    Route::get('/pengaduan/delete', 'PengaduanController@delete')->name('delete_pengaduan');
    Route::get('/pengaduan/{id}', 'PengaduanController@show')->name('detail_pengaduan');

    Route::get('/admin/saran', 'SaranController@index')->name('saran');
    Route::delete('/admin/saran/delete/{id}', 'SaranController@destroy')->name('saran_delete');
    Route::get('/admin/saran/delete', 'SaranController@delete')->name('delete_saran');
    Route::get('/admin/saran/{id}', 'SaranController@show')->name('detail_saran');

    Route::get('/admin/pesan', 'PesanController@index')->name('pesan');
    Route::get('/admin/pesan/{id}', 'PesanController@show')->name('detail_pesan');
});


