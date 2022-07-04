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

}
