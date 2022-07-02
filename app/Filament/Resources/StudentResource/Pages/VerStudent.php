<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Resources\Pages\Page;
use App\Models\Student;

class VerStudent extends Page
{
    protected static string $resource = StudentResource::class;

    public Student $record;

    protected static string $view = 'filament.resources.student-resource.pages.ver-student';
}
