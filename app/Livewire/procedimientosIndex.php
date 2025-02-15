<?php

namespace App\Livewire;

use App\Http\Controllers\ProcedimientosController;
use App\Models\pacientes;
use App\Models\procedimientos;
use Livewire\Component;

class procedimientosIndex extends Component
{

    public $listaPacientes = [];
    public $datosPaciente;
    public $modal = false;
    public $pacienteSeleccionado = false;
    public $nombre;
    public $correo;
    public $identificacion;


    public function listarProcedimientos()
    {
        return procedimientos::all();
    }
    public function render()
    {
        return view('livewire.procedimientos', ['listaPacientes', $this->listaPacientes, 'datosPaciente', $this->datosPaciente]);
    }

    public function NuevoProcedimiento()
    {
        $procedimientos = new ProcedimientosController();
        $lista = $procedimientos->NuevoProcedimiento();
        foreach ($lista['pacientes'] as $key => $Paciente) {
            $this->listaPacientes[$key] = $Paciente;
        }
        $this->modal = true;
    }

    public function datosPacienteSeleccionado($id)
    {
        $this->datosPaciente = pacientes::find($id);
        $this->pacienteSeleccionado = true;
    }

    public function cerrar()
    {
        $this->modal = false;
    }
    
    public function eliminar($id)
    {
        if (procedimientos::destroy($id)) {
            $this->reset();
            session()->flash('message', 'El procedimiento ha sido eliminado correctamente.');
        }
    }
}
