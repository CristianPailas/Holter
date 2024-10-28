<?php

namespace App\Livewire;

use Livewire\Component;

class Administrador extends Component
{
    public $name;
    public $identification_no;
    public $specialty;
    public $experience_years;
    public $contact_info;
    public function render()
    {
        return view('livewire.administrador');
    }
}
