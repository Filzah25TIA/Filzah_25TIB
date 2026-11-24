<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckIsLogin;
use App\Http\Middleware\CheckRole;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index']);


Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('checkislogin');

Route::resource('pelanggan', PelangganController::class);

Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update');

Route::resource('cv', CvController::class);



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');

Route::middleware(['checkislogin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Hanya Super Admin yang bisa mengakses halaman user
    Route::middleware(['checkrole:Super Admin'])->group(function () {
        Route::resource('user', UserController::class);
    });

    // Super Admin dan Mitra bisa mengakses halaman pelanggan
    Route::middleware(['checkrole:Super Admin,Mitra'])->group(function () {
        Route::resource('pelanggan', PelangganController::class);
    });
});

Route::group(['middleware' => ['checkrole:Super Admin']], function () {
    Route::resource('user', UserController::class);
});
