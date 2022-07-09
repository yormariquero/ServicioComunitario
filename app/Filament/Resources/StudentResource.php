<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use App\Models\Materia;
use Closure;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Collection;
use Filament\Forms\Components\Wizard; 


class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            Forms\Components\Card::make()
                ->schema([
                    Wizard::make([
                        Wizard\Step::make('Datos Personales')
                            ->description('Datos Personales del Estudiante')
                            ->icon('heroicon-o-user-add')
                            ->schema([
                    
                Forms\Components\TextInput::make('nombre')
                ->label('Nombres')
                ->required(),
                Forms\Components\TextInput::make('apellido')
                ->label('Apellidos')
                ->required(),
                Forms\Components\Select::make('tipo_documento')
                                ->label('Tipo de Documento')
                                ->options([
                                    'V' => 'V',
                                    'E' => 'E',
                                    'J' => 'J',
                                ])
                                ->required(),
                Forms\Components\TextInput::make('numero_documento')
                                ->label('Numero de Documento')
                                ->numeric()
                                ->required(),
                Forms\Components\DatePicker::make('fecha_na')
                        ->label('Fecha de Nacimiento')
                        ->required()
                        ->format('Y-m-d')
                        ->displayFormat('d/m/Y'),
                Forms\Components\Select::make('sexo')
                        ->label('Sexo')
                        ->reactive()
                        ->options([
                            'M' => 'Masculino',
                            'F' => 'Femenino',
                        ]),
                Forms\Components\Toggle::make('embarazo')
                        ->label('¿Estas embarazada?')
                        ->inline(false)
                        ->hidden(fn (Closure $get) => $get('sexo') !== 'F'),
                Forms\Components\TextInput::make('email')
                        ->email()
                        ->required(),
                Forms\Components\TextInput::make('telefono')
                        ->numeric()
                        ->required(),
                Forms\Components\TextInput::make('telefono_emer')
                        ->numeric()
                        ->different('telefono')
                        ->label('Número de Contacto en caso de Emergencia')
                        ->required(),
                Forms\Components\TextInput::make('direccion')
                        ->required(),
                Forms\Components\Toggle::make('discapacidad')
                        ->label('¿Posees alguna discapacidad?')
                        ->reactive()
                        ->inline(false),
                Forms\Components\TextInput::make('tipo_discapacidad')
                        ->label('¿Cuál es tu Discapacidad?')
                        ->columnSpan(1)
                        ->hidden(fn (Closure $get) => $get('discapacidad') !== true),
                Forms\Components\Toggle::make('militar')
                        ->label('¿Eres Militar?')
                        ->inline(false),

                ]),

                Wizard\Step::make('Datos Academicos')
                            ->description('Dtos Academicos del Estudiante')
                            ->icon('heroicon-o-book-open')
                            ->schema([
                Forms\Components\Toggle::make('delegado')
                        ->label('¿Eres Delegado de Curso?')
                        ->reactive()
                        ->inline(false),
                Forms\Components\Select::make('tipo_delegado')
                                ->label('Puesto del Delegado')
                                ->options([
                                    'Comandante' => 'Comandante de Curso',
                                    'Sub-Comandante' => 'Sub-Comandante de Curso',
                                ])
                            ->columnSpan(1)        
                            ->hidden(fn (Closure $get) => $get('delegado') !== true), 
                Forms\Components\Select::make('status')
                                ->label('Status del Estudiante')
                                ->options([
                                    'Regular' => 'Regular',
                                    'Resagado' => 'Resagado',
                                    'Suspendido' => 'Suspendido',
                                ])
                                ->required(),
                Forms\Components\TextInput::make('ingreso')
                        ->label('Periodo de ingreso')
                        ->required(),  
                Forms\Components\Toggle::make('siceu')
                        ->label('¿Estas inscrito en el SICEU?')
                        ->inline(false),
                Forms\Components\Toggle::make('cambio_carrera')
                        ->label('¿Has realizado cambio de carrera?')
                        ->inline(false),
                Forms\Components\Toggle::make('cambio_turno')
                        ->label('¿Has realizado cambio de turno?')
                        ->inline(false),
                Forms\Components\Toggle::make('cambio_nucleo')
                        ->label('¿Has realizado cambio de nucleo?')
                        ->inline(false),
                ]),


                 Wizard\Step::make('Pre-inscripción')
                            ->description('Pre-inscripción del Estudiante')
                            ->icon('heroicon-o-document-add')
                            ->schema([
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
                Forms\Components\TextInput::make('seccion')
                        ->label('Sección')
                        ->required(),                
                Forms\Components\TextInput::make('periodo_actual')
                        ->label('Periodo academico actual')
                        ->required(),
                Forms\Components\MultiSelect::make('materias')
                    ->relationship('materias', 'nombre')
                    ->options(Materia::all()->pluck('nombre', 'id')),
                              
                Forms\Components\Textarea::make('observacion')
                        ->label('Observación'),
                
                                ]),
                        
                    ])->columns(2),
                    
                ]),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('periodo_actual')
                ->sortable()
                ->searchable()
                ->toggleable()
                ->label('Periodo'),
                 BadgeColumn::make('status')
                ->colors([
                'primary',
                'success' => fn ($state): bool => $state === 'Regular',
                'warning' => fn ($state): bool => $state === 'Resagado',
                'danger' => fn ($state): bool => $state === 'Suspendido',
                 ])
                ->searchable()
                ->toggleable()
                ->label('Status'),
                Tables\Columns\TextColumn::make('tipo_documento')
                ->searchable()
                ->toggleable()
                ->label('Tipo'),
                Tables\Columns\TextColumn::make('numero_documento')
                ->searchable()
                ->toggleable()
                ->label('Documento'),
                Tables\Columns\TextColumn::make('nombre')
                ->searchable()
                ->toggleable()
                ->label('Nombres'),
                Tables\Columns\TextColumn::make('apellido')
                ->searchable()
                ->toggleable()
                ->label('Apellidos'),
                Tables\Columns\TextColumn::make('fecha_na')
                ->searchable()
                ->toggleable()
                ->label('Fecha de Nacimiento'),
                Tables\Columns\TextColumn::make('sexo')
                ->searchable()
                ->toggleable()
                ->label('Sexo'),
                Tables\Columns\TextColumn::make('semestre')
                ->sortable()
                ->searchable()
                ->toggleable()
                ->label('Semestre'),
                Tables\Columns\TextColumn::make('seccion')
                ->sortable()
                ->searchable()
                ->toggleable()
                ->label('Sección'),
                IconColumn::make('tipo_delegado')
                ->label('Delegado')
                ->toggleable()
                ->options([
                        'heroicon-o-sun' => 'Comandante',
                        'heroicon-o-star' => 'Sub-Comandante',
                        ]),
                BooleanColumn::make('siceu')
                ->searchable()
                ->toggleable()
                ->label('SICEU'),
                Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->toggleable()
                ->label('Correo'),
                Tables\Columns\TextColumn::make('telefono')
                ->searchable()
                ->toggleable()
                ->label('Telefono'),
                Tables\Columns\TextColumn::make('direccion')
                ->searchable()
                ->toggleable()
                ->label('Dirección'),
                BooleanColumn::make('discapacidad')
                ->searchable()
                ->toggleable()
                ->label('Discapacidad'),
                BooleanColumn::make('embarazo')
                ->searchable()
                ->toggleable()
                ->label('Embarazo'),
                BooleanColumn::make('militar')
                ->searchable()
                ->toggleable()
                ->label('Militar'),
                Tables\Columns\TextColumn::make('ingreso')
                ->sortable()
                ->searchable()
                ->toggleable()
                ->label('Ingreso'),
                BooleanColumn::make('cambio_carrera')
                ->searchable()
                ->toggleable()
                ->label('Cambio de Carrera'),
                 BooleanColumn::make('cambio_turno')
                ->searchable()
                ->toggleable()
                ->label('Cambio de Turno'),
                BooleanColumn::make('cambio_nucleo')
                ->searchable()
                ->toggleable()
                ->label('Cambio de Nucleo'),
                Tables\Columns\TextColumn::make('observacion')
                ->html()
                ->searchable()
                ->toggleable()
                ->label('Observación'),

            ])
            ->filters([ 

                TernaryFilter::make('siceu'),

                TernaryFilter::make('militar'),

                TernaryFilter::make('cambio_carrera'),

                TernaryFilter::make('cambio_nucleo'),

                TernaryFilter::make('cambio_turno'),

                TernaryFilter::make('embarazo'),

                MultiSelectFilter::make('status')
                    ->options([
                        'Regular' => 'Regular',
                        'Resagado' => 'Resagado',
                        'Suspendido' => 'Suspendido',
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

                MultiSelectFilter::make('tipo_delegado')
                    ->label('Delegado')
                    ->options([
                        'Comandante' => 'Comandante de Curso',
                        'Sub-Comandante' => 'Sub-Comandante de Curso',
                    ]),

                SelectFilter::make('sexo')
                    ->label('Sexo')
                    ->options([
                        'M' => 'Masculino',
                        'F' => 'Femenino',
                    ]),

            ])

            ->prependBulkActions([

                ExportBulkAction::make('Descargar Registro')->icon('heroicon-s-cloud-download'),

            ])

            ->actions([
                Tables\Actions\Action::make('ver')
                    ->label('Ver')
                    ->url(fn (Student $record): string => route('filament.resources.students.ver-student', $record))
                    ->icon('heroicon-s-eye'),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [ 
            RelationManagers\MateriasRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
            'ver-student' => Pages\VerStudent::route('/{record}/ver'),
          
        ];
    }
}
