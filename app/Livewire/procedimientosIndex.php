<?php

namespace App\Livewire;

use App\Http\Controllers\ProcedimientosController;
use App\Models\pacientes;
use Livewire\Component;
use Termwind\Components\Dd;

class procedimientosIndex extends Component
{

    public $listaPacientes = [];
    public $datosPaciente;
    public $modal = false;
    public $pacienteSeleccionado = false;

    public function render()
    {
        return view('livewire.procedimientos', ['listaPacientes', $this->listaPacientes, 'datosPaciente', $this->datosPaciente]);
    }

    public function NuevoProcedimiento()
    {

        $procedimientos = new ProcedimientosController();
        $lista = $procedimientos->NuevoProcedimiento();
        #dd($lista['pacientes']);
        foreach ($lista['pacientes'] as $key => $Paciente) {
            $this->listaPacientes[$key] = $Paciente;
        }
        $this->modal = true;
        # dd($this->listaPacientes);
    }

    public function datosPacienteSeleccionado($id)
    {

        $this->datosPaciente = pacientes::find($id);

        $this->pacienteSeleccionado = true;
    }


    public function cerrar(){
        $this->modal= false;
    }
}
