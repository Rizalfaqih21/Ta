<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Layanan
    Route::delete('layanans/destroy', 'LayananController@massDestroy')->name('layanans.massDestroy');
    Route::resource('layanans', 'LayananController');

    // Pemesanan
    Route::delete('pemesanans/destroy', 'PemesananController@massDestroy')->name('pemesanans.massDestroy');
    Route::patch('pemesanans/verif/{pemesanan}', 'PemesananController@verif')->name('pemesanans.verif');
    Route::resource('pemesanans', 'PemesananController');

    // Teknisi
    Route::delete('teknisis/destroy', 'TeknisiController@massDestroy')->name('teknisis.massDestroy');
    Route::resource('teknisis', 'TeknisiController');
    // Riwayat Pemesanan
    
    Route::delete('riwayat-pemesanans/destroy', 'RiwayatPemesananController@massDestroy')->name('riwayat-pemesanans.massDestroy');
    Route::resource('riwayat-pemesanans', 'RiwayatPemesananController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
});
Route::group(['prefix' => 'teknisi', 'as' => 'teknisi.', 'namespace' => 'Teknisi', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    // Pemesanan
    Route::delete('pemesanans/destroy', 'PemesananController@massDestroy')->name('pemesanans.massDestroy');
    Route::patch('pemesanans/verif/{pemesanan}', 'PemesananController@verif')->name('pemesanans.verif');
    Route::resource('pemesanans', 'PemesananController');

    // Teknisi
    Route::delete('teknisis/destroy', 'TeknisiController@massDestroy')->name('teknisis.massDestroy');
    Route::resource('teknisis', 'TeknisiController');
    
    // Riwayat Pemesanan
    Route::delete('riwayat-pemesanans/destroy', 'RiwayatPemesananController@massDestroy')->name('riwayat-pemesanans.massDestroy');
    Route::patch('riwayat-pemesanans/updatee/{riwayat_pemesanan}', 'RiwayatPemesananController@updatestatus')->name('riwayat-pemesanans.updatestatus');
    Route::resource('riwayat-pemesanans', 'RiwayatPemesananController');
    
    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::post('profile', 'ProfileController@update')->name('profile.update');
    Route::post('profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('profile/password', 'ProfileController@password')->name('profile.password');
});

Route::group(['as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    // Pemesanan
    Route::delete('pemesanans/destroy', 'PemesananController@massDestroy')->name('pemesanans.massDestroy');
    Route::resource('pemesanans', 'PemesananController');

    // Riwayat Pemesanan
    Route::resource('riwayat-pemesanans', 'RiwayatPemesananController');
    
    Route::get('user/profile', 'ProfileController@index')->name('profile.index');
    Route::post('user/profile', 'ProfileController@update')->name('profile.update');
    Route::post('user/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('user/profile/password', 'ProfileController@password')->name('profile.password');
});