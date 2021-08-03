<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\StatusTugasController;

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

Route::redirect('/', 'login');

Route::middleware('auth')->group(function(){
    Route::prefix('matapelajaran')->group(function(){
        Route::get('', [MataPelajaranController::class, 'index'])->name('matapelajaran');
        Route::get('create', [MataPelajaranController::class, 'create'])->name('matapelajaranCreate');
        Route::get('{idMatapelajaran}/edit', [MataPelajaranController::class, 'edit'])->name('matapelajaranEdit');
        Route::get('{idMatapelajaran}/detail', [MataPelajaranController::class, 'detail'])->name('matapelajaranDetail');
        
        Route::post('store', [MataPelajaranController::class, 'store'])->name('matapelajaranStore');
        Route::post('{idMatapelajaran}/edit/update', [MataPelajaranController::class, 'update'])->name('matapelajaranUpdate');
        Route::post('delete', [MataPelajaranController::class, 'destroy'])->name('matapelajaranDelete');
        
        Route::prefix('{idMatapelajaran}/tugas')->group(function(){
            Route::get('', [TugasController::class, 'index'])->name('tugas');
            Route::get('view-kalendar', [TugasController::class, 'kalendar_mode'])->name('tugasKalendarMode');
            Route::get('create', [TugasController::class, 'create'])->name('tugasCreate');
            Route::get('{idTugas}/edit', [TugasController::class, 'edit'])->name('tugasEdit');
            Route::get('get/{idStatustugas?}', [TugasController::class, 'get'])->name('getTugas');
            Route::get('{idTugas}/check', [TugasController::class, 'tandai_terselesaikan'])->name('tugasTerselesaikan');
            Route::get('{idTugas}/tugasBerbintang', [TugasController::class, 'tandai_tugas_berbintang'])->name('tugasTandaiBerbintang');
            Route::get('{idTugas}/delete', [TugasController::class, 'destroy'])->name('tugasDelete');
    
            Route::post('store', [TugasController::class, 'store'])->name('tugasStore');
            Route::post('{idTugas}/update', [TugasController::class, 'update'])->name('tugasUpdate');
        });

        Route::post('tugas/hapus_berdasarkan_status', [TugasController::class, 'hapus_tugas_berdasarkan_status'])->name('hapus_tugas_berdasarkan_status');
    });
    
    Route::get('tugas-berbintang', [TugasController::class, 'tugasBerbintang'])->name('tugasBerbintang');
    Route::get('setStatusColor', [StatusTugasController::class, 'index'])->name('setStatusColor');
    Route::post('setStatusColor/proses', [StatusTugasController::class, 'setStatusColor'])->name('setStatusColorProses');
    
});

Auth::routes();
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('registerUser');
Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
