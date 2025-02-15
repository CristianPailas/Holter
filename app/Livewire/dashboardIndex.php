<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class dashboardIndex extends Component
{
    public $listadoDispositivos = [];
    public $user;
    public function render()
    {
        $this->user = Auth::user();
        $role = $this->user->role;
        return view('livewire.dashboard')->with('role', $role);
    }
}
