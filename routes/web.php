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

Route::get('/', 'usercontroller@home')->name('home');
Route::get('/detail/{produk}', 'usercontroller@detail')->name('detail');
Route::get('/login', 'usercontroller@login')->name('login');
Route::post('/postlogin', 'usercontroller@postlogin')->name('postlogin');
Route::get('/register', 'usercontroller@register')->name('register');
Route::post('/postregister', 'usercontroller@postregister')->name('postregister');
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', 'usercontroller@logout')->name('logout');
    Route::get('/keranjang', 'usercontroller@keranjang')->name('keranjang');
    Route::get('/delete/{detailtransaksi}', 'usercontroller@delete')->name('delete');
    Route::post('/postkeranjang/{produk}', 'usercontroller@postkeranjang')->name('postkeranjang');
    Route::get('/bayar/{detailtransaksi}', 'usercontroller@bayar')->name('bayar');
    Route::post('/prosesbayar/{detailtransaksi}', 'usercontroller@prosesbayar')->name('prosesbayar');
    Route::get('/summary', 'usercontroller@summary')->name('summary');

    ///////////////////////////////////////////////////////////kelola user
    Route::get('/user', 'admincontroller@user')->name('admin.user');
    Route::get('/tambahuser', 'admincontroller@tambahuser')->name('admin.tambahuser');
    Route::post('/posttambahuser', 'admincontroller@posttambahuser')->name('admin.posttambahuser');
    Route::get('/edituser/{user}', 'admincontroller@edituser')->name('admin.edituser');
    Route::post('/postedituser/{user}', 'admincontroller@postedituser')->name('admin.postedituser');
    Route::get('/deleteuser/{user}', 'admincontroller@deleteuser')->name('admin.deleteuser');
    ///////////////////////////////////////////////////////////kelola produk
    Route::get('/produk', 'admincontroller@produk')->name('admin.produk');
    Route::get('/tambahproduk', 'admincontroller@tambahproduk')->name('admin.tambahproduk');
    Route::post('/posttambahproduk', 'admincontroller@posttambahproduk')->name('admin.posttambahproduk');
    Route::get('/editproduk/{produk}', 'admincontroller@editproduk')->name('admin.editproduk');
    Route::post('/posteditproduk/{produk}', 'admincontroller@posteditproduk')->name('admin.posteditproduk');
    Route::get('/deleteproduk/{produk}', 'admincontroller@deleteproduk')->name('admin.deleteproduk');
    ///////////////////////////////////////////////////////////kelola kategori
    Route::get('/kategori', 'admincontroller@kategori')->name('admin.kategori');
    Route::get('/tambahkategori', 'admincontroller@tambahkategori')->name('admin.tambahkategori');
    Route::post('/posttambahkategori', 'admincontroller@posttambahkategori')->name('admin.posttambahkategori');
    Route::get('/editkategori/{kategori}', 'admincontroller@editkategori')->name('admin.editkategori');
    Route::post('/posteditkategori/{kategori}', 'admincontroller@posteditkategori')->name('admin.posteditkategori');
    Route::get('/deletekategori/{kategori}', 'admincontroller@deletekategori')->name('admin.deletekategori');
     ///////////////////////////////////////////////////////////kelola kategori
     Route::get('/transaksi', 'admincontroller@transaksi')->name('admin.transaksi');
     Route::get('/verifikasi/{detailtransaksi}', 'admincontroller@verifikasi')->name('admin.verifikasi');
});
