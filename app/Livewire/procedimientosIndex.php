<?php

namespace App\Livewire;

use App\Http\Controllers\ProcedimientosController;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Models\dispositivos;
use App\Models\especialistas;
use App\Models\pacientes;
use App\Models\procedimientos;
use Livewire\Attributes\Validate;
use Livewire\Component;

class procedimientosIndex extends Component
{
    public $listaPacientes = [];
    public $listaEspecialistas = [];
    public $listaDispositivos = [];

    public $datosPaciente;
    public $datosEspecialista;
    public $datosDispositivo;

    #[Validate('required', as: 'fecha_ini',  message: 'La :attribute es obligatorio')]
    public $fecha_ini;
    #[Validate('required', as: 'fecha_fin',  message: 'La :attribute son obligatorio')]
    public $fecha_fin;
    #[Validate('required', as: 'duracion',  message: 'La :attribute es obligatorio')]
    public $duracion;
    #[Validate('required', as: 'paciente_id',  message: 'El :attribute es obligatorio')]
    public $paciente_id;
    #[Validate('required', as: 'especialista_id',  message: 'El :attribute es obligatorio')]
    public $especialista_id;
    #[Validate('required', as: 'dispositivo_id',  message: 'El :attribute es obligatorio')]
    public $dispositivo_id;
    #[Validate('required', as: 'estado_proc',  message: 'El :attribute es obligatorio')]
    public $estado_proc;

    public $edad = 0;
    public $observaciones;

    public $listadoProcedimientos;
    public $modal = false;
    public $estadoModal;
    public $datosProcediminto;
    public $id;
    public $modalDelete = false;
    public $procedimientoEliminar;

    public function listarProcedimientos()
    {
        $proc = procedimientos::join('pacientes', 'procedimientos.paciente_id', '=', 'pacientes.id')
            ->join('dispositivos', 'procedimientos.dispositivo_id', '=', 'dispositivos.id')
            ->select('procedimientos.*', 'pacientes.identificacion', 'pacientes.nombres', 'pacientes.apellidos', 'dispositivos.numero_serie')
            ->orderBy('procedimientos.id')
            ->get();
        return $proc;
    }
    public function render()
    {
        $this->listadoProcedimientos = $this->listarProcedimientos();
        return view('livewire.procedimientos', ['listadoProcedimientos', $this->listadoProcedimientos]);
    }

    public function NuevoProcedimiento()
    {
        $procedimientos = new ProcedimientosController();

        $lista = $procedimientos->NuevoProcedimiento();
        foreach ($lista['pacientes'] as $key => $pcte) {
            $this->listaPacientes[$key] = $pcte;
        }
        foreach ($lista['especialistas'] as $key => $esp) {
            $this->listaEspecialistas[$key] = $esp;
        }
        foreach ($lista['dispositivos'] as $key => $disp) {
            $this->listaDispositivos[$key] = $disp;
        }
        $this->modal = true;
    }

    public function datosSeleccion($id, $model)
    {
        switch ($model) {
            case 'pacientes':
                $this->datosPaciente = pacientes::find($id);
                $n = $this->datosPaciente->fecha_nacimiento;
                $this->calcEdadPcte($n);
                break;
            case 'especialistas':
                $this->datosEspecialista = especialistas::find($id);
                break;
            case 'dispositivos':
                $this->datosDispositivo = dispositivos::find($id);
                break;
        }
    }

    private function calcEdadPcte($nac)
    {
        $fechaNacimiento = Carbon::parse($nac);
        $this->edad = $fechaNacimiento->age;
    }

    public function cerrar()
    {
        $this->modal = false;
        $this->modalDelete = false;
    }

    public function creacion()
    {
        $this->estadoModal = "Crear Nuevo Procedimiento";
        $this->modal = true;
    }

    public function confirmarEliminar($id)
    {
        $this->modalDelete = true;
        $this->procedimientoEliminar = procedimientos::find($id);
        $this->id = $id;
    }

    public function eliminar($id)
    {
        if (procedimientos::destroy($this->id)) {
            $this->reset();
            $this->dispatch('ProcedimientoEliminado', type: 'success', title: 'Eliminado', text: 'El procedimiento se ha eliminado correctamente');
        }
    }

    private function actualizarDispositivos($id, $estado)
    {
        try {
            $dispositivo = dispositivos::findOrFail($id);
            $dispositivo->estado = $this->obtenerEstadoDispositivo($estado);
            $dispositivo->save();
            return true;
        } catch (\Exception $e) {
            Log::error("Error al actualizar el dispositivo ID {$id}: " . $e->getMessage());
            return false;
        }
    }

    private function obtenerEstadoDispositivo($estado)
    {
        return ($estado === 'abrir') ? 'En Uso' : 'Operativo';
    }

    public function crearProcedimiento()
    {
        if (!$this->validate()) {
            return;
        }

        try {
            $procedimiento = procedimientos::updateOrCreate(
                ['id' => $this->id],
                [
                    'fecha_ini' => $this->fecha_ini,
                    'fecha_fin' => $this->fecha_fin,
                    'duracion' => $this->duracion,
                    'edad' => $this->edad,
                    'paciente_id' => $this->paciente_id,
                    'especialista_id' => $this->especialista_id,
                    'dispositivo_id' => $this->dispositivo_id,
                    'estado_proc' => $this->estado_proc,
                    'observaciones' => $this->observaciones,
                ]
            );

            // Actualizar estado del dispositivo según el procedimiento
            if (in_array($this->estado_proc, ['ABIERTO', 'CERRADO'])) {
                $estado = $this->estado_proc === 'ABIERTO' ? 'abrir' : 'cerrar';
                if (!$this->actualizarDispositivos($this->dispositivo_id, $estado)) {
                    $this->dispatch('EspecialistaError', type: 'error', title: 'Error', text: 'Error al actualizar los dispositivos');
                }
            }

            $this->reset();
            $this->dispatch('ProcedimientoCreado', type: 'success', title: 'Registro exitoso', text: 'El procedimiento se ha guardado correctamente');
        } catch (ValidationException $e) {
            $this->dispatch('ProcedimientoError', type: 'error', title: 'Error', text: $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Error de consulta en la base de datos: ' . $e->getMessage());
            $this->dispatch('ProcedimientoError', type: 'error', title: 'Error', text: 'Error en la base de datos');
        } catch (\Exception $e) {
            Log::error('Error en el servidor: ' . $e->getMessage());
            $this->dispatch('ProcedimientoError', type: 'error', title: 'Error', text: 'Error en el servidor');
        }
    }


    public function editar($id)
    {
        $this->id = $id;
        $this->modal = true;
        $this->estadoModal = "Editar Datos del Procedimiento";

        $datosProcediminto = procedimientos::find($id);
        $this->fecha_ini = $datosProcediminto['fecha_ini'];
        $this->fecha_fin = $datosProcediminto['fecha_fin'];
        $this->duracion = $datosProcediminto['duracion'];
        $this->edad = $datosProcediminto['edad'];
        $this->paciente_id = $datosProcediminto['paciente_id'];
        $this->especialista_id = $datosProcediminto['especialista_id'];
        $this->dispositivo_id = $datosProcediminto['dispositivo_id'];
        $this->observaciones = $datosProcediminto['observaciones'];
        $this->estado_proc = $datosProcediminto['estado_proc'];
        $this->NuevoProcedimiento();
    }
}
