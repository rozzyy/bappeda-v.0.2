<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::get('berita', 'Api\BeritaController@berita');
Route::get('berita/{berita}', 'Api\BeritaController@show');
Route::get('galeri', 'Api\BeritaController@galeri');

Route::get('pengumuman', 'Api\PengumumanController@pengumuman');
Route::get('pengumuman/{pengumuman}', 'Api\PengumumanController@show');
Route::get('/search', 'Api\BeritaController@search');
Route::get('/cari', 'Api\PengumumanController@search');
Route::get('populer', 'Api\BeritaController@populer');

Route::post('saran', 'Api\SaranController@store');
Route::get('saran', 'Api\SaranController@index');
Route::get('saran/{saran}', 'Api\SaranController@show');

Route::get('pengaduan', 'Api\PengaduanController@index');
Route::post('pengaduan', 'Api\PengaduanController@store');
Route::get('pengaduan/{pengaduan}', 'Api\PengaduanController@show');

Route::get('pesan', 'Api\PesanController@index');
Route::post('pesan', 'Api\PesanController@store');
Route::get('pesan/{pesan}', 'Api\PesanController@show');

Route::post('komen/{berita}', 'Api\CommentController@store');
Route::get('komen', 'Api\CommentController@index');
