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

// frontend
Route::get('/', 'frontend\WelcomeController@index')->name('index');
Route::get('/about', 'frontend\WelcomeController@about')->name('about');
Route::resource('/kelas', 'frontend\KelasController')->parameters(['kelas' => 'kelas']);

// admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'admin\DashboardController@index')->name('dashboard');
    Route::resource('/user', 'admin\UsersController');
    Route::resource('/kelas', 'admin\KelasController')->parameters(['kelas' => 'kelas']);
});

Auth::routes();
