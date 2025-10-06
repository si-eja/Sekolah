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

Route::get('/', [SchollController::class,'index'])->name('home');
Route::get('/semua/berita', [SchollController::class,'berita'])->name('beritaS');
Route::get('/semua/ekskul', [SchollController::class,'ekskul'])->name('ekskulS');
Route::get('/profile/{id}', [SchollController::class,'info'])->name('info');
Route::get('/ekskul/{id}', [SchollController::class,'eksInfo'])->name('eksInfo');
Route::get('/berita/{id}', [SchollController::class,'brtInfo'])->name('brtInfo');

Route::middleware(['admin'])->group(function () {
    //admmin
    Route::get('/admin/profile/edit{id}', [SchollController::class,'editsch'])->name('editsch');
    Route::post('/admin/profile/edit{id}', [SchollController::class,'postsch'])->name('postsch');
    
    //user
    Route::get('/admin', [UserController::class,'index'])->name('admin');
    Route::get('/admin/user', [UserController::class,'user'])->name('user');
    Route::get('/admin/user/tambah', [UserController::class,'adduser'])->name('adduser');
    Route::post('/admin/user/tambah', [UserController::class,'userPost'])->name('userPost');
    Route::get('/admin/user/edit/{id}', [UserController::class,'edituser'])->name('edituser');
    Route::post('/admin/user/edit/{id}', [UserController::class,'userUpdate'])->name('userUpdate');
    Route::get('/admin/user/delete/{id}',[SiswaController::class,'userDelete'])->name('userDelete');
    
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
    
    //galeri
    Route::get('/admin/galeri', [GaleriController::class,'galeriA'])->name('galeriA');
    //foto
    Route::get('/admin/galeri/foto', [GaleriController::class,'addftA'])->name('addftA');
    Route::post('/admin/galeri/foto', [GaleriController::class,'ftPostA'])->name('ftPostA');
    //video
    Route::get('/admin/galeri/video', [GaleriController::class,'addvidA'])->name('addvidA');
    Route::post('/admin/galeri/video', [GaleriController::class,'vidPostA'])->name('vidPostA');
    //edit
    Route::get('/admin/galeri/edit/{id}', [GaleriController::class,'editGlrA'])->name('editGlrA');
    Route::post('/admin/galeri/edit/{id}', [GaleriController::class,'glrUpdateA'])->name('glrUpdateA');
    //delete foto/video
    Route::delete('/admin/galeri/delete/file/{id}', [GaleriController::class,'glrDelete'])->name('glrDeleteA');

    //berita
    Route::get('/admin/berita', [BeritaController::class,'beritaA'])->name('beritaA');
    Route::get('/admin/tambah/berita', [BeritaController::class,'addbrtA'])->name('addbrtA');
    Route::post('/admin/post/berita', [BeritaController::class,'brtPostA'])->name('brtPostA');
    Route::get('/admin/edit/berita/{id}', [BeritaController::class,'editbrtA'])->name('editbrtA');
    Route::post('/admin/edit/berita/{id}', [BeritaController::class,'brtUpdateA'])->name('brtUpdateA');
    Route::get('/admin/delete/berita/{id}', [BeritaController::class,'brtDelete'])->name('brtDeleteA');

    //ekskul
    Route::get('/admin/ekstra', [EkskulController::class,'EkskulA'])->name('ekskulA');
    Route::get('/admin/tambah/ekstra', [EkskulController::class,'addeksA'])->name('addeksA');
    Route::post('/admin/tambah/ekstra', [EkskulController::class,'eksPostA'])->name('eksPostA');
    Route::get('/admin/edit/ekstra/{id}', [EkskulController::class,'editEksA'])->name('editEksA');
    Route::post('/admin/edit/ekstra/{id}', [EkskulController::class,'eksUpdateA'])->name('eksUpdateA');
    Route::get('/admin/delete/ekstra/{id}', [EkskulController::class,'eksDelete'])->name('eksDeleteA');
});
Route::middleware(['operator'])->group(function () {
    //operator
    Route::get('/operator', [UserController::class,'operator'])->name('operator');
    //warga sekolah
    Route::get('/operator/siswa',[SiswaController::class,'siswa'])->name('siswaO');
    Route::get('/operator/guru',[GuruController::class,'guru'])->name('guruO');

    //berita
    Route::get('/operator/berita', [BeritaController::class,'berita'])->name('berita');
    Route::get('/operator/tambah/berita', [BeritaController::class,'addbrt'])->name('addbrt');
    Route::post('/operator/post/berita', [BeritaController::class,'brtPost'])->name('brtPost');
    Route::get('/operator/edit/berita/{id}', [BeritaController::class,'editbrt'])->name('editbrt');
    Route::post('/operator/edit/berita/{id}', [BeritaController::class,'brtUpdate'])->name('brtUpdate');
    Route::get('/operator/delete/berita/{id}', [BeritaController::class,'brtDelete'])->name('brtDelete');
    
    //galeri
    Route::get('/operator/galeri', [GaleriController::class,'galeri'])->name('galeri');
    //foto
    Route::get('/operator/galeri/foto', [GaleriController::class,'addft'])->name('addft');
    Route::post('/operator/galeri/foto', [GaleriController::class,'ftPost'])->name('ftPost');
    //video
    Route::get('/operator/galeri/video', [GaleriController::class,'addvid'])->name('addvid');
    Route::post('/operator/galeri/video', [GaleriController::class,'vidPost'])->name('vidPost');
    //edit
    Route::get('/operator/galeri/edit/{id}', [GaleriController::class,'editGlr'])->name('editGlr');
    Route::post('/operator/galeri/edit/{id}', [GaleriController::class,'glrUpdate'])->name('glrUpdate');
    //Delete from galeri
    Route::delete('/operator/galeri/delete/file/{id}', [GaleriController::class,'glrDelete'])->name('glrDelete');
    
    //ekstra
    Route::get('/operator/ekstra', [EkskulController::class,'Ekskul'])->name('ekskul');
    Route::get('/operator/tambah/ekstra', [EkskulController::class,'addeks'])->name('addeks');
    Route::post('/operator/tambah/ekstra', [EkskulController::class,'eksPost'])->name('eksPost');
    Route::get('/operator/edit/ekstra/{id}', [EkskulController::class,'editEks'])->name('editEks');
    Route::post('/operator/edit/ekstra/{id}', [EkskulController::class,'eksUpdate'])->name('eksUpdate');
    Route::get('/operator/delete/ekstra/{id}', [EkskulController::class,'eksDelete'])->name('eksDelete');
});
Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login/auth',[UserController::class,'auth'])->name('authLogin');
Route::get('/logout',[UserController::class,'logout'])->name('authlogout');