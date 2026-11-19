<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

// Route Login (bisa diakses tanpa login)
Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

// Route yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

        // Manajemen User (khusus Admin)
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');
    });

        // Pemeriksaan (khusus Dokter)
    Route::middleware(['role:doctor'])->group(function () {
        Route::get('/pemeriksaan', function () {
            return view('pemeriksaan.index');
        })->name('pemeriksaan.index');
});
    // Data Pasien (Admin dan Petugas Pendaftaran)
Route::middleware(['role:admin,registration'])->group(function () {
    Route::resource('pasien', PatientController::class);
});

    // Data Dokter
    Route::resource('dokter', DoctorController::class);

    // Data Poli
    Route::resource('poli', PoliController::class);

    // Registrasi
    Route::resource('registrasi', RegistrationController::class)
        ->only(['index', 'create', 'store']);

    // Jadwal
    Route::get('/jadwal', [ScheduleController::class, 'index'])
        ->name('jadwal.index');

    Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
