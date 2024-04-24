<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiMahasiswaController;

// Route untuk menampilkan semua nilai mahasiswa
Route::get('/nilai-mahasiswa', [NilaiMahasiswaController::class, 'index']);
Route::get('/nilai-mahasiswa/{nim}', [NilaiMahasiswaController::class, 'show']);
Route::post('/nilai-mahasiswa/{nim}', [NilaiMahasiswaController::class, 'store']);
Route::put('/nilai-mahasiswa/{nim}/{kode_mk}', [NilaiMahasiswaController::class, 'update']);
Route::delete('/nilai-mahasiswa/{nim}/{kode_mk}', [NilaiMahasiswaController::class, 'destroy']);