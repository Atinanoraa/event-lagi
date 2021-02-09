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

    // NavBar
Route::get('/', 'NavbarController@index');
Route::get('detail-event/{id}','NavbarController@detail');
Route::get('tiket-event','NavbarController@tiket');
Route::post('tiket-event/save','NavbarController@save');
Route::get('tiket-registrasi/{id}/{id2}','NavbarController@registrasi');
Route::get('tiket-transaksi/{id}/{id2}','NavbarController@tikettransaksi');
Route::get('users/{id}', 'NavbarController@pengguna');
Route::post('uploadbukti/{id}','NavbarController@profiletransaksi');
Route::get('sukses', function () {
    return view('profile.profile-sukses');
});

    // Login
Route::get('login', 'LoginController@index');
Route::post('auth-login', 'LoginController@store');
Route::get('logout', 'LoginController@logout');

    // Register
Route::get('sign-up', 'RegisterController@show');
Route::post('auth-register', 'RegisterController@save');


// Route::group(['middleware' => 'App\Http\Middleware\PenyelenggaraMiddleware'], function () {
Route::get('admin', function () {
        return view('layout.layout');
});

    //Penyelenggara
Route::get('admin/penyelenggara','PenyelenggaraController@list');
Route::get('admin/penyelenggara/create','PenyelenggaraController@create');
Route::post('admin/penyelenggara/save/{id}','PenyelenggaraController@save');
Route::get('admin/penyelenggara/edit/{id}','PenyelenggaraController@edit');
Route::post('admin/penyelenggara/update/{id}','PenyelenggaraController@update');
Route::get('admin/penyelenggara/delete/{id}','PenyelenggaraController@delete');

    //Event
Route::get('admin/event','EventController@list');
Route::get('admin/event/create','EventController@create');
Route::post('admin/event/save','EventController@save');
Route::get('admin/event/edit/{id}','EventController@edit');
Route::post('admin/event/update/{id}','EventController@update');
Route::get('admin/event/delete/{id}','EventController@delete');

    //Peserta
Route::get('admin/peserta','PesertaController@list');
Route::get('admin/peserta/create','PesertaController@create');
Route::post('admin/peserta/save','PesertaController@save');
Route::get('admin/peserta/edit/{id}','PesertaController@edit');
Route::post('admin/peserta/update/{id}','PesertaController@update');
Route::get('admin/peserta/delete/{id}','PesertaController@delete');

    //Login sebelum beli
Route::get('login-tiket/{id}','LoginTiketController@index');
Route::post('simpan-login/{id}', 'LoginTiketController@store');

    //Register sebelum beli
Route::get('register-tiket/{id}', 'RegisterTiketController@show');
Route::post('simpan-register/{id}', 'RegisterTiketController@save');

    //Transaksi
Route::get('admin/transaksi','TransaksiController@list');
Route::get('admin/transaksi/create','TransaksiController@create');
Route::post('admin/transaksi/save','TransaksiController@save');
Route::get('admin/transaksi/edit/{id}','TransaksiController@edit');
Route::post('admin/transaksi/update/{id}','TransaksiController@update');
Route::get('admin/transaksi/delete/{id}','TransaksiController@delete');

    //Kategori tiket
Route::get('admin/tiket','TiketKategoriController@list');
Route::get('admin/tiket/create','TiketKategoriController@create');
Route::post('admin/tiket/save','TiketKategoriController@save');
Route::get('admin/tiket/edit/{id}','TiketKategoriController@edit');
Route::post('admin/tiket/update/{id}','TiketKategoriController@update');
Route::get('admin/tiket/delete/{id}','TiketKategoriController@delete');

    //User Profile
Route::get('users/profile/{id}','ProfileController@list');
Route::post('users/update-profile/{id}', 'ProfileController@update');
Route::get('profile-home', function () {
    return view('profile.profile-home');
});
Route::get('profile-settings', function () {
    return view('profile.profile-settings');
});

    // User



// });

Route::group(['middleware' => 'App\Http\Middleware\PesertaMiddleware'], function () {

});
