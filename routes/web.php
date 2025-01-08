<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/barang/{id}/add-quantity-in', [BarangController::class, 'addQuantityIn'])->name('barang.addQuantityIn');
Route::post('/barang/{id}/store-quantity-in', [BarangController::class, 'storeQuantityIn'])->name('barang.storeQuantityIn');

Route::get('/barang/{id}/add-quantity-out', [BarangController::class, 'addQuantityOut'])->name('barang.addQuantityOut');
Route::post('/barang/{id}/store-quantity-out', [BarangController::class, 'storeQuantityOut'])->name('barang.storeQuantityOut');


Route::resource('/barang', BarangController::class);

Route::get("/", function () {
    return redirect("/barang");
 });
