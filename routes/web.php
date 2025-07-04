<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AssetMutationController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HarddiskController;
use App\Http\Controllers\JavaScriptController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KondisiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfinsiController;
use App\Http\Controllers\ProsesorController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\SosmedDetailController;
use App\Http\Controllers\SosmedDetailLoginController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TipeMutasiController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

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


Route::resource('subcont', VendorController::class);
Route::resource('pelanggan', PelangganController::class);
Route::get('/get-customer-pic/{id}', [PelangganController::class, 'getCustomerPic'])->name('get.customer.pic');


Route::resource('negara', NegaraController::class);
Route::resource('profinsi', ProfinsiController::class);
Route::resource('kota', KotaController::class);




Route::resource('lokasi', LokasiController::class);
Route::resource('kondisi', KondisiController::class);
Route::resource('tipemutasi', TipeMutasiController::class);



Route::resource('bagian', BagianController::class);

Route::resource('tagihan', TagihanController::class);

Route::resource('tipe-mutasi', TipeMutasiController::class);


Route::resource('asset-mutasi', AssetMutationController::class);


Route::get('/get-barang-details/{id}', [AjaxController::class, 'getBarangDetails'])->name('barang.details');

Route::get('/get-barang-mutasi/{id}', [AjaxController::class, 'getBarangMutasi'])->name('mutasi.barang.detail');



// Route::get('/get-customer-pic/{id}', [JavaScriptController::class, 'fetchPelanggan'])->name('get.customer.pic');
// get pelanggam
Route::get('/get-customer-pic/{id}', [JavaScriptController::class, 'fetchPelanggan']);
// get vendor
Route::get('/get-vendor-pic/{id}', [JavaScriptController::class, 'fetchVendor']);




