<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ReferensiTahunController;
use App\Http\Controllers\StatusAlumniController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidasiAlumniController;
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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/store-login', [UserController::class, 'storeLogin']);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/store-register', [UserController::class, 'storeRegister']);

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return view('app.dashboard');
    });

    // * Profil (Admin & Alumni)
    Route::get('/profil/{id}', [ProfilController::class, 'profil']);
    Route::post('/store-update-profile/{id}', [ProfilController::class, 'storeUpdateProfil']);
    Route::get('/update-foto-profil/{id}', [ProfilController::class, 'updateFotoProfil']);
    Route::post('/store-update-foto-profile/{id}', [ProfilController::class, 'addFotoProfil']);

    // * Manajamen Alumni (Admin)
    Route::get('/validasi-alumni', [ValidasiAlumniController::class, 'validasiAlumni']);
    Route::get('/approve-validasi-alumni/{id}', [ValidasiAlumniController::class, 'approveValidasiAlumni']);
    Route::get('/view-validasi-alumni/{id}', [ValidasiAlumniController::class, 'viewValidasiAlumni']);
    Route::post('/store-komen-validasi-alumni/{id}', [ValidasiAlumniController::class, 'storeKomenValidasiAlumni']);

    // * Referensi Tahun (Admin)
    Route::get('/referensi-tahun', [ReferensiTahunController::class, 'referensiTahun']);
    Route::get('/add-referensi-tahun', [ReferensiTahunController::class, 'addReferensiTahun']);
    Route::post('/store-referensi-tahun', [ReferensiTahunController::class, 'storeReferensiTahun']);
    Route::get('/delete-referensi-tahun/{id}', [ReferensiTahunController::class, 'deleteReferensiTahun']);

    // * Status Alumni (Alumni)
    Route::get('/status-alumni', [StatusAlumniController::class, 'statusAlumni']);
    Route::post('/status-alumni-tidak-bekerja/{id}', [StatusAlumniController::class, 'tidakBekerja']);
    Route::get('/form-lanjut-study', [StatusAlumniController::class, 'formLanjutStudy']);
    Route::post('/store-lanjut-study/{id}', [StatusAlumniController::class, 'storeLanjutStudy']);
    Route::get('/form-lanjut-bekerja', [StatusAlumniController::class, 'formLanjutBekerja']);
    Route::post('/store-lanjut-bekerja/{id}', [StatusAlumniController::class, 'storeLanjutBekerja']);

    // * Riwayat Status Alumni (Alumni)
    Route::get('/riwayat-lanjut-study', [StatusAlumniController::class, 'riwayatLanjutStudy']);
    Route::get('/riwayat-bekerja', [StatusAlumniController::class, 'riwayatBekerja']);

    Route::get('logout', [UserController::class, 'logout']);
});
