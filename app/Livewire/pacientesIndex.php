<?php

namespace App\Livewire;

use App\Models\pacientes;
use Livewire\Component;
use Livewire\Attributes\Validate;

class pacientesIndex extends Component
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
    #[Validate('required', as: 'fecha de nacimiento',  message: 'La :attribute es obligatorio')]
    public $fecha_nacimiento;


    public $listadoPacientes;
    public $modal = false;
    public $estadoModal;
    public $datosPaciente;
    public $id;
    public $modalDelete = false;
    public $pacienteEliminar;

    public function listarPacientes()
    {
        return pacientes::All();
    }

    public function render()
    {
        $this->listadoPacientes = $this->listarPacientes();
        return view('livewire.pacientes', ['listadoPacientes', $this->listadoPacientes]);
    }

    public function editar($id)
    {
        $this->id = $id;
        $this->modal = true;
        $this->estadoModal = "Editar Datos del Paciente";
        $datosPaciente = pacientes::find($id);
        $this->nombres = strtoupper($datosPaciente['nombres']);
        $this->apellidos = strtoupper($datosPaciente['apellidos']);
        $this->identificacion = $datosPaciente['identificacion'];
        $this->edad = $datosPaciente['edad'];
        $this->sexo = $datosPaciente['genero'];
        $this->direccion = $datosPaciente['direccion'];
        $this->fecha_nacimiento  = $datosPaciente['fecha_nacimiento'];
    }

    public function cerrar()
    {
        $this->modal = false;
        $this->modalDelete = false;
    }
    public function creacion()
    {
        $this->estadoModal = "Crear Nuevo Paciente";
        $this->modal = true;
    }


    public function crearPaciente()
    {
        if ($this->validate()) {

            $paciente = new pacientes;
            $datosPaciente['id'] = $this->id;
            $datosPaciente['nombres'] = strtoupper($this->nombres);
            $datosPaciente['apellidos'] = strtoupper($this->apellidos);
            $datosPaciente['identificacion'] = $this->identificacion;
            $datosPaciente['edad'] = $this->edad;
            $datosPaciente['genero'] = $this->sexo;
            $datosPaciente['fecha_nacimiento'] = $this->fecha_nacimiento;
            $datosPaciente['direccion'] = $this->direccion;
            if ($paciente::updateOrCreate(
                [
                    'id' => $datosPaciente['id']
                ],
                $datosPaciente
            )) {
                $this->reset();
                $this->dispatch('PacienteCreado', type: 'success', title: 'Registro exitoso', text: 'El paciente se ha guardado correctamente');
            }
        }
    }

    public function confirmarEliminar($id)
    {
        $this->modalDelete = true;
        $this->pacienteEliminar = pacientes::find($id);
        # dd($this->pacienteEliminar);
        $this->id = $id;
    }

    public function eliminar($id)
    {
        if (pacientes::destroy($this->id)) {
            $this->reset();
            $this->dispatch('PacienteEliminado', type: 'success', title: 'Eliminado', text: 'El paciente se ha eliminado correctamente');
        }
    }
}
