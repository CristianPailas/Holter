<?php

namespace App\Livewire;

use App\Models\especialistas;
use App\Models\user;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Validate;


class especialistaIndex extends Component
{
    public $listadoEspecialistas = [];
    public $modal = false;
    public $estadoModal;
    public $especialista;
    public $modalDelete = false;
    public $EspecialistaEliminar;
    public $id;

    #[Validate('required', as: 'nombre', message: 'El :attribute es obligatorio')]
    public $nombre;

    #[Validate('required', as: 'apellidos', message: 'Los :attribute son obligatorios')]
    public $apellidos;

    #[Validate('required', as: 'correo', message: 'El :attribute es obligatorio ')]
    public $correo;

    #[Validate('required', as: 'contraseña', message: 'La :attribute es obligatoria y debe tener al menos 8 caracteres')]
    public $contrasena;

    #[Validate('required', as: 'identification', message: 'La :attribute es obligatoria')]
    public $identification;

    #[Validate('required', as: 'especialidad', message: 'La :attribute es obligatoria')]
    public $especialidad;

    #[Validate('required', as: 'experiencia', message: 'La :attribute es obligatoria')]
    public $experiencia;

    #[Validate('required', as: 'Contacto', message: 'El :attribute es obligatorio')]
    public $contacto;




    public function listarEspecialistas()
    {
        return especialistas::all();
    }

    public function render()
    {
        $this->listadoEspecialistas = $this->listarEspecialistas();
        return view('livewire.especialistas', ['listadoEspecialistas' => $this->listadoEspecialistas]);
    }

    public function editar($id)
    {
        $this->especialista = $id;
        $this->modal = true;
        $this->estadoModal = "Editar datos del especialista";
        $datosEspecialista = especialistas::findOrFail($id);
        $this->nombre = strtoupper($datosEspecialista['nombre']);
        $this->apellidos = strtoupper($datosEspecialista['apellidos']);
        $this->correo = $datosEspecialista['correo'];
        $this->contrasena = $datosEspecialista['contrasena'];
        $this->identification = $datosEspecialista['identification'];
        $this->experiencia = $datosEspecialista['experiencia'];
        $this->contacto = $datosEspecialista['contacto'];
        $this->especialidad = $datosEspecialista['especialidad'];
    }

    public function cerrar()
    {
        $this->reset(['modal', 'modalDelete']);
    }

    public function creacion()
    {
        $this->estadoModal = "Crear nuevo especialista";
        $this->modal = true;
    }

    public function crearEspecialistas()
    {
        #dd($this->nombre, $this->apellidos, $this->correo, $this->contrasena,$this->identification,$this->especialidad,$this->experiencia,$this->contacto);
        if ($this->validate()) {

            $especialistas = new especialistas();
            $datosEspecialista['id'] = $this->id;
            $datosEspecialista['nombre'] = strtoupper($this->nombre);
            $datosEspecialista['apellidos'] = strtoupper($this->apellidos);
            $datosEspecialista['correo'] = $this->correo;
            $datosEspecialista['contrasena'] = $this->contrasena;
            $datosEspecialista['identification'] = $this->identification;
            $datosEspecialista['especialidad'] = $this->especialidad;
            $datosEspecialista['experiencia'] = $this->experiencia;
            $datosEspecialista['contacto'] = $this->contacto;


            try {
                $newUser = new User();
                $newUser->name = strtoupper($this->nombre) . " " . strtoupper($this->apellidos);
                $newUser->email = $this->correo;
                $newUser->password = Hash::make($this->contrasena);
                $newUser->role = 'admin';
                $newUser->save();
                if ($especialistas::updateOrCreate(
                    [
                        'id' => $datosEspecialista['id']
                    ],
                    $datosEspecialista
                )) {
                    $this->reset();
                    $this->dispatch('EspecialistaCrear', type: 'success', title: 'Registro exitoso', text: 'El especialista se ha guardado correctamente');
                }
            } catch (ValidationException $e) {
                $this->dispatch('EspecialistaError', type: 'error', title: 'Ha ocurrido un error', text: $e->getMessage());
            } catch (QueryException $e) {
                Log::error('Error de consulta en la base de datos: ' . $e->getMessage());
                $this->dispatch('EspecialistaError', type: 'error', title: 'Ha ocurrido un error', text: $e->getMessage());
            } catch (Exception $e) {
                Log::error('Error en el servidor: ' . $e->getMessage());
                $this->dispatch('EspecialistaError', type: 'error', title: 'Ha ocurrido un error', text: $e->getMessage());
            }
        }
    }
    public function confirmarEliminar($id)
    {
        $this->modalDelete = true;
        $this->EspecialistaEliminar = especialistas::find($id);
        # dd($this->dispositivoEliminar);
        $this->id = $id;
    }


    public function eliminar($id)
    {

        if (especialistas::destroy($this->id)) {
            $this->reset();
            $this->dispatch('EspecialistaEliminar', type: 'success', title: 'Eliminado', text: 'El especialista se ha eliminado correctamente');
        }
    }
}
