<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MateriasRelationManager extends RelationManager
{
    protected static string $relationship = 'materias';

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre'),
                Tables\Columns\TextColumn::make('codigo'),
                Tables\Columns\TextColumn::make('semestre'),
                Tables\Columns\TextColumn::make('UC'),
                Tables\Columns\TextColumn::make('horasT'),
                Tables\Columns\TextColumn::make('horasP'),
                Tables\Columns\TextColumn::make('horasL'),
                Tables\Columns\BadgeColumn::make('status')
                ->colors([
                'primary',
                'success' => fn ($state): bool => $state === 'Profesor',
                'danger' => fn ($state): bool => $state === 'Sin Profesor',
                ]),
                Tables\Columns\TextColumn::make('horario'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
