<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'tipo_documento',
        'numero_documento',
        'fecha_na',
        'email',
        'telefono',
        'telefono_emer',
        'direccion',
        'semestre',
        'discapacidad',
        'tipo_discapacidad',
        'militar',
        'cambio_carrera',
        'cambio_turno',
        'cambio_nucleo', 
        'sexo',
        'embarazo',
        'meses_em',
        'ingreso',
        'periodo_actual',
        'observacion',
        'status',
        'delegado',
        'tipo_delegado',
        'siceu',
        'seccion',
    ];



    public function getDatosAttribute()
    {
        if (empty($this->attributes['materias'])) {
            return false;
        }
        return true;
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class , 'student_materia', 'student_id', 'materia_id');
    }
}
