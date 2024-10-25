<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\datosfalsos;
use App\Http\Controllers\EspecialistaController;
use App\Livewire\Especialistas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolterController;
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

route::get('/especialistas', [EspecialistaController::class, 'especialistas']);
route::get('especialistas', Especialistas::class);

















//Route::get("/administrador", [AdministradorController::class, 'administrador']);
//Route::get("especialistas", [EspecialistaController::class, 'especialistas']);