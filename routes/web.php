<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\datosfalsos;
use App\Http\Controllers\DispositivoCOntroller;
use App\Http\Controllers\EspecialistaController;
use App\Livewire\AgregarDispositivo;
use App\Livewire\CrearEspecialista;
use App\Livewire\Especialistas;
use App\Livewire\Paciente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolterController;
use App\Http\Controllers\pacienteController;
use App\Livewire\Administrador;
use App\Livewire\Test;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 

route::get('/datos', [datosfalsos::class, 'datos']);
route::get('test', Test::class);

route::get('/administrador', [AdministradorController::class, 'administrador']);
route::get('administrador', Administrador::class);

//route::get('/especialistas', [EspecialistaController::class, 'especialistas']);
route::get('especialistas', Especialistas::class);


route::get('/crear_paciente', [pacienteController::class, 'crear_paciente']);
route::get('crear_paciente', Paciente::class);

route::get('/crear_especialista', [EspecialistaController::class, 'crear_especialista']);
route::get('crear_especialista', CrearEspecialista::class);

route::get('/agregar_dispositivo', [DispositivoCOntroller::class, 'agregar_dispositivo']);
route::get('agregar_dispositivo', AgregarDispositivo::class);










//Route::get("/administrador", [AdministradorController::class, 'administrador']);
//Route::get("especialistas", [EspecialistaController::class, 'especialistas']);