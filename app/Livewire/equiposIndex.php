<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\dispositivos;
use Livewire\Attributes\Validate;

class equiposIndex extends Component
{
    public $listadoDispositivos=[];
    public $modal = false;
    public $estadoModal;
    public $datosPaciente;
    public $id;
    public $modalDelete = false;
    public $dispositivoEliminar;

    #[Validate('required', as: 'numero de serie',  message: 'El :attribute es obligatorio')]
    public $numero_serie; // Asegúrate de que esta propiedad esté declarada
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
        $this->modal = false;
        $this->modalDelete = false;
    }
    public function creacion()
    {
        $this->estadoModal = "Crear nuevo dispositivo";
        $this->modal = true;
    }


    public function crearDispositivos()
    {


        #dd($this->modelo, $this->fabricante, $this->numero_serie, $this->estado);
        if ($this->validate()) {

            $dispositivo = new dispositivos();
            $datosdispositivo['id'] = $this->id;
            $datosdispositivo['modelo'] = $this->modelo;
            $datosdispositivo['fabricante'] = $this->fabricante;
            $datosdispositivo['numero_serie'] = $this->numero_serie;
            $datosdispositivo['estado'] = $this->estado;
           
            if ($dispositivo::updateOrCreate([
                'id'=>$datosdispositivo['id']
            ],
            $datosdispositivo
            )) {
                $this->reset();
                $this->dispatch('DispositivoCreado', type: 'success', title: 'Registro exitoso', text: 'El dispositivo se ha guardado correctamente');
            }
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


