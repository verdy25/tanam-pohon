<?php

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

// role
// 1. admin
// 2. persemaian
// 3. masyarakat

Auth::routes();

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['auth', 'role:3']], function () {
        Route::get('/minta', 'PermintaanController@index');
        Route::get('/minta/buat', 'PermintaanController@create');
        Route::post('/minta', 'PermintaanController@store');
        Route::get('/minta/{minta}', 'PermintaanController@show')->name('minta.show');

        Route::prefix('konseling')->group( function(){
            Route::get('/', 'KonselingController@index');
            Route::get('/riwayat', 'KonselingController@riwayat');
        });
       
    });

    Route::group(['middleware' => ['auth', 'role:2']], function () {
        Route::resource('/bibit', 'BibitController');
    });

    Route::group(['middleware' => ['auth', 'role:1,2']], function () {
        Route::get('/permintaan', 'PermintaanController@admin');
        Route::get('/permintaan/{permintaan}/status', 'PermintaanController@edit_status');
        Route::put('/permintaan/{permintaan}', 'PermintaanController@update_status');
    });

    Route::group(['middleware' => ['auth', 'role:1']], function () {
        Route::prefix('lahan')->name('lahan.')->group(function () {
            Route::resource('/', 'LahanKondisiDetailController',  ['parameters' => [
                '' => 'lahan'
            ]]);
            Route::resource('/ciri', 'LahanCiriController')->except('show');
            Route::resource('/kondisi', 'LahanKondisiController')->except('show');
        });
    });
});
