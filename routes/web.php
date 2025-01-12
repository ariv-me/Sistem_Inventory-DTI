<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::get('post',[HomeController::class,'post'])->middleware(('auth'),('admin'));

Route::get('/ManajemenItem', [BarangController::class, 'index'])->name('barang');
Route::get('/tambahBarang', [BarangController::class, 'tambahBarang'])->name('tambahBarang');
// Route::post('/insertBarang', [BarangController::class, 'insertBarang'])->name('insertBarang');
Route::post('/insertBarang', [BarangController::class, 'store'])->name('store');
Route::get('/tampilBarang/{SN}', [BarangController::class, 'tampilBarang'])->name('tampilBarang');
Route::post('/updateBarang/{SN}', [BarangController::class, 'updateBarang'])->name('updateBarang');
Route::get('/hapusBarang/{SN}', [BarangController::class, 'hapusBarang'])->name('hapusBarang');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
