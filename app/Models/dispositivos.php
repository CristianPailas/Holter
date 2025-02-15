<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dispositivos extends Model
{
    use HasFactory;
    protected $table = "dispositivos";
    protected $primaryKey = "id";
    protected $fillable = [
        'modelo',
        'numero_serie',
        'fabricante',
        'estado',
    ];
}
