<?php

use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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




// Route::get('/agendamentos', [AppointmentController::class, 'Agendamento'])->name('agendamentos');
Route::get('/agendamento', [AppointmentController::class, 'create'])->name('agendamento.create');
Route::post('/agendamento', [AppointmentController::class, 'store'])->name('agendamento.store');

// Route::get('/pacientes', [PacientesController::class, 'Pacientes'])->name('pacientes');
Route::get('/pacientes', [PacientesController::class, 'index'])->name('pacientes.index');
Route::get('/pacientes/create', [PacientesController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes', [PacientesController::class, 'store'])->name('pacientes.store');
Route::delete('/pacientes/{id}', [PacientesController::class, 'destroy'])->name('pacientes.destroy');
Route::get('/pacientes/{id}/edit', [PacientesController::class, 'edit'])->name('pacientes.edit');
Route::post('/pacientes', [PacientesController::class, 'salvar'])->name('pacientes.salvar');

Route::get('/relatorios', [RelatoriosController::class, 'relatorios'])->name('relatorios');

route::get('/configuracao', [ConfiguracaoController::class, 'configuracao'])->name('configuracao');

require __DIR__.'/auth.php';
