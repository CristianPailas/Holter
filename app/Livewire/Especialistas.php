<?php

namespace App\Livewire;

use Livewire\Component;

class Especialistas extends Component
{

    public $name;
    public $identification_no;
    public $age;
    public $sex;
    public $diagnosis;
    public $indication;
    
    public function render()
    {
        return view('livewire.especialistas');
    }
}
