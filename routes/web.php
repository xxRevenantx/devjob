<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;



// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
// ->group(function () {

//     Route::get('/vacantes',[VacanteController::class, 'index'])->name('vacantes.index');
//     Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');
//     Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->name('vacantes.edit');
//     Route::get('/notificaciones', [NotificacionController::class, '__invoke'])->name('notificaciones');
// });


// CON LA POLICY NO ESTÁS AUTORIZADO PARA VER UN CONTENIDO
// EL MIDDLEWARE TRATA DE REDIRIGIRTE A OTRA TURA
Route::get('/', function () {
    // return view('welcome');
    return view('dashboard');
})->name('home');

Route::get('/dashboard',[VacanteController::class, 'index'])->middleware('auth','verified','rol.reclutador')->name('vacantes.index');


Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware('auth','verified')->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware('auth','verified')->name('vacantes.edit');


Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->middleware('auth','verified', 'rol.reclutador')->name('candidatos.index');


Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');



Route::get('/notificaciones', [NotificacionController::class, '__invoke'])->middleware('auth','verified','rol.reclutador')->name('notificaciones');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {

// });








