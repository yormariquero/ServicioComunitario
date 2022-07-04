<x-filament::page>

	<head>

		<ul>

			<li class="contenedor">NOMBRES: {{$record->nombre}}</li>
			<li class="contenedor">APELLIDOS: {{$record->apellido}}</li>
			<li class="contenedor">DOCUMENTO DE IDENTIDAD: {{$record->tipo_documento}} {{$record->numero_documento}} </li>

		</ul>

	<style>

		.contenedor{
			display: flex;
			justify-content: center;
		}

	</style>

	</head>

</x-filament::page>
