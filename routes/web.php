<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\RegistrationController;

Route::resource('pasien', PatientController::class);

Route::resource('dokter', DoctorController::class);

Route::resource('poli', PoliController::class);

Route::resource('registrasi', RegistrationController::class)
    ->only(['index', 'create', 'store']);
    
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/jadwal', [ScheduleController::class, 'index'])
    ->name('jadwal.index');

Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);
