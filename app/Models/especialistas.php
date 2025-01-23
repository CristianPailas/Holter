<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especialistas extends Model 
{
    use HasFactory;

    protected $table = "especialistas";
    protected $primaryKey = "id";

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'contrasena',
        'identification',
        'especialidad',
        'experiencia',
        'contacto',
        
    ];
}
