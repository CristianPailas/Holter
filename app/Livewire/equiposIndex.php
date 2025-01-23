<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\dispositivos;
use Livewire\Attributes\Validate;

class equiposIndex extends Component
{
    public $listadoDispositivos=[];

    public $dispositivoSeleccionado = false;
    public $modal = false;
    public $estadoModal;
    public $datosPaciente;
    public $id;
    public $modalDelete = false;
    public $dispositivoEliminar;

    #[Validate('required', as: 'numero de serie',  message: 'El :attribute es obligatorio')]
    public $numero_serie; 
    #[Validate('required', as: 'modelo',  message: 'El :attribute es obligatorio')]
    public $modelo;
    #[Validate('required', as: 'fabricante',  message: 'El :attribute es obligatorio')]
    public $fabricante;
    #[Validate('required', as: 'estado',  message: 'El :attribute es obligatorio')]
    public $estado;
    

    
    

    
    public function listarDispositivos()
    {

        return dispositivos::All();
    }

    public function render()
    {
        $this->listadoDispositivos = $this->listarDispositivos();

        return view('livewire.dispositivos', ['listadoDispositivos', $this->listadoDispositivos]);
    }

   /*  public function render()
    {
        return view('livewire.dispositivos', ['listadoDispositivos', $this->listadoDispositivos, 'datosdispositivos', $this->datosdispositivos]);
    } */
    public function editar($id)
    {
        $this->id = $id;
        $this->modal = true;
        $this->estadoModal = "Editar datos del paciente";
        $datosdispositivo = dispositivos::find($id);
        $this->modelo = $datosdispositivo['modelo'] ;
        $this->fabricante = $datosdispositivo['fabricante'] ;
        $this->numero_serie = $datosdispositivo['numero_serie'] ;
        $this->estado = $datosdispositivo['estado'] ;
       
    }
 
    public function cerrar()
    {
        $this->reset(['modal', 'modalDelete']);
    }
    public function creacion()
    {
        $this->reset();
        $this->estadoModal = "Crear nuevo dispositivo";
        $this->modal = true;
    }

    public function crearDispositivos()
    {
        $this->validate(); 
    
        $dispositivo = new dispositivos();
        $datosdispositivo = [
            'id' => $this->id,
            'modelo' => $this->modelo,
            'fabricante' => $this->fabricante,
            'numero_serie' => $this->numero_serie,
            'estado' => $this->estado,
        ];
    
        if ($dispositivo::updateOrCreate(
            ['id' => $datosdispositivo['id']],
            $datosdispositivo
        )) {
            $this->reset(); // Asegúrate de que esto esté correctamente configurado
            $this->dispatch('DispositivoCreado', type: 'success', title: 'Registro exitoso', text: 'El dispositivo se ha guardado correctamente');
        }
    } 

    public function confirmarEliminar($id) {
        $this->modalDelete=true;
       $this->dispositivoEliminar = dispositivos::find($id);
      # dd($this->dispositivoEliminar);
        $this->id = $id;
    }
    
    public function eliminar($id)
    {
     
     if (dispositivos::destroy($this->id)) {
       $this->reset();
        $this->dispatch('DispositivoEliminado', type: 'success', title: 'Eliminado', text: 'El dispositivo se ha eliminado correctamente');
     }
    }
}


