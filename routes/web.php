<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JenisContactController;
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





//admin


Route::middleware('auth')->group(function () {

    Route::resource('masterdashboard', DashboardController::class);

    Route::get('mastersiswa/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('mastersiswa.hapus');

    Route::resource('mastersiswa', SiswaController::class)->middleware('auth');

    Route::get('masterproject/create/{id_siswa}', [ProjectController::class, 'tambah'])->name('masterproject.tambah');

    Route::get('masterproject/{id_siswa}/hapus', [ProjectController::class, 'hapus'])->name('masterproject.hapus');

    Route::resource('masterproject', ProjectController::class);

    Route::resource('mastercontact', ContactController::class);

    Route::get('mastercontact/create/{id_siswa}', [ContactController::class, 'tambah'])->name('mastercontact.tambah');

    Route::get('mastercontact/{id_siswa}/hapus', [ContactController::class, 'hapus'])->name('mastercontact.hapus');

    Route::resource('JenisContact', JenisContactController::class);

    Route::get('JenisContact/{id_siswa}/hapus', [JenisContactController::class, 'hapus'])->name('JenisContact.hapus');

    Route::post('logout', [LoginController::class, 'logout']);


    Route::get('/admin', function () {
        return view('layout.admin');
    });
});

//guest

Route::middleware('guest')->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');

    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/projects', function () {
        return view('projects');
    });

    Route::get('/contact', function () {
        return view('contact');
    });
});
