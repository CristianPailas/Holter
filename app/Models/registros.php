<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registros extends Model
{
    use HasFactory;

protected $table ="registros_holter";
protected $id ="id";
protected $fillable =[
    'hora',
    'fc_min',
    'rc_medio',
    'fc_max',
    'total_latidos',
    'paciente_id',
    'holter_id',
    'medico_id'
];
}
