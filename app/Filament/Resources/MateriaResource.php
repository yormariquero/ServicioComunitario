<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriaResource\Pages;
use App\Filament\Resources\MateriaResource\RelationManagers;
use App\Models\Materia;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BooleanColumn; 
use Filament\Tables\Columns\BadgeColumn;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\SelectFilter;

class MateriaResource extends Resource
{
    protected static ?string $model = Materia::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                                ->label('Status')
                                ->options([
                                    'Profesor' => 'Profesor',
                                    'Sin Profesor' => 'Sin Profesor',
                                ])
                                ->required(),
                TextInput::make('codigo')
                ->required(),
                TextInput::make('nombre')
                ->required(),
                Forms\Components\Select::make('semestre')
                         ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',  
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            ])
                            ->required(),
                TextInput::make('UC')
                ->numeric()
                ->required(),
                TextInput::make('horasT')
                ->numeric()
                ->required(),
                TextInput::make('horasP')
                ->numeric()
                ->required(),
                TextInput::make('horasL')
                ->numeric()
                ->required(),
                Forms\Components\FileUpload::make('horario')
                    ->image()
                    ->label('Horario'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('horario')
                ->rounded()
                ->toggleable()
                ->label('Horario')
                ->size(50),
                Tables\Columns\TextColumn::make('codigo')
                ->searchable()
                ->toggleable()
                ->label('Codigo'),
                Tables\Columns\TextColumn::make('nombre')
                ->searchable()
                ->toggleable()
                ->label('Nombre'),
                Tables\Columns\TextColumn::make('semestre')
                ->sortable()
                ->toggleable()
                ->searchable()
                ->label('Semestre'),
                Tables\Columns\TextColumn::make('UC')
                ->searchable()
                ->toggleable()
                ->label('UC'),
                Tables\Columns\TextColumn::make('horasT')
                ->searchable()
                ->toggleable()
                ->label('Horas Teorica'),
                Tables\Columns\TextColumn::make('horasP')
                ->searchable()
                ->toggleable()
                ->label('Horas Practica'),
                Tables\Columns\TextColumn::make('horasL')
                ->searchable()
                ->toggleable()
                ->label('Horas Laboratorio'),
                Tables\Columns\BadgeColumn::make('status')
                ->colors([
                'primary',
                'success' => fn ($state): bool => $state === 'Profesor',
                'danger' => fn ($state): bool => $state === 'Sin Profesor',
                 ])
                ->searchable()
                ->toggleable()
                ->label('Status'),

            ])
            ->filters([
                
                 MultiSelectFilter::make('status')
                    ->options([
                        'Profesor' => 'Profesor',
                        'Sin Profesor' => 'Sin Profesor',
                    ]),

                MultiSelectFilter::make('semestre')
                    ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',  
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            ]),

            ])
            ->prependBulkActions([

                ExportBulkAction::make('Descargar Registro')->icon('heroicon-s-cloud-download')

            ])
            ->actions([
                
                //Tables\Actions\Action::make('ver')
                    //->label('Ver')
                    //->url(fn (Materia $record): string => route('filament.resources.materias.ver-materia', $record))
                    //->icon('heroicon-s-eye'),

                Tables\Actions\EditAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\StudentsRelationManager::class,
            RelationManagers\TeachersRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaterias::route('/'),
            'create' => Pages\CreateMateria::route('/create'),
            'edit' => Pages\EditMateria::route('/{record}/edit'),
            //'ver-materia' => Pages\VerMateria::route('/{record}/ver'),

        ];
    }
}
