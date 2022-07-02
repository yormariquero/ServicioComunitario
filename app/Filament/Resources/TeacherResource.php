<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use App\Models\Materia;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\BadgeColumn;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\SelectFilter;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                                ->label('Status del Docente')
                                ->options([
                                    'Activo' => 'Activo',
                                    'Inactivo' => 'Inactivo',
                                ])
                                ->required(),
                Forms\Components\TextInput::make('nombre')
                        ->required()
                        ->label('Nombres'),
                Forms\Components\TextInput::make('apellido')
                        ->required()
                        ->label('Apellidos'),
                Forms\Components\Select::make('tipo_documento')
                                ->options([
                                    'V' => 'V',
                                    'E' => 'E',
                                    'J' => 'J',
                                ])
                                ->required()
                                ->label('Tipo de Documento'),
                Forms\Components\TextInput::make('numero_documento')
                        ->numeric()
                        ->required()
                        ->label('Número de Documento'),
                Forms\Components\DatePicker::make('fecha_na')
                        ->label('Fecha de Nacimiento')
                        ->required()
                        ->format('Y-m-d')
                        ->displayFormat('d/m/Y'),
                Forms\Components\TextInput::make('email')
                        ->email()
                        ->required(),
                Forms\Components\TextInput::make('telefono')
                        ->numeric()
                        ->required(),
                Forms\Components\TextInput::make('direccion')
                        ->required(), 
                Forms\Components\Select::make('categoria')
                    ->required()
                    ->options([
                        'DE' => 'Dedicacion Exclusiva',
                        'TC' => 'Tiempo Completo',
                        'TV' => 'Tiempo Variable',
                        'MT' => 'Medio Tiempo',
                        'I' => 'Instructor'
                    ]),
                Forms\Components\Repeater::make('materias')
                        ->schema([
                Forms\Components\Select::make('materias')
                            //->required()
                            ->label('Materia')
                            ->options(Materia::all()->pluck('nombre', 'id')),
                    ])
                    ->columns(1)
                    ->createItemButtonLabel('Añadir Materia'),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->label('Cedula'),
                Forms\Components\TextInput::make('horas_trabajo')
                    ->numeric()
                    ->label('Horas de Trabajo')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                ->rounded()
                ->toggleable()
                ->label('Cedula')
                ->size(50),
                Tables\Columns\BadgeColumn::make('status')
                ->colors([
                'primary',
                'success' => fn ($state): bool => $state === 'Activo',
                'danger' => fn ($state): bool => $state === 'Inactivo',
                 ])
                ->searchable()
                ->toggleable()
                ->label('Status'),
                Tables\Columns\TextColumn::make('nombre')
                ->searchable()
                ->toggleable()
                ->label('Nombres'),
                Tables\Columns\TextColumn::make('apellido')
                ->searchable()
                ->toggleable()
                ->label('Apellidos'),
                Tables\Columns\TextColumn::make('tipo_documento')
                ->searchable()
                ->toggleable()
                ->label('Tipo'),
                Tables\Columns\TextColumn::make('numero_documento')
                ->searchable()
                ->toggleable()
                ->label('Documento'),
                Tables\Columns\TextColumn::make('fecha_na')
                ->searchable()
                ->toggleable()
                ->label('Fecha de Nacimiento'),
                Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->toggleable()
                ->label('Email'),
                Tables\Columns\TextColumn::make('telefono')
                ->searchable()
                ->toggleable()
                ->label('Teléfono'),
                Tables\Columns\TextColumn::make('categoria')
                ->searchable()
                ->toggleable()
                ->label('Categoria'),
                Tables\Columns\TextColumn::make('horas_trabajo')
                ->searchable()
                ->toggleable()
                ->label('Horas de Trabajo'),
            ])
            ->filters([
                
                MultiSelectFilter::make('categoria')
                    ->options([
                        'DE' => 'Dedicacion Exclusiva',
                        'TC' => 'Tiempo Completo',
                        'TV' => 'Tiempo Variable',
                        'MT' => 'Medio Tiempo',
                        'I' => 'Instructor'
                    ]),
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'Activo' => 'Activo',
                        'Inactivo' => 'Inactivo',
                    ]),
            ])
            ->prependBulkActions([

                ExportBulkAction::make('Descargar Registro')->icon('heroicon-s-cloud-download')

            ])
            ->actions([
                Tables\Actions\Action::make('ver')
                    ->label('Ver')
                    ->url(fn (Teacher $record): string => route('filament.resources.teachers.ver-profesor', $record))
                    ->icon('heroicon-s-eye'),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
            'ver-profesor' => Pages\VerProfesor::route('/{record}/ver')
        ];
    }
}
