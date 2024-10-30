<?php

namespace App\Livewire;

use App\Models\especialistas;
use Livewire\Component;
use App\Models\Medico; 

class CrearEspecialista extends Component
{
    public $name;
    public $identification_no;
    public $specialty;
    public $experience_years;
    public $contact_info;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'identification' => 'required|string|max:255|unique:medicos,identification', 
        'especialidad' => 'required|string|max:255',
        'experiencia' => 'required|integer|min:0',
        'contacto' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        // Crear un nuevo especialista
        especialistas::create([ 
            'nombre' => $this->nombre,
            'gmail' => $this->gmail,
            'contraseña' => bcrypt($this->contraseña),
           'identification' => $this->identification,
           'especialidad' => $this->especialidad,
           'experiencia' => $this->experiencia,
           'contacto' => $this->contacto,
        ]);

        $this->reset();
        session()->flash('message', 'Especialista registrado exitosamente.');
    }

    public function render()
    {
        return view('livewire.crear-especialista');
    }
}
