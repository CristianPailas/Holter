<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Procedimientos;
use App\Models\Registros;

class RegistrosHolterIndex extends Component
{
    public $procedimiento_id;
    public $hora;
    public $fc_min;
    public $hora_fc_min;
    public $fc_max;
    public $hora_fc_max;
    public $rc_medio;
    public $total_latidos;
    public $vent_total;
    public $supr_total;

    public function mount($id)
    {
        $this->procedimiento_id = $id;
    }

    public function getProcedimientoId($id)
    {
        return Procedimientos::where('procedimientos.id', $id)
            ->join('pacientes', 'procedimientos.paciente_id', '=', 'pacientes.id')
            ->join('dispositivos', 'procedimientos.dispositivo_id', '=', 'dispositivos.id')
            ->select('procedimientos.*', 'pacientes.identificacion', 'pacientes.nombres', 'pacientes.apellidos', 'dispositivos.numero_serie')
            ->get();
    }

    public function getRegistrosProcById($id)
    {
        return Registros::where('procedimiento_id', $id)->get();
    }

    public function render()
    {
        $id = $this->procedimiento_id;
        $data = $this->getProcedimientoId($id) ?? (object) [];
        $registros = $this->getRegistrosProcById($id);

        return view('livewire.registros-holter', compact('data', 'registros'));
    }
}
