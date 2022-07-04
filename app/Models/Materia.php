<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'semestre',
        'UC',
        'horasT',
        'horasP',
        'horasL',
        'status',
        'horario',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class , 'student_materia', 'student_id', 'materia_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class , 'teacher_materia', 'teacher_id', 'materia_id');
    }
}
