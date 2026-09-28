<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PoliController;

Route::get('/pasien', [PatientController::class, 'index']);

Route::get('/pasien/{id}', [PatientController::class, 'show']);

Route::get('/dokter', [DoctorController::class, 'index'])->name('dokter.index');

Route::get('/poli', [PoliController::class, 'index'])->name('poli.index');