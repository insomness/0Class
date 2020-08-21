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
Route::get('/kelas/{kelasId}/{videoId}', 'frontend\KelasController@belajar')->name('kelas.belajar');
Route::resource('/kelas', 'frontend\KelasController')->parameters(['kelas' => 'kelas']);
Route::resource('blog', 'frontend\BlogController')->except(['store', 'destroy', 'create', 'edit']);
Route::resource('podcast', 'frontend\PodcastController')->except(['store', 'destroy', 'create', 'edit']);

// akun
Route::group(['middleware' => ['auth', 'roles:regular,premium']], function(){
    Route::get('upgradepremium', 'frontend\TransaksiController@upgradePremium')->name('upgrade_premium');
    Route::post('kirimbuktitransfer', 'frontend\TransaksiController@kirimBuktiTransfer')->name('kirim_bukti_transfer');
    Route::patch('kirimulangbuktitransfer', 'frontend\TransaksiController@kirimUlangBuktiTransfer')->name('kirim_ulang_bukti_transfer');

    Route::get('/akun/detail', 'frontend\AkunController@detailAkun')->name('akun.detail');
    Route::get('/akun/edit', 'frontend\AkunController@editAkun')->name('akun.edit');
    Route::get('/akun/ubahpassword', 'frontend\AkunController@ubahPassword')->name('akun.ubah_password');
    Route::patch('/akun/edit', 'frontend\AkunController@updateAkun')->name('akun.update');
    Route::patch('/akun/simpanubahpassword', 'frontend\AkunController@simpanUbahPassword')->name('akun.simpan_ubah_password');
});

// admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'roles:admin']], function () {
    Route::get('/', 'admin\DashboardController@index')->name('dashboard');
    // user dan akun admin
    Route::resource('/user', 'admin\UserController')->except(['create', 'show', 'store']);
    Route::get('/editprofil', 'admin\UserController@editProfil')->name('user.edit_profil');
    Route::get('/ubahpassword', 'admin\UserController@ubahPassword')->name('user.ubah_password');
    Route::patch('/simpanubahpassword', 'admin\UserController@simpanUbahPassword')->name('user.simpan_ubah_password');
    Route::patch('/simpaneditprofil', 'admin\UserController@simpanEditProfil')->name('user.simpan_edit_profil');

    Route::resource('/kelas', 'admin\KelasController')->parameters(['kelas' => 'kelas']);
    // route materi kelas
    Route::get('/kelas/{kelasId}/tambahVideo', 'admin\KelasController@tambahVideo')->name('kelas.tambahvideo');
    Route::post('/kelas/{kelasId}/simpanvideo', 'admin\KelasController@simpanVideo')->name('kelas.simpanvideo');
    Route::delete('/kelas/{kelasId}/{videoId}', 'admin\KelasController@hapusVideo')->name('kelas.hapusvideo');

    Route::resource('/podcast', 'admin\PodcastController');
    Route::resource('/blog', 'admin\BlogController');

    Route::get('/transaksi/pending', 'admin\TransaksiController@pending')->name('transaksi.pending');
    Route::get('/transaksi/disetujui', 'admin\TransaksiController@disetujui')->name('transaksi.disetujui');
    Route::get('/transaksi/ditolak', 'admin\TransaksiController@ditolak')->name('transaksi.ditolak');
    Route::resource('/transaksi', 'admin\TransaksiController');

    Route::get('/setting', 'admin\SettingController@index')->name('setting.index');
    Route::patch('/setting', 'admin\SettingController@simpanSetting')->name('setting.simpan');

    Route::resource('/rekening', 'admin\RekeningController');
});

Auth::routes();
