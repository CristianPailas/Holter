<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    use HasFactory;

    protected $table = 'pacientes';
    protected $primaryKey = 'id';
    protected $fillable = [
      
        'nombres',
        'apellidos',
        'genero',
        'identificacion',
        'fecha_nacimiento',
        'edad',
        'direccion'

    ];
}
