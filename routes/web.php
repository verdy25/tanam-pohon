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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// role
// 1. admin
// 2. persemaian
// 3. masyarakat

Route::group(['middleware' => ['auth', 'role:3,2,1']],function(){
    Route::get('/', 'HomeController@index');
});

Route::group(['middleware' => ['auth', 'role:3']],function(){
    Route::get('/minta', 'PermintaanController@index');
    Route::get('/minta/buat', 'PermintaanController@create');
    Route::post('/minta', 'PermintaanController@store');
});

Route::group(['middleware' => ['auth', 'role:2']],function(){
    Route::resource('/bibit', 'BibitController');
});

Route::group(['middleware' => ['auth', 'role:1,2']],function(){
    Route::get('/permintaan', 'PermintaanController@admin');
    Route::get('/permintaan/{permintaan}/status', 'PermintaanController@edit_status');
    Route::put('/permintaan/{permintaan}', 'PermintaanController@update_status');
});

Route::group(['middleware' => ['auth', 'role:1']], function(){
    Route::prefix('lahan')->group(function(){        
        Route::resource('/ciri', 'LahanCiriController');
        Route::resource('/kondisi', 'LahanKondisiController');
    });
});