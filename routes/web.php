<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InflowController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OutflowController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PermissionMiddleware;
use Illuminate\Support\Facades\Route;

// Halaman utama bisa diakses oleh semua orang tanpa middleware
// Route::get('/', [WelcomeController::class, 'berita']);

// Area Admin

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Middleware hanya untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'index'])->name('home-user');
});

// Middleware hanya untuk pengguna dengan izin "manage users"
Route::middleware(['auth', PermissionMiddleware::class . ':pengguna-lihat'])->group(function () {
    Route::resource('/admin/pengguna', UserController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':pengguna-ubah password'])->group(function () {
    Route::post('/admin/pengguna/ubahpassword({id})', [UserController::class, 'ubahpassword']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':pengguna-hapus'])->group(function () {
    Route::get('/admin/pengguna({id})/hapus', [UserController::class, 'hapus']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':pengguna-akses pengguna'])->group(function () {
    Route::get('/admin/pengguna-akses({id})', [UserController::class, 'akses']);
    Route::post('/admin/pengguna-akses/{id}/update', [UserController::class, 'updateAkses']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':akses pengguna-lihat'])->group(function () {
    Route::resource('/admin/pengguna-akses', PermissionController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':akses pengguna-hapus'])->group(function () {
    Route::get('/admin/pengguna-akses/{id}/hapus', [PermissionController::class, 'destroy']);
});

Route::resource('admin/inflow', InflowController::class);

Route::get('admin/inflow/{inflow}/hapus', [InflowController::class, 'hapus'])->name('inflow.hapus');
Route::get('admin/inflow({id})/hapus', [InflowController::class, 'hapus']);

Route::resource('admin/outflow', OutflowController::class);
Route::get('admin/outflow({id})/hapus', [OutflowController::class, 'destroy'])->name('outflow.hapus');


Route::resource('admin/plan', PlanController::class);


