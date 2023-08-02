<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'index');
});

Route::controller(CidadeController::class)->group(function () {
    Route::get('cidades', 'index');
    Route::get('cidades/{id_cidade}/medicos', 'medicos');
    Route::middleware(['auth:api'])->group(function () {
    });
});

Route::controller(MedicoController::class)->group(function () {
    Route::get('medicos', 'index');
    Route::middleware(['auth:api'])->group(function () {
        Route::post('medicos', 'create');
        Route::post('medicos/{id_medico}/pacientes', 'vincular');
        Route::get('medicos/{id_medico}/pacientes', 'pacientes');
    });
});

Route::controller(PacienteController::class)->group(function () {
    Route::middleware(['auth:api'])->group(function () {
        Route::post('pacientes', 'create');
        Route::post('pacientes/{id_paciente}', 'update');
    });
});