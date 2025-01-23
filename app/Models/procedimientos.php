<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procedimientos extends Model
{
    use HasFactory;

    protected $fillable = [
        /* 'nombre',
        'descripcion',
        'fecha',
        'email',
        'role', */
        'id',
        'edad',
        'genero',
        'fecha_nacimiento',
        
        
    ];
}
