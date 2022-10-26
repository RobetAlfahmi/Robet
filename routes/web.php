<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\kontakController;
use App\Http\Controllers\loginController;

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

//------------------------------------------------------------------------
// route::get('/dashboard', function () {
//     return view('dashboard');
// });

// route::get('/masterproject', function () {
//     return view('masterproject');
// });

// route::get('/masterkontak', function () {
//     return view('masterkontak');
// });

// route::get('/mastersiswa', function () {
//     return view('mastersiswa');
// });
//---------------------------------------------------------------------------

//Middleware;)
Route::middleware('guest')->group(function(){
    Route::get('login', [loginController::class, 'index'])->name('login');
    Route::post('login', [loginController::class, 'authenticate']);
    Route::get('/', function (){return view('home');});
    Route::get('/admin', function () {return view('layout.admin');});
    Route::get('/about', function () {return view('about');});
    Route::get('/project', function () {return view('project');});
    Route::get('/contact', function () {return view('contact');});
});

//Controlers Route;)
Route::middleware('auth')->group(function(){
    Route::resource('dashboard', DasboardController::class);
    Route::resource('mastersiswa', siswaController::class);
    Route::resource('masterproject', projectController::class);
    Route::resource('masterkontak', kontakController::class);
    Route::post('masterkontak/tambah',[kontakController::class, 'tambah']);
    Route::get('mastersiswa/{id_siswa}/hapus',[siswaController::class, 'hapus'])->name('mastersiswa.hapus');
    Route::get('masterproject/create/{id_siswa}', [projectController::class, 'tambah'])->name('masterproject.tambah');
    Route::get('masterproject/edit/{id_siswa}', [projectController::class, 'edit']);
    Route::get('masterkontak/create/{id_siswa}', [kontakController::class, 'create']);
    Route::post('masterkontak/store/{id_siswa}', [kontakController::class, 'store']);
    Route::post('logout', [loginController::class, 'logout']);
});
