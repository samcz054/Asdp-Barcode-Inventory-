<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\DashboardController@index');
    // Route::resource('/users', 'Admin\UserController');
    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/destroy', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');

    // Gudang Routes
    Route::get('/gudang', [App\Http\Controllers\Admin\GudangController::class, 'index'])->name('gudang.index');
    Route::get('/gudang/create', [App\Http\Controllers\Admin\GudangController::class, 'create'])->name('gudang.create');
    Route::get('/gudang/{id}/edit', [App\Http\Controllers\Admin\GudangController::class, 'edit'])->name('gudang.edit');
    Route::post('/gudang/store', [App\Http\Controllers\Admin\GudangController::class, 'store'])->name('gudang.store');
    Route::put('/gudang/{id}/update', [App\Http\Controllers\Admin\GudangController::class, 'update'])->name('gudang.update');
    Route::post('/gudang/destroy', [App\Http\Controllers\Admin\GudangController::class, 'destroy'])->name('gudang.destroy');

    // Stock Routes
    Route::get('/gudang/{id}/stock',[App\Http\Controllers\Admin\StockController::class, 'index'])->name('stock.index');
    Route::get('/stock/{id}',[App\Http\Controllers\Admin\StockController::class, 'destroy'])->name('stock.destroy');
    Route::get('/stock/{id}/cetak',[App\Http\Controllers\Admin\StockController::class, 'show'])->name('stock.show');
    Route::post('/stock/store', [App\Http\Controllers\Admin\StockController::class, 'store'])->name('stock.store');
    Route::post('/stock/destroy/', [App\Http\Controllers\Admin\StockController::class, 'destroy'])->name('stock.destroy');
    
    Route::get('/peminjaman', [App\Http\Controllers\Admin\PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/create', [App\Http\Controllers\Admin\PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman/store', [App\Http\Controllers\Admin\PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::post('/peminjaman/destroy', [App\Http\Controllers\Admin\PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

    // Log transaksi
    Route::get('/log/stokBaru',[App\Http\Controllers\Admin\LogController::class, 'logStok'])->name('logStok.index');
    Route::get('/log/peminjaman',[App\Http\Controllers\Admin\LogController::class, 'logPeminjaman'])->name('logPeminjaman.index');
    Route::get('/log/pengembalian',[App\Http\Controllers\Admin\LogController::class, 'logPengembalian'])->name('logPengembalian.index');

    // Export log
    Route::get('file-export-stokBaru', [App\Http\Controllers\Admin\LogController::class, 'fileExportStokBaru'])->name('file-ExportStokBaru');
    Route::get('file-export-peminjaman', [App\Http\Controllers\Admin\LogController::class, 'fileExportPeminjaman'])->name('file-ExportPeminjaman');
    Route::get('file-export-pengembalian', [App\Http\Controllers\Admin\LogController::class, 'fileExportPengembalian'])->name('file-ExportPengembalian');

});
