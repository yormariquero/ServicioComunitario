<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'tipo_in',
        'descripcion',
        'status',
    ];

    protected $casts = [
        //'fecha' => 'date',
        
    ];
}

