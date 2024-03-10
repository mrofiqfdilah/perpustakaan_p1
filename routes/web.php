<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/petugas', [BukuController::class,'petugas'])->name('petugas.databuku');

Route::get('/home', [BukuController::class,'home'])->name('user.home');


// Authtentication route
Route::get('/halaman_daftar',[AuthController::class, 'halaman_daftar'])->name('halaman_daftar');

Route::get('/halaman_login',[AuthController::class, 'halaman_login'])->name('halaman_login');

Route::post('register',[AuthController::class, 'register'])->name('register');

Route::post('login',[AuthController::class, 'login'])->name('login');


// ADMIN ROLE

// User management admin route
Route::resource('/datauser', UsersController::class);

// Buku management admin route
Route::resource('/databuku', BukuController::class);

// Kategori management admin route
Route::resource('/datakategori', KategoriController::class);




// PEMINJAM ROLE

Route::get('pinjambuku/{judul}', [BukuController::class, 'pinjambuku'])->name('pinjambuku');

Route::post('pinjam', [BukuController::class, 'pinjam'])->name('pinjam');

Route::get('listpinjaman', [BukuController::class, 'listpinjaman'])->name('listpinjaman');

Route::get('koleksipribadi', [BukuController::class, 'koleksipribadi'])->name('koleksipribadi');

Route::post('tambah_koleksi', [BukuController::class, 'tambah_koleksi'])->name('tambah_koleksi');







