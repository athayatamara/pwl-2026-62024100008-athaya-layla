<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;

Route::resource('pasien', PatientController::class);

Route::get('/dokter', [DoctorController::class, 'index'])
    ->name('dokter.index');

Route::resource('poli', PoliController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/jadwal', [ScheduleController::class, 'index'])
    ->name('jadwal.index');

Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);
