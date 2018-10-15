
<h1>Lista de Rutas</h1>

<table>
	<thead>
		<tr>
			<th> ID </th>
			<th> Nombre </th>
		</tr>
	</thead>
	<tbody>
		@foreach($ruta as $rutas)
		<tr>
			<td>{{$rutas->id}}</td>
			<td>{{$rutas->name}}</td>
		</tr>
		@endforeach
	</tbody>
</table>