<?php

namespace App\Livewire;

use App\Models\especialistas;
use Livewire\Component;
use Livewire\Attributes\Validate;


class especialistaIndex extends Component
{
    public $listadoEspecialistas = [];
    public $modal = false;
    public $estadoModal;
    public $especialista;
    public $modalDelete = false;
    public $especialistaEliminar;
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
        $this->nombre = $datosEspecialista['nombre'] ;
        $this->apellidos = $datosEspecialista['apellidos'] ;
        $this->correo = $datosEspecialista['correo'] ;
        $this->contrasena = $datosEspecialista['contrasena'] ;
        $this->identification = $datosEspecialista['identification'] ;
        $this->experiencia = $datosEspecialista['experiencia'] ;
        $this->contacto = $datosEspecialista['Contacto'] ;
        
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
            $datosEspecialista['nombre'] = $this->nombre;
            $datosEspecialista['apellidos'] = $this->apellidos;
            $datosEspecialista['correo'] = $this->correo;
            $datosEspecialista['contrasena'] = $this->contrasena;
            $datosEspecialista['identification'] = $this->identification;
            $datosEspecialista['especialidad'] = $this->especialidad;
            $datosEspecialista['experiencia'] = $this->experiencia;
            $datosEspecialista['contacto'] = $this->contacto;
           
            if ($especialistas::updateOrCreate([
                'id'=>$datosEspecialista['id']
            ],
            $datosEspecialista
            
            )) {
                $this->reset();
                $this->dispatch('EspecialistaCreado', type: 'success', title: 'Registro exitoso', text: 'El especialista se ha guardado correctamente');
            }
        }
    }  
    public function confirmarEliminar($id) {
        $this->modalDelete=true;
       $this->especialistaEliminar = especialistas::find($id);
      # dd($this->dispositivoEliminar);
        $this->id = $id;
    }


    public function eliminar($id)
    {
     
     if (especialistas::destroy($this->id)) {
       $this->reset();
       session()->flash('message', 'El especialista ha sido eliminado correctamente.');
     }
    }
}
