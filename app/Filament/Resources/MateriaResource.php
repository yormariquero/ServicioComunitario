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

class MateriaResource extends Resource
{
    protected static ?string $model = Materia::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo')
                ->searchable()
                ->label('Codigo'),
                Tables\Columns\TextColumn::make('nombre')
                ->searchable()
                ->label('Nombre'),
                Tables\Columns\TextColumn::make('semestre')
                ->searchable()
                ->label('Semestre'),
                Tables\Columns\TextColumn::make('UC')
                ->searchable()
                ->label('UC'),
                Tables\Columns\TextColumn::make('horasT')
                ->searchable()
                ->label('Horas Teorica'),
                Tables\Columns\TextColumn::make('horasP')
                ->searchable()
                ->label('Horas Practica'),
                Tables\Columns\TextColumn::make('horasL')
                ->searchable()
                ->label('Horas Laboratorio'),

            ])
            ->filters([
                //
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
            'index' => Pages\ListMaterias::route('/'),
            'create' => Pages\CreateMateria::route('/create'),
            'edit' => Pages\EditMateria::route('/{record}/edit'),
        ];
    }
}
