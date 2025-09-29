<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SchollController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;

Route::get('/', [SchollController::class,'index']);

Route::middleware(['admin'])->group(function () {
    //admmin
    Route::get('/admin', [UserController::class,'index'])->name('admin');
    Route::get('/admin/profile/edit{id}', [SchollController::class,'editsch'])->name('editsch');
    Route::post('/admin/profile/edit{id}', [SchollController::class,'postsch'])->name('postsch');
    
    //guru
    Route::get('/admin/guru',[GuruController::class,'guru'])->name('guru');
    Route::get('/admin/guru/tambah',[GuruController::class,'addgr'])->name('addgr');
    Route::post('/admin/guru/tambah',[GuruController::class,'grPost'])->name('grPost');
    Route::get('/admin/guru/edit/{id}',[GuruController::class,'editgr'])->name('editgr');
    Route::post('/admin/guru/edit/{id}',[GuruController::class,'grUpdate'])->name('grUpdate');
    Route::get('/admin/guru/delete/{id}',[GuruController::class,'grDelete'])->name('grDelete');
    
    //siswa
    Route::get('/admin/siswa',[SiswaController::class,'siswa'])->name('siswa');
    Route::get('/admin/siswa/tambah',[SiswaController::class,'addsis'])->name('addsis');
    Route::post('/admin/siswa/tambah',[SiswaController::class,'sisPost'])->name('sisPost');
    Route::get('/admin/siswa/edit/{id}',[SiswaController::class,'editsis'])->name('sisEdit');
    Route::post('/admin/siswa/edit/{id}',[SiswaController::class,'sisUpdate'])->name('sisUpdate');
    Route::get('/admin/siswa/delete/{id}',[SiswaController::class,'sisDelete'])->name('sisDelete');
    
});
Route::middleware(['operator'])->group(function () {
    //operator
    Route::get('/operator', [UserController::class,'operator'])->name('operator');
    
    //berita
    Route::get('/operator/berita', [BeritaController::class,'berita'])->name('berita');
    
    //galeri
    Route::get('/operator/galeri', [GaleriController::class,'galeri'])->name('galeri');
    
    //ekstra
    Route::get('/operator/ekstra', [EkskulController::class,'Ekskul'])->name('ekskul');
});
Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login/auth',[UserController::class,'auth'])->name('authLogin');
Route::get('/logout',[UserController::class,'logout'])->name('authlogout');