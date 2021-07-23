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
    Route::post('store', [MataPelajaranController::class, 'store'])->name('matapelajaranStore');
    Route::get('{idMatapelajaran}/edit', [MataPelajaranController::class, 'edit'])->name('matapelajaranEdit');
    Route::get('{idMatapelajaran}/detail', [MataPelajaranController::class, 'detail'])->name('matapelajaranDetail');
    Route::get('{idMatapelajaran}/delete', [MataPelajaranController::class, 'delete'])->name('matapelajaranDelete');

    Route::prefix('{idMatapelajaran}/tugas')->group(function(){
        Route::get('', [TugasController::class, 'index'])->name('tugasMatapelajaran');
    });
});




