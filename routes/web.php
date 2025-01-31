<?php

use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/home', [HomePageController::class, 'home'])->name('home');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store'); // Salvar o novo usuário
Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/agenda/eventos', [AgendaController::class, 'getEventos'])->name('agenda.eventos');
    Route::post('/agenda/criar', [AgendaController::class, 'criar'])->name('agenda.criar');
    Route::post('/agenda/editar/{id}', [AgendaController::class, 'editar'])->name('agenda.editar');
    Route::delete('/agenda/excluir/{id}', [AgendaController::class, 'excluir'])->name('agenda.excluir');
});


Route::get('/pacientes', [PacientesController::class, 'index'])->name('pacientes.index');
Route::get('/pacientes/create', [PacientesController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes/associarUsuario', [PacientesController::class, 'associarUsuario'])->name('pacientes.associarUsuario');
Route::post('/pacientes', [PacientesController::class, 'store'])->name('pacientes.store');
Route::delete('/pacientes/{id}', [PacientesController::class, 'destroy'])->name('pacientes.destroy');
Route::get('/pacientes/{id}/edit', [PacientesController::class, 'edit'])->name('pacientes.edit');
Route::post('/pacientes', [PacientesController::class, 'salvar'])->name('pacientes.salvar');


Route::get('/relatorios', [RelatoriosController::class, 'relatorios'])->name('relatorios');

route::get('/configuracao', [ConfiguracaoController::class, 'configuracao'])->name('configuracao');

require __DIR__.'/auth.php';
