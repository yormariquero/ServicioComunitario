<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'tipo_documento',
        'numero_documento',
        'email',
        'telefono',
        'direccion',
        'foto',
        'categoria',
        'materias',
        'horas_trabajo',
        'status',
        'fecha_na',
        //'materia_id'
    ];

    protected $cast = [

        'materias' => 'array',
        //'fecha_na' => 'date',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
