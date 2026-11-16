<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersediaanController;

Route::get('/', [PersediaanController::class, 'index'])->name('persediaan.index');
Route::get('/barang', [PersediaanController::class, 'daftar'])->name('persediaan.daftar');
Route::get('/barang/kategori/{kategori}', [PersediaanController::class, 'kategori'])->name('persediaan.kategori');
Route::get('/barang/detail/{kode}', [PersediaanController::class, 'detail'])->name('persediaan.detail');
Route::get('/analisis', [PersediaanController::class, 'analisis'])->name('persediaan.analisis');
Route::get('/rekomendasi', [PersediaanController::class, 'rekomendasi'])->name('persediaan.rekomendasi');
