<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimientos extends Model
{
    use HasFactory;
    protected $table = 'procedimientos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fecha_ini',
        'fecha_fin',
        'duracion',
        'edad',
        'paciente_id',
        'dispositivo_id',
        'especialista_id',
        'estado_proc',
        'observaciones',
    ];
}
