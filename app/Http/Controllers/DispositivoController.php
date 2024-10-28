<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispositivoCOntroller extends Controller
{
    public function agregar_dispositivo()  
    {
        
        return view('agregar_dispositivo'); 
    }
}

