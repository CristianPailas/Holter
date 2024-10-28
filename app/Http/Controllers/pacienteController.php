<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pacienteController extends Controller
{
    public function paciente()  
    {
        
        return view('paciente'); 
    }
}
