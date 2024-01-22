<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiC;
use App\Http\Controllers\productsR;
use App\Http\Controllers\UsersR;
use App\Http\Controllers\LoginC;
use App\Http\Controllers\LogC;

Route::get('/', function () {
    $subtittle = "Home Page";
    return view('dashboard', compact('subtittle'));
})->middleware('auth');

Route::get('/dashboard', function () {
    $subtittle = "Home Page";
    return view('dashboard', compact('subtittle'));
})->middleware('auth');

#pdf
Route::get('products/pdf', [productsR::class, 'pdf'])->middleware('userAkses:admin,owner');
Route::get('users/pdf', [UsersR::class, 'pdf'])->middleware('userAkses:admin');
Route::get('transaksi/pdf', [TransaksiC::class, 'pdf'])->middleware('userAkses:kasir,owner');
Route::get('transaksi/pdf2/{id}',  [TransaksiC::class, 'pdf2'])->middleware('userAkses:kasir');
Route::get('pertanggal/{tgl_awal}/{tgl_akhir}', [transaksiC::class, 'pertanggal'])->name('transaksi.pertanggal')->middleware('userAkses:owner');


#products
Route::resource('products', productsR::class)->middleware('userAkses:admin,owner,kasir');

#transaction
Route::get('transaksi/all', [transaksiC::class, 'all'])->name('transactions.all')->middleware('userAkses:owner');
Route::get('transaksi', [TransaksiC::class, 'index'])->name('transaksi.index')->middleware('userAkses:kasir,admin,owner');
Route::get('transaksi/create', [TransaksiC::class, 'create'])->name('transaksi.create')->middleware('userAkses:kasir');
Route::post('transaksi/store', [TransaksiC::class, 'store'])->name('transaksi.store')->middleware('userAkses:kasir');
Route::get('transaksi/edit/{id}', [TransaksiC::class, 'edit'])->name('transaksi.edit')->middleware('userAkses:admin');
Route::put('transaksi/update/{id}', [TransaksiC::class, 'update'])->name('transaksi.update')->middleware('userAkses:admin');
Route::delete('transaksi/delete/{id}', [TransaksiC::class, 'delete'])->name('transaksi.delete')->middleware('userAkses:admin');

#users
Route::resource('users', UsersR::class)->middleware('userAkses:admin');
Route::get('users/create', [UsersR::class, 'create'])->name('users.create')->middleware('userAkses:admin');
Route::get('users/changepassword/{id}', [UsersR::class, 'changepassword'])->name('users.changepassword')->middleware('userAkses:admin');
Route::put('users/change/{id}', [UsersR::class, 'change'])->name('users.change')->middleware('userAkses:admin');

#login
Route::get('login', [LoginC::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginC::class, 'login_action'])->name('login.action')->middleware('guest');

#logout
Route::get('logout', [LoginC::class, 'logout'])->name('logout')->middleware('auth');

#Log
Route::get('log', [LogC::class, 'index'])->name('log.index')->middleware('userAkses:admin');