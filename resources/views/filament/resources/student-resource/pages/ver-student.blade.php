<x-filament::page>

	

		<x-filament::card>
		
		<head>

		<font class="contenedor" color="#FFCC00" face="Comic Sans MS,arial" size=5>DATOS PERSONALES:</font>
  
		</head>

		<ul>

			<li class="contenedor">NOMBRES: {{$record->nombre}}</li>
			<li class="contenedor">APELLIDOS: {{$record->apellido}}</li>
			<li class="contenedor">DOCUMENTO DE IDENTIDAD: {{$record->tipo_documento}} {{$record->numero_documento}} </li>
			<li class="contenedor">FECHA DE NACIMIENTO: {{$record->fecha_na}}</li>
			<li class="contenedor">SEXO: {{$record->sexo}}</li>
			<li class="contenedor">EMAIL: {{$record->email}}</li>
			<li class="contenedor">TELEFONO: {{$record->telefono}}</li>
			<li class="contenedor">CONTACTO EN CASO DE EMERGENCIA: {{$record->telefono_emer}}</li>
			<li class="contenedor">DIRECCION: {{$record->direccion}}</li>
			<li class="contenedor">

			DISCAPACIDAD: 

			@if($record->discapacidad == 1)
    			SI, {{$record->tipo_dicapacidad}}
			@else
    			NO
			@endif

			</li>
			<li class="contenedor">EMBARAZO: 

				@if($record->embarazo == 1)
    				SI
				@else
    				NO
				@endif

			</li>
			<li class="contenedor">MILITAR: 

				@if($record->militar == 1)
    				SI
				@else
    				NO
				@endif

			</li>	

		</ul>


		<head>

		<font class="contenedor" color="#FFCC00" face="Comic Sans MS,arial" size=5>DATOS ACADEMICOS:</font>
  
		</head>


		<ul>

			<li class="contenedor">STATUS DEL ESTUDIANTE: {{$record->status}}</li>
			<li class="contenedor">PERIODO DE INGRESO: {{$record->ingreso}}</li>
			<li class="contenedor">SEMESTRE: {{$record->semestre}}</li>
			<li class="contenedor">CAMBIO DE CARRERA: 

				@if($record->cambio_carrera == 1)
					SI
				@else
					NO
				@endif

			</li>
			<li class="contenedor">CAMBIO DE TURNO: 

				@if($record->cambio_turno == 1)
					SI
				@else
					NO
				@endif

			</li>
			<li class="contenedor">CAMBIO DE NUCLEO: 

				@if($record->cambio_nucleo == 1)
					SI
				@else
					NO
				@endif

			</li>
			<li class="contenedor">

			DELEGADO: 

			@if($record->delegado == 1)
    			SI, {{$record->tipo_delegado}}
			@else
    			NO
			@endif

			</li>
			<li class="contenedor">PERIODO ACADEMICO: {{$record->periodo_actual}}</li>
			<li class="contenedor">SECCION: {{$record->seccion}}</li>
			<li class="contenedor">INSCRITO EN SICEU: 

			@if($record->siceu == 1)
    			SI
			@else
    			NO
			@endif

			</li>
			<li class="contenedor">OBSERVACION: {{$record->observacion}}</li>

		</ul>



		  </x-filament::card>


	<style>

		.contenedor{
			display: flex;
			justify-content: center;
		}

	</style>


</x-filament::page>
