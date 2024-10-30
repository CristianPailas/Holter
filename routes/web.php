<?php

use App\Livewire\Dashboard;
use App\Livewire\equiposIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\pacientesIndex;
use App\Livewire\procedimientosIndex;

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


route::get('pacientes', pacientesIndex::class)->name('pacientes');

route::get('procedimientos', procedimientosIndex::class)->name('procedimientos');
route::get('holters', equiposIndex::class)->name('holters');

