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
        'categoria',
        'horas_trabajo',
        'status',
        'fecha_na',
        //'materia_id'
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
        return $this->belongsToMany(Materia::class , 'teacher_materia', 'teacher_id', 'materia_id');
    }
}
