<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('layout/login');
})->name('login.index');

Route::post('/login/verify', 'LoginController@verifikasiUser')->name('login.verify');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/register', 'LoginController@register')->name('register');
Route::post('/register', 'LoginController@createRegister')->name('register.create');
Route::get('/register/confirm/{emailConfirmToken}', 'LoginController@confirmEmail')->name('register.confirm');

Route::group(['middleware' => ['pwl.middleware']], static function () {
    Route::get('/', function () {
        return view('layout/main');
    });

#list
    Route::get('/products', 'ProductController@index')->name('pr.list');

#add product
    Route::get('/products/new', 'ProductController@formTambah')->name('pr.formNew');
    Route::post('/products/save', 'ProductController@create')->name('pr.create');

#edit
    Route::get('/products/{id}/update', 'ProductController@formUbah')->name('pr.formUpdate');
    Route::post('/products/{id}/save', 'ProductController@update')->name('pr.update');

#hapus
////    Route::get('/products/{id}/delete', 'ProductController@konfirmasiHapus')->name('pr.konfirmasi');
//    Route::post('/products/{id}/hapus', 'ProductController@delete')->name('pr.delete');

    Route::get('/products/{id}/delete', 'ProductController@delete')->name('pr.delete');


    Route::get('/app','KasirController@index')->name('kasir.index');
    Route::get('app/{noTransaksi}','KasirController@aplikasi')->name('kasir.app');
    Route::get('app/close/{noTransaksi}','KasirController@tutupTransaksi')->name('kasir.close');
    Route::get('app/searchProduct/{code}', 'KasirController@searchProduct')->name('kasir.search');
    Route::post('app/insert{noTransaksi}','KasirController@insertItem')->name('kasir.insert');


    Route::get('transaksi','TransaksiController@index')->name('trx.index');
    Route::get('transaksi/{trxNumber}/export/excel','TransaksiController@exportExcel')->name('trx.excel');
    Route::get('transaksi/{trxNumber}/export/pdf','TransaksiController@exportPdf')->name('trx.pdf');

    Route::get('change_password','LoginController@changePassword')->name('change.password');
    Route::post('update_password','LoginController@updatePassword')->name('update.password');
});

Route::get('test/email', 'TestingoCntroller@mail');











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
