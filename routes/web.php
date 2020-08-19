<?php

use Illuminate\Support\Facades\Auth;
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

// frontend
Route::get('/', 'frontend\WelcomeController@index')->name('index');
Route::get('/about', 'frontend\WelcomeController@about')->name('about');
Route::resource('/kelas', 'frontend\KelasController')->parameters(['kelas' => 'kelas']);
Route::get('/kelas/{kelasId}/{videoId}', 'frontend\KelasController@belajar')->name('kelas.belajar');

// admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:admin'], function () {
    Route::get('/', 'admin\DashboardController@index')->name('dashboard');
    Route::resource('/user', 'admin\UsersController')->except(['create', 'show', 'store']);
    Route::resource('/kelas', 'admin\KelasController')->parameters(['kelas' => 'kelas']);
    // route materi untuk kelas
    Route::get('/kelas/{kelasId}/tambahVideo', 'admin\KelasController@tambahVideo')->name('kelas.tambahvideo');
    Route::post('/kelas/{kelasId}/simpanvideo', 'admin\KelasController@simpanVideo')->name('kelas.simpanvideo');
    Route::delete('/kelas/{kelasId}/{videoId}', 'admin\KelasController@hapusVideo')->name('kelas.hapusvideo');

    Route::resource('/podcast', 'admin\PodcastController');
    Route::resource('/blog', 'admin\BlogController');

    Route::get('/transaksi/pending', 'admin\TransaksiController@pending')->name('transaksi.pending');
    Route::get('/transaksi/disetujui', 'admin\TransaksiController@disetujui')->name('transaksi.disetujui');
    Route::get('/transaksi/ditolak', 'admin\TransaksiController@ditolak')->name('transaksi.ditolak');
    Route::resource('/transaksi', 'admin\TransaksiController');
});

Auth::routes();
