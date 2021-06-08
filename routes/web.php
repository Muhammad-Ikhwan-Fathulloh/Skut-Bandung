<?php
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\Registercontroller;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\Pengelolacontroller;
use App\Http\Controllers\Penggunacontroller;
use App\Http\Controllers\Wisatacontroller;
use App\Http\Controllers\Transaksicontroller;
use App\Http\Controllers\Blogcontroller;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//-----------------------------------------------------------------------------
//Login
//Route::get('/',[Logincontroller::class, 'index']);
//Route::get('/',[Logincontroller::class, 'getlogin']);
//Route::post('/login',[Logincontroller::class, 'postlogin'])->name('login');
//Register
//Route::get('/register',[Registercontroller::class, 'index']);
//-----------------------------------------------------------------------------
//Dashboard
Route::get('/dashboard',[Dashboardcontroller::class, 'index'])->name('dashboard');
//-----------------------------------------------------------------------------
//Pengelola
Route::get('/pengelola',[Pengelolacontroller::class, 'index'])->name('pengelola');
Route::get('/pengelola/detail/{id}',[Pengelolacontroller::class, 'detail']);
Route::get('/pengelola/add',[Pengelolacontroller::class, 'add']);
Route::get('/pengelola/search',[Pengelolacontroller::class, 'search']);
Route::post('/pengelola/insert',[Pengelolacontroller::class, 'insert']);
Route::get('/pengelola/edit/{id}',[Pengelolacontroller::class, 'edit']);
Route::post('/pengelola/update/{id}',[Pengelolacontroller::class, 'update']);
Route::get('/pengelola/delete/{id}',[Pengelolacontroller::class, 'delete']);
//-----------------------------------------------------------------------------
//Pengguna
Route::get('/pengguna',[Penggunacontroller::class, 'index'])->name('pengguna');
Route::get('/pengguna/detail/{id_pengguna}',[Penggunacontroller::class, 'detail']);
Route::get('/pengguna/add',[Penggunacontroller::class, 'add']);
Route::get('/pengguna/search',[Penggunacontroller::class, 'search']);
Route::post('/pengguna/insert',[Penggunacontroller::class, 'insert']);
Route::get('/pengguna/edit/{id_pengguna}',[Penggunacontroller::class, 'edit']);
Route::post('/pengguna/update/{id_pengguna}',[Penggunacontroller::class, 'update']);
Route::get('/pengguna/delete/{id_pengguna}',[Penggunacontroller::class, 'delete']);
//-----------------------------------------------------------------------------
//Wisata
Route::get('/wisata',[Wisatacontroller::class, 'index'])->name('wisata');
Route::get('/wisata/detail/{id_code}',[Wisatacontroller::class, 'detail']);
Route::get('/wisata/add',[Wisatacontroller::class, 'add']);
Route::get('/wisata/search',[Wisatacontroller::class, 'search']);
Route::post('/wisata/insert',[Wisatacontroller::class, 'insert']);
Route::get('/wisata/edit/{id_code}',[Wisatacontroller::class, 'edit']);
Route::post('/wisata/update/{id_code}',[Wisatacontroller::class, 'update']);
Route::get('/wisata/delete/{id_code}',[Wisatacontroller::class, 'delete']);
//-----------------------------------------------------------------------------
//Transaksi
Route::get('/transaksi',[Transaksicontroller::class, 'index'])->name('transaksi');
Route::get('/transaksi/detail/{id_transaksi}',[Transaksicontroller::class, 'detail']);
Route::get('/transaksi/add',[Transaksicontroller::class, 'add']);
Route::get('/transaksi/search',[Transaksicontroller::class, 'search']);
Route::post('/transaksi/insert',[Transaksicontroller::class, 'insert']);
Route::get('/transaksi/edit/{id_transaksi}',[Transaksicontroller::class, 'edit']);
Route::post('/transaksi/update/{id_transaksi}',[Transaksicontroller::class, 'update']);
Route::get('/transaksi/delete/{id_transaksi}',[Transaksicontroller::class, 'delete']);
//-----------------------------------------------------------------------------
//Blog
Route::get('/', [Blogcontroller::class, 'indexs'])->name('');
Route::get('/fitur', [Blogcontroller::class, 'index'])->name('fitur');
Route::get('/fitur/detail/{id}',[Blogcontroller::class, 'detail']);
Route::get('/fitur/add',[Blogcontroller::class, 'add']);
//Route::get('/fitur/search',[Blogcontroller::class, 'search']);
Route::get('/profile/search',[Blogcontroller::class, 'searchk']);
Route::post('/fitur/insert',[Blogcontroller::class, 'insert']);
Route::get('/fitur/edit/{id}',[Blogcontroller::class, 'edit']);
Route::post('/fitur/update/{id}',[Blogcontroller::class, 'update']);
Route::get('/fitur/delete/{id}',[Blogcontroller::class, 'delete']);

Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');
