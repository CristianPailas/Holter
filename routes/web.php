<?php

use App\Livewire\equiposIndex;
use App\Livewire\especialistaIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\pacientesIndex;
use App\Livewire\procedimientosIndex;



Route::get('/', function () {
    return view('welcome');
});







Route::middleware([
    'auth:sanctum',
    'role:admin'
])->group(function () {
    route::get('holters', equiposIndex::class)->name('holters');
    route::get('pacientes', pacientesIndex::class)->name('pacientes');
    route::get('especialistas', especialistaIndex::class)->name('especialistas');

});

Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
    route::get('procedimientos', procedimientosIndex::class)->name('procedimientos');

      Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');   
});
