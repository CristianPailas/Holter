<?php

namespace App\Livewire;

use App\Models\pacientes;
use Livewire\Attributes\Validate;

use Illuminate\Http\Request;
use Livewire\Component;

class Paciente extends Component
{

    #[Validate('required', as: 'nombree',  message: 'El :attribute es obligatorio')]
    public $nombres;
    #[Validate('required', as: 'apellidos',  message: 'Los :attribute son obligatorio')]
    public $apellidos;
    #[Validate('required', as: 'número identificacion',  message: 'El :attribute es obligatorio')]
    public $identificacion;
    #[Validate('required', as: 'edad',  message: 'La :attribute es obligatorio')]
    public $edad;
    #[Validate('required', as: 'sexo',  message: 'El :attribute es obligatorio')]
    public $sexo;
    #[Validate('required', as: 'dirección',  message: 'La :attribute es obligatorio')]
    public $direccion;
    #[Validate('required', as: 'dirección',  message: 'La :attribute es obligatorio')]
    public $fecha_nacimiento;



    public function render()
    {
        return view('livewire.crear_paciente');
    }

    public function crearPaciente()
    {
        
      
        if ($this->validate()) {
        #    dd($this->nombres, $this->apellidos, $this->identificacion, $this->edad, $this->sexo, $this->direccion);
           
            $paciente = new pacientes;
            $datosPaciente['nombres']=$this->nombres; 
            $datosPaciente['apellidos']=$this->apellidos; 
          #  $datosPaciente['identificacion']=$this->identificacion; 
            #$datosPaciente['edad']=$this->edad; 
            $datosPaciente['genero']=$this->sexo; 
            $datosPaciente['fecha_nacimiento']=$this->fecha_nacimiento; 
            $datosPaciente['direccion']=$this->direccion; 
            if ($paciente::create($datosPaciente)) {
            $this->reset();
            $this->dispatch('PacienteCreado', type: 'success', title: 'Registro exitoso', text: 'El paciente se ha guardado correctamente');
            }

          
        }
      
    }
}
