<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\fasilitasController;
use App\Http\Controllers\potensiController;
use App\Http\Controllers\bansosController;
use App\Http\Controllers\kelompoktaniController;
use App\Http\Controllers\pendudukController;



// ROUTE USER PUBLIK
Route::prefix('/')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/fasilitas', [UserController::class, 'fasilitas'])->name('user.fasilitas');
    Route::get('/potensi', [UserController::class, 'potensi'])->name('user.potensi');
    Route::get('/penduduk', [UserController::class, 'penduduk'])->name('user.penduduk');
    Route::get('/bansos', [UserController::class, 'bansos'])->name('user.bansos');
    Route::get('/kelompoktani', [UserController::class, 'kelompoktani'])->name('user.kelompoktani');
    Route::get('/webgis', [UserController::class, 'administrasi'])->name('user.administrasi');
    Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
    Route::get('/detail/{id}', [UserController::class, 'detail'])->name('user.detail');
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
});

// ROUTE LOGIN dan LOGOUT
// Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin1', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ROUTE ADMIN (dengan middleware auth)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.admin');


    // CRUD Admin
    Route::get('/tambahadmin', [AdminAccountController::class, 'tambahadmin'])->name('admin.tambahadmin');
    Route::post('/simpanadmin', [AdminAccountController::class, 'simpanadmin'])->name('admin.simpanadmin');
    Route::delete('/admin/{id}', [AdminController::class, 'hapusadmin'])->name('admin.hapus');
    Route::get('/editadmin/{id}', [AdminAccountController::class, 'editadmin'])->name('admin.editadmin');
    Route::put('/editadmin/{id}', [AdminAccountController::class, 'update'])->name('admin.updateadmin');



    Route::get('/fasilitas', [fasilitasController::class, 'index'])->name('admin.fasilitas');
    Route::get('/fasilitas/tambah', [fasilitasController::class, 'create'])->name('admin.fasilitas.tambah');
    Route::post('/fasilitas/simpan', [fasilitasController::class, 'store'])->name('admin.fasilitas.simpan');
    Route::get('/fasilitas/edit/{id}', [fasilitasController::class, 'edit'])->name('admin.fasilitas.edit');
    Route::put('/fasilitas/update/{id}', [fasilitasController::class, 'update'])->name('admin.fasilitas.update');
    Route::delete('/fasilitas/hapus/{id}', [fasilitasController::class, 'destroy'])->name('admin.fasilitas.hapus');

    Route::get('/potensi', [potensiController::class, 'index'])->name('admin.potensi');
    Route::get('/potensi/tambah', [potensiController::class, 'create'])->name('admin.potensi.tambah');
    Route::post('/potensi/simpan', [potensiController::class, 'store'])->name('admin.potensi.simpan');
    Route::get('/potensi/edit/{id}', [potensiController::class, 'edit'])->name('admin.potensi.edit');
    Route::put('/potensi/update/{id}', [potensiController::class, 'update'])->name('admin.potensi.update');
    Route::delete('/potensi/hapus/{id}', [potensiController::class, 'destroy'])->name('admin.potensi.hapus');

    Route::get('/bansos', [bansosController::class, 'index'])->name('admin.bansos');
    Route::get('/bansos/tambah', [bansosController::class, 'create'])->name('admin.bansos.tambah');
    Route::post('/bansos/simpan', [bansosController::class, 'store'])->name('admin.bansos.simpan');
    Route::get('/bansos/edit/{id}', [bansosController::class, 'edit'])->name('admin.bansos.edit');
    Route::put('/bansos/update/{id}', [bansosController::class, 'update'])->name('admin.bansos.update');
    Route::delete('/bansos/hapus/{id}', [bansosController::class, 'destroy'])->name('admin.bansos.hapus');
   
    Route::get('/kelompoktani', [kelompoktaniController::class, 'index'])->name('admin.kelompoktani');
    Route::get('/kelompoktani/tambah', [kelompoktaniController::class, 'create'])->name('admin.kelompoktani.tambah');
    Route::post('/kelompoktani/simpan', [kelompoktaniController::class, 'store'])->name('admin.kelompoktani.simpan');
    Route::get('/kelompoktani/edit/{id}', [kelompoktaniController::class, 'edit'])->name('admin.kelompoktani.edit');
    Route::put('/kelompoktani/update/{id}', [kelompoktaniController::class, 'update'])->name('admin.kelompoktani.update');
    Route::delete('/kelompoktani/hapus/{id}', [kelompoktaniController::class, 'destroy'])->name('admin.kelompoktani.hapus');
   
    Route::get('/penduduk', [pendudukController::class, 'index'])->name('admin.penduduk');
    Route::get('/penduduk/tambah', [pendudukController::class, 'create'])->name('admin.penduduk.tambah');
    Route::post('/penduduk/simpan', [pendudukController::class, 'store'])->name('admin.penduduk.simpan');
    Route::get('/penduduk/edit/{id}', [pendudukController::class, 'edit'])->name('admin.penduduk.edit');
    Route::put('/penduduk/update/{id}', [pendudukController::class, 'update'])->name('admin.penduduk.update');
    Route::delete('/penduduk/hapus/{id}', [pendudukController::class, 'destroy'])->name('admin.penduduk.hapus');
    });

