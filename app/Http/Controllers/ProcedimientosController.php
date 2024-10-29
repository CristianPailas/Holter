<?php

namespace App\Http\Controllers;

use App\Models\dispositivos;
use App\Models\pacientes;
use Illuminate\Http\Request;

class ProcedimientosController extends Controller
{
 
    public function NuevoProcedimiento()
    {

        $pacientesModel = new pacientes;
        $dispositivosModel = new dispositivos;
        $pacientes = $pacientesModel::All();
        $dispositivos = $dispositivosModel::All();
        return [
            'pacientes' => $pacientes,
            'dispositivos' => $dispositivos,
        ];
    }
}
