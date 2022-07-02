<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\SelectFilter;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-download';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\Components\TextInput::make('titulo')
                        ->label('Titulo')
                        ->columns(2)
                        ->columnSpan(2)
                        ->required(),
                Forms\Components\TextInput::make('dominio')
                        ->url()
                        ->label('Link')
                        ->columns(2)
                        ->columnSpan(2)
                        ->required(),
                Forms\Components\Textarea::make('descripcion')
                        ->label('Descripcion')
                        ->columns(2)
                        ->columnSpan(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('titulo')
                ->sortable()
                ->searchable()
                ->toggleable()
                ->label('Titulo'),
                Tables\Columns\TextColumn::make('dominio')
                ->searchable()
                ->toggleable()
                ->label('Link'),
                Tables\Columns\TextColumn::make('descripcion')
                ->html()
                ->searchable()
                ->toggleable()
                ->label('Descripcion'),
            ])
            ->prependBulkActions([

                ExportBulkAction::make('Descargar Registro')->icon('heroicon-s-cloud-download')

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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
