<?php

namespace App\Livewire;

use App\Models\pacientes;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
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
    #[Validate('required', as: 'celular',  message: 'El :attribute es obligatorio')]
    public $celular;
    #[Validate('required', as: 'sexo',  message: 'El :attribute es obligatorio')]
    public $sexo;
    #[Validate('required', as: 'dirección',  message: 'La :attribute es obligatorio')]
    public $direccion;
    #[Validate('required', as: 'fecha de nacimiento',  message: 'La :attribute es obligatorio')]
    public $fecha_nacimiento;
    #[Validate('required', as: 'estado_pcte',  message: 'El :attribute es obligatorio')]
    public $estado_pcte;


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
        $this->celular = $datosPaciente['celular'];
        $this->sexo = $datosPaciente['genero'];
        $this->direccion = $datosPaciente['direccion'];
        $this->fecha_nacimiento  = $datosPaciente['fecha_nacimiento'];
        $this->estado_pcte  = $datosPaciente['estado_pcte'];
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
            try {
                $paciente = new pacientes;
                $datosPaciente['id'] = $this->id;
                $datosPaciente['nombres'] = strtoupper($this->nombres);
                $datosPaciente['apellidos'] = strtoupper($this->apellidos);
                $datosPaciente['identificacion'] = $this->identificacion;
                $datosPaciente['celular'] = $this->celular;
                $datosPaciente['genero'] = $this->sexo;
                $datosPaciente['direccion'] = $this->direccion;
                $datosPaciente['fecha_nacimiento'] = $this->fecha_nacimiento;
                $datosPaciente['estado_pcte'] = $this->estado_pcte;
                if ($paciente::updateOrCreate(
                    [
                        'id' => $datosPaciente['id']
                    ],
                    $datosPaciente
                )) {
                    $this->reset();
                    $this->dispatch('PacienteCreado', type: 'success', title: 'Registro exitoso', text: 'El paciente se ha guardado correctamente');
                }
            } catch (ValidationException $e) {
                $this->dispatch('PacienteError', type: 'error', title: 'Ha ocurrido un error', text: $e->getMessage());
            } catch (QueryException $e) {
                Log::error('Error de consulta en la base de datos: ' . $e->getMessage());
                $this->dispatch('PacienteError', type: 'error', title: 'Ha ocurrido un error', text: $e->getMessage());
            } catch (Exception $e) {
                Log::error('Error en el servidor: ' . $e->getMessage());
                $this->dispatch('PacienteError', type: 'error', title: 'Ha ocurrido un error', text: $e->getMessage());
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
