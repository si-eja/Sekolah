<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SchollController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;

Route::get('/', [SchollController::class,'index']);

Route::middleware(['admin'])->group(function () {
    //admmin
    Route::get('/admin', [UserController::class,'index'])->name('admin');
    //guru
    Route::get('/guru',[GuruController::class,'guru'])->name('guru');
    Route::get('/guru/tambah',[GuruController::class,'addgr'])->name('addgr');
    //siswa
    Route::get('/siswa',[SiswaController::class,'siswa'])->name('siswa');
    Route::get('/siswa/tambah',[SiswaController::class,'addsis'])->name('addsis');
    
});
Route::middleware(['operator'])->group(function () {
    Route::get('/operator', [UserController::class,'operator'])->name('operator');

});
Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login/auth',[UserController::class,'auth'])->name('authLogin');
Route::get('/logout',[UserController::class,'logout'])->name('authlogout');