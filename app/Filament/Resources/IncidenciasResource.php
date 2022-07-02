<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncidenciasResource\Pages;
use App\Filament\Resources\IncidenciasResource\RelationManagers;
use App\Models\Incidencias;
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

class IncidenciasResource extends Resource
{
    protected static ?string $model = Incidencias::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-alt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\Components\Select::make('status')
                                ->label('Status')
                                ->options([
                                    'Solucionado' => 'Solucionado',
                                    'En Proceso' => 'En Proceso',
                                    'Sin Resolver' => 'Sin Resolver',
                                ])
                                ->required(),
                Forms\Components\DatePicker::make('fecha')
                        ->label('Fecha del Dia')
                        ->required()
                        ->format('Y-m-d')
                        ->displayFormat('d/m/Y'),
                Forms\Components\Select::make('tipo_in')
                    ->label('Tipo de Incidencia')
                    ->required()
                    ->options([
                        'Academica' => 'Academica',
                        'Docente' => 'Docente',
                        'Estudiantil' => 'Estudiantil',
                        'Administrativa' => 'Administrativa',
                        'Inmobiliaria' => 'Inmobiliaria',
                    ]),
                Forms\Components\Textarea::make('descripcion')
                        ->label('Descripcion')
                        ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
             Tables\Columns\TextColumn::make('fecha')
                ->sortable()
                ->searchable()
                ->toggleable()
                ->label('Fecha del Dia'),
                Tables\Columns\TextColumn::make('tipo_in')
                ->searchable()
                ->toggleable()
                ->label('Tipo de Incidencia'),
                Tables\Columns\TextColumn::make('descripcion')
                ->html()
                ->searchable()
                ->toggleable()
                ->label('Descripcion'),
                 BadgeColumn::make('status')
                ->colors([
                'primary',
                'success' => fn ($state): bool => $state === 'Solucionado',
                'warning' => fn ($state): bool => $state === 'En Proceso',
                'danger' => fn ($state): bool => $state === 'Sin Resolver',
                 ])
                ->searchable()
                ->toggleable()
                ->label('Status'),

            ])
            ->prependBulkActions([

                ExportBulkAction::make('Descargar Registro')->icon('heroicon-s-cloud-download')

            ])
            
            ->filters([
                
                SelectFilter::make('tipo_in')
                    ->label('Tipo de Incidencia')
                    ->options([
                        'Academica' => 'Academica',
                        'Docente' => 'Docente',
                        'Estudiantil' => 'Estudiantil',
                        'Administrativa' => 'Administrativa',
                        'Inmobiliaria' => 'Inmobiliaria',
                    ]),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'Solucionado' => 'Solucionado',
                        'En Proceso' => 'En Proceso',
                        'Sin Resolver' => 'Sin Resolver',
                    ]),

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
            'index' => Pages\ListIncidencias::route('/'),
            'create' => Pages\CreateIncidencias::route('/create'),
            'edit' => Pages\EditIncidencias::route('/{record}/edit'),
        ];
    }
}
 