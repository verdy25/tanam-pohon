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
Route::get('/informasi', 'BibitController@informasi');

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/about', 'HomeController@about');
    Route::get('city', 'ProfilController@getCity')->name('city');
    Route::get('district', 'ProfilController@getDistrict')->name('district');
    Route::get('search-city', 'ProfilController@searchCity')->name('search.city');

    Route::group(['middleware' => ['auth', 'role:3']], function () {
        Route::get('/minta', 'PermintaanController@index');
        Route::get('/minta/individu', 'PermintaanController@individu')->name('minta.individu');
        Route::get('/minta/kelompok', 'PermintaanController@kelompok')->name('minta.kelompok');
        Route::get('/minta/instansi', 'PermintaanController@instansi')->name('minta.instansi');
        Route::post('/minta', 'PermintaanController@store');
        Route::post('/minta/{minta}', 'PermintaanController@upload_bukti');
        Route::get('/minta/bukti/hapus/{id}', 'PermintaanController@hapus_bukti')->name('bukti.hapus');
        Route::get('/minta/{minta}', 'PermintaanController@show')->name('minta.show');

        Route::get('/profile', 'ProfilController@index')->name('profile');
        Route::put('/profile', 'ProfilController@update')->name('update.profile');

        Route::prefix('konseling')->group(function () {
            Route::get('/', 'KonselingController@index');
            Route::post('/', 'KonselingController@store')->name('konseling.store');
            Route::get('/riwayat', 'KonselingController@riwayat')->name('konseling.riwayat');
        });
    });

    // Route::group(['middleware' => ['auth', 'role:2']], function () { });

    Route::group(['middleware' => ['auth', 'role:1,2']], function () {
        Route::get('/pengajuan', 'PermintaanController@pengajuan');
        Route::get('/penerima', 'PermintaanController@penerima');
        Route::get('/pengajuan/{pengajuan}/status', 'PermintaanController@edit_status');
        Route::get('/penerima/{penerima}/status', 'PermintaanController@edit_penerimaan');
        Route::put('/pengajuan/{pengajuan}', 'PermintaanController@update_status');
        Route::put('/penerima/{penerima}', 'PermintaanController@update_penerimaan');
        Route::get('permintaan/{id}', 'PermintaanController@permintaan')->name('permintaan');

        Route::resource('/bibit', 'BibitController');

        Route::get('/masyarakat', 'ProfilController@admin')->name('masyarakat');
        Route::get('/masyarakat/{id}', 'ProfilController@detail')->name('masyarakat.detail');

        // Route::get('/profile/{id}', 'ProfilController@detail')->name('profile.detail');

        Route::get('/profil', 'ProfilController@profiladmin')->name('profil.admin');
        Route::put('/profil', 'ProfilController@updateprofiladmin')->name('update.profil.admin');
    });

    Route::group(['middleware' => ['auth', 'role:1']], function () {

        Route::prefix('lahan')->name('lahan.')->group(function () {
            Route::resource('/ciri', 'LahanCiriController')->except('show');
            Route::resource('/kondisi', 'LahanKondisiController')->except('show');
            Route::resource('/', 'LahanKondisiDetailController',  ['parameters' => [
                '' => 'lahan'
            ]]);
            Route::post('/kategori', 'LahanCiriController@store_kategori')->name('add.kategori');
        });

    });
});
