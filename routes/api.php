<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//--------------------------------------------------------------------------
//Pengelola
Route::get('/pengelola','PengelolaApicontroller@index');
Route::post('/pengelola','PengelolaApicontroller@insert');
Route::put('/pengelola/{id}','PengelolaApicontroller@update');
Route::delete('/pengelola/{id}','PengelolaApicontroller@delete');
//--------------------------------------------------------------------------
//Pengguna
Route::get('/pengguna','PenggunaApicontroller@index');
Route::get('/pengguna/{id_pengguna}','PenggunaApicontroller@indexk');
Route::post('/pengguna','PenggunaApicontroller@insert');
Route::put('/pengguna/{id_pengguna}','PenggunaApicontroller@update');
Route::delete('/pengguna/{id_pengguna}','PenggunaApicontroller@delete');
//--------------------------------------------------------------------------
//Wisata
Route::get('/wisata','WisataApicontroller@index');
Route::post('/wisata','WisataApicontroller@insert');
Route::put('/wisata/{id_code}','WisataApicontroller@update');
Route::delete('/wisata/{id_code}','WisataApicontroller@delete');
//--------------------------------------------------------------------------
//Transaksi
Route::get('/transaksi','TransaksiApicontroller@index');
Route::get('/akses/{id}','TransaksiApicontroller@akses');
Route::get('/transaksi/{id_transaksi}','TransaksiApicontroller@indexk');
Route::post('/transaksi','TransaksiApicontroller@insert');
Route::put('/transaksi/{id_transaksi}','TransaksiApicontroller@update');
Route::put('/akses/{id}','TransaksiApicontroller@aksesk');
Route::delete('/transaksi/{id_transaksi}','TransaksiApicontroller@delete');


