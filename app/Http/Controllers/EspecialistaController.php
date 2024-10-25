<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspecialistaController extends Controller
{
    public function especialistas()  
    {
        
        return view('especialistas'); 
    }
}
