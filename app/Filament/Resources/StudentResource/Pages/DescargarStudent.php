<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Resources\Pages\Page;
use App\Models\Student; 
use App\Http\Controllers;
use App\Exports\StudentExport;
use Filament\Forms;
use Illuminate\Support\Facades\URL;

class DescargarStudent extends Page implements Forms\Contracts\HasForms
{
    protected static string $resource = StudentResource::class;

    protected static string $view = 'filament.resources.student-resource.pages.descargar-student';
}
 