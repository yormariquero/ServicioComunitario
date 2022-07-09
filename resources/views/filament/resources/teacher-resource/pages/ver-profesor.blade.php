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
			<li class="contenedor">EMAIL: {{$record->email}}</li>
			<li class="contenedor">TELEFONO: {{$record->telefono}}</li>
			<li class="contenedor">DIRECCION: {{$record->direccion}}</li>
			<li class="contenedor">

			HIJOS: 

			@if($record->hijo == 1)
    			SI, {{$record->cantidad_hijo}}
			@else
    			NO
			@endif

			</li>

		</ul>


		<head>

		<font class="contenedor" color="#FFCC00" face="Comic Sans MS,arial" size=5>DATOS LABORALES:</font>
  
		</head>


		<ul>

			<li class="contenedor">STATUS DEL DOCENTE: {{$record->status}}</li>
			<li class="contenedor">CATEGORIA: {{$record->categoria}}</li>
			<li class="contenedor">ANTIGUEDAD: {{$record->antiguedad}}</li>
			<li class="contenedor">HORAS DE TRABAJO: {{$record->horas_trabajo}}</li>

		</ul>



		  </x-filament::card>


	<style>

		.contenedor{
			display: flex;
			justify-content: center;
		}

	</style>

</x-filament::page>
