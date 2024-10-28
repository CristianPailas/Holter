<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function administrador()  
    {
        
        return view('administrador'); 
    }
}