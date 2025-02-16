<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\dashboardIndex;
use App\Livewire\equiposIndex;
use App\Livewire\especialistaIndex;
use App\Livewire\pacientesIndex;
use App\Livewire\procedimientosIndex;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum'])->group(function () {
    route::get('dashboard', dashboardIndex::class)->name('dashboard');
    Route::middleware(['role:admin'])->group(function () {
        route::get('pacientes', pacientesIndex::class)->name('pacientes');
        route::get('especialistas', especialistaIndex::class)->name('especialistas');
        route::get('dispositivos', equiposIndex::class)->name('dispositivos');
    });
    Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
        route::get('procedimientos', procedimientosIndex::class)->name('procedimientos');
    });
});
