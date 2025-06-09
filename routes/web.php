<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HarddiskController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProsesorController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\SosmedDetailController;
use App\Http\Controllers\SosmedDetailLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('kategori', KategoriController::class);
Route::resource('barang', BarangController::class);
Route::resource('barang.harddisk', HarddiskController::class);
Route::resource('barang.ram', RamController::class);
Route::resource('barang.prosesor', ProsesorController::class);


Route::resource('sosmed', SosmedController::class);
Route::resource('sosmed.detail', SosmedDetailController::class);
Route::resource('sosmed', SosmedController::class);
Route::resource('sosmed.detail.login', SosmedDetailLoginController::class);
