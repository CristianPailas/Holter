<?php

use App\Livewire\equiposIndex;
use App\Livewire\especialistaIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\pacientesIndex;
use App\Livewire\procedimientosIndex;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware([
    'auth:sanctum',
    'role:admin'
])->group(function () {
    route::get('pacientes', pacientesIndex::class)->name('pacientes');
    route::get('especialistas', especialistaIndex::class)->name('especialistas');
    route::get('dispositivos', equiposIndex::class)->name('dispositivos');
    route::get('procedimientos', procedimientosIndex::class)->name('procedimientos');
    //route::get('holters', equiposIndex::class)->name('holters');
});

Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
    route::get('procedimientos', procedimientosIndex::class)->name('procedimientos');
        Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
