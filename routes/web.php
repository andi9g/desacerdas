<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', "umumC@index");
Route::get('baca/{idpojok}', "umumC@baca");
Route::get('profil', "umumC@profil");
Route::post('/pesan', "umumC@komentar")->name('komentar');
Route::get('/e-sertifikat', "umumC@sertifikat");
Route::post('download/{idsertifikat}/sertifikat', "umumC@download")->name("download.sertifikat");
Route::get("dokumentasi", "umumC@galeri");

// Route::get('pdf', 'startController@pdf');

// Route::get('siswa/export/', 'startController@export');

// Auth::routes();

Route::get("login", "Auth\LoginController@showLoginForm")->name("login");
Route::post("login", "Auth\LoginController@login");

Route::middleware(['auth'])->group(function () {
   Route::post("logout", "Auth\LoginController@logout")->name("logout");
   
   Route::get('/home', "HomeController@index")->name('home');
   Route::resource("bukutamu", "bukutamuC");
   Route::resource("sertifikat", "sertifikatC");
   Route::resource("pojok", "pojokC");
   Route::get("komentar", "komentarC@index");
   
   Route::get("konten/{idpojok}", "pojokC@konten")->name("pojok.konten");
   Route::post("konten/pojok/tambah", "pojokC@tambahkonten")->name("tambah.konten");
   Route::put("konten/ubah/{idkonten}", "pojokC@ubahkonten")->name("ubah.konten");
   Route::delete("konten/hapus/{idkonten}", "pojokC@hapuskonten")->name("hapus.konten");

   //galeri
   Route::resource('galeri', "galeriC");
    
});





