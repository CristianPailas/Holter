<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registros extends Model
{
    use HasFactory;

    protected $table = "registros_holters";
    protected $id = "id";
    protected $fillable = [
        'procedimiento_id',
        'hora',
        'fc_min',
        'hora_fc_min',
        'fc_max',
        'hora_fc_max',
        'rc_medio',
        'total_latidos',
        'vent_total',
        'supr_total',
        'procedimiento_id',
    ];
}
