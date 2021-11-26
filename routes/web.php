<?php

use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\Backend\AsetController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\ProjectController;
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


Route::middleware(['belum_login'])->group(function () {
    Route::get('/','App\Http\Controllers\Backend\PenggunaController@indexExt')->name('login');
    Route::get('/login','App\Http\Controllers\Backend\PenggunaController@indexExt');
    Route::post('aksilogin','App\Http\Controllers\Backend\PenggunaController@aksilogin')->name('login-admin');
    Route::post('/register-user','App\Http\Controllers\Backend\PenggunaController@aksiregister')->name('saveuser');
    Route::get('register','App\Http\Controllers\Backend\PenggunaController@register')->name('register');
});

Route::middleware(['sudah_login'])->group(function () {
    Route::get('logout','App\Http\Controllers\Backend\PenggunaController@logout')->name('logout');
    Route::get('home','App\Http\Controllers\Backend\HomeController@index')->name('home');
    Route::post('carinilai', 'App\Http\Controllers\Backend\HomeController@cariNilai')->name('nilai.cari');

    //Pengguna
    Route::get('/pengguna','App\Http\Controllers\Backend\PenggunaController@index')->name('pengguna');
    Route::get('/pengguna/create','App\Http\Controllers\Backend\PenggunaController@create')->name('pengguna.create');
    Route::post('/pengguna','App\Http\Controllers\Backend\PenggunaController@store')->name('pengguna.store');
    Route::get('/pengguna/{pengguna}','App\Http\Controllers\Backend\PenggunaController@edit')->name('pengguna.edit');
    Route::put('/pengguna/{pengguna}','App\Http\Controllers\Backend\PenggunaController@update')->name('pengguna.update');
    Route::get('/pengguna/delete/{pengguna}','App\Http\Controllers\Backend\PenggunaController@destroy')->name('pengguna.delete');

    //Aset
    Route::get('/aset',[AsetController::class, 'index'])->name('aset');
    Route::get('/aset/create',[AsetController::class, 'create'])->name('aset.create');
    Route::post('/aset',[AsetController::class, 'store'])->name('aset.store');
    Route::get('/aset/{aset}',[AsetController::class, 'edit'])->name('aset.edit');
    Route::put('/aset/{aset}',[AsetController::class, 'update'])->name('aset.update');
    Route::get('/aset/delete/{aset}',[AsetController::class, 'destroy'])->name('aset.delete');

    // Kategori
    Route::get('/kategori',[KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/create/{id}',[KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori',[KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}',[KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{kategori}',[KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/delete/{kategori}',[KategoriController::class, 'destroy'])->name('kategori.delete');

    // Project
    Route::get('/project',[ProjectController::class, 'index'])->name('project');
    Route::get('/project/create/{id}',[ProjectController::class, 'create'])->name('project.create');
    Route::post('/project',[ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{project}',[ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{project}',[ProjectController::class, 'update'])->name('project.update');
    Route::get('/project/delete/{project}',[ProjectController::class, 'destroy'])->name('project.delete');

    //Aset
    Route::get('/aset',[AsetController::class, 'index'])->name('aset');
    Route::get('/aset/create/{id}',[AsetController::class, 'create'])->name('aset.create');
    Route::post('/aset',[AsetController::class, 'store'])->name('aset.store');
    Route::get('/aset/{aset}',[AsetController::class, 'edit'])->name('aset.edit');
    Route::put('/aset/{aset}',[AsetController::class, 'update'])->name('aset.update');
    Route::get('/aset/delete/{aset}',[AsetController::class, 'destroy'])->name('aset.delete');

});

