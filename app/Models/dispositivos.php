<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dispositivos extends Model
{
    use HasFactory;
protected $table = "holters";
protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'modelo',
        'fabricante',
        'numero_serie'
    ];
}
