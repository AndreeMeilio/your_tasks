<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\TugasController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

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
        Route::get('create', [TugasController::class, 'create'])->name('tugasCreate');
        Route::get('{idTugas}/edit', [TugasController::class, 'edit'])->name('tugasEdit');
        Route::get('get/{idStatustugas?}', [TugasController::class, 'get'])->name('getTugas');
        Route::get('{idTugas}/check', [TugasController::class, 'tandai_terselesaikan'])->name('tugasTerselesaikan');

        Route::post('store', [TugasController::class, 'store'])->name('tugasStore');
        Route::post('{idTugas}/update', [TugasController::class, 'update'])->name('tugasUpdate');
        Route::post('delete', [TugasController::class, 'destroy'])->name('tugasDelete');
    });
});




