<?php

use App\Http\Controllers\LoginRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkpController;  

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');
    // Route::post('/auth/register', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
    
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    Route::get('/pages/admin/dashboard', [AdminController::class, 'dashboard'])->name('pages.admin.dashboard');
    Route::get('/pages/admin/daftardosen', [AdminController::class, 'daftarDosen'])->name('pages.admin.daftarDosen');
    Route::get('/pages/admin/arsipdokumen', [AdminController::class, 'arsipDokumen'])->name('pages.admin.arsipDokumen');
    Route::get('/pages/admin/tambahperiode', [AdminController::class, 'tambahPeriode'])->name('periode.create');
    Route::post('/pages/admin/tambahperiode', [AdminController::class, 'storePeriode'])->name('periode.store');
});

Route::group(['middleware' => ['auth', 'checklevel:dosen']], function () {
    Route::get('/pages/dosen/rencana/{periodeId}', [DosenController::class, 'rencana'])->name('pages.dosen.rencana');
    Route::get('/pages/dosen/dashboard', [DosenController::class, 'dashboard'])->name('pages.dosen.dashboard');
    
    Route::get('/pages/dosen/arsipdokumen', [DosenController::class, 'arsip'])->name('pages.dosen.arsipdokumen');
    Route::get('/pages/dosen/realisasi', [DosenController::class, 'realisasi'])->name('pages.dosen.realisasi');

    Route::post('/rencana_utama', [SkpController::class, 'storeutama'])->name('rencana_utama.store');
    Route::put('/rencana_utama/{id}', [SkpController::class, 'updateutama'])->name('rencana_utama.update');
 
    Route::post('/rencana_prilaku/store', [SkpController::class, 'storeprilaku'])->name('rencana_prilaku.store');
    Route::put('/rencana_prilaku/{id}', [SkpController::class, 'updateprilaku'])->name('rencana_prilaku.update');
    
    Route::post('/pengajuan', [DosenController::class, 'ajukan'])->name('pengajuanrencana.ajukan');
    Route::delete('/pengajuan/{id}', [DosenController::class, 'batalkan'])->name('pengajuanrencana.batalkan');

    Route::get('/pages/dosen/skp', [DosenController::class, 'skp'])->name('pages.dosen.skp');
    Route::get('/pages/dosen/profil', [DosenController::class, 'profil'])->name('pages.dosen.profil');
    Route::get('/dosen/profil/{id}/edit', [DosenController::class, 'edit'])->name('profil.edit');
    Route::put('/dosen/profil/{id}', [DosenController::class, 'update'])->name('profil.update');     
}); 

Route::group(['middleware' => ['auth', 'checklevel:atasan']], function () {
    Route::get('/pages/atasan/dashboard', [AtasanController::class, 'dashboard'])->name('pages.atasan.dashboard');
});     

