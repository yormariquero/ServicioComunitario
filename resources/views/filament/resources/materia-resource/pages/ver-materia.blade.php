<x-filament::page>

	<x-filament::card>
<head>

		<ul>

			<li class="contenedor">NOMBRES: {{$record->nombre}}</li>
			<li class="contenedor">CODIGO: {{$record->codigo}}</li>
			<li class="contenedor">SEMESTRE: {{$record->SEMESTRE}}</li>
			<li class="contenedor">UC: {{$record->UC}}</li>
			<li class="contenedor">HORAS DE TEORIA: {{$record->horasT}}</li>
			<li class="contenedor">HORAS DE PRACTICA: {{$record->horasP}}</li>
			<li class="contenedor">HORAS DE LBORATORIO: {{$record->horasL}}</li>

		</ul>

		<ul>

			<li class="contenedor">{{$record->horario}}</li>

		</ul>

	<style>

		.contenedor{
			display: flex;
			justify-content: center;
		}

	</style>

	</head>


	</x-filament::card>	

</x-filament::page>

