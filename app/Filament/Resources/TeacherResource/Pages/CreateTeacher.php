<?php

namespace App\Filament\Resources\TeacherResource\Pages;

use App\Filament\Resources\TeacherResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Filament\Resources\TeacherResource\Pages;
use Livewire\Redirector;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    protected function handleRecordCreation(array $data): Model
    {


        $teacher = static::getModel()::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'tipo_documento'=> $data['tipo_documento'],
            'numero_documento' => $data['numero_documento'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'foto' => $data['foto'],
            'categoria' => $data['categoria'],
            'horas_trabajo' => $data['horas_trabajo'],
            'status' => $data['status'],
            'fecha_na' => $data['fecha_na'],

        ]);

        //$this->notify('success', 'Profesor Creado');
       //return $teacher;
        //return redirect()->route('filament.resources.teachers.ver-profesor', ['record' => $teacher]);

    }
}
