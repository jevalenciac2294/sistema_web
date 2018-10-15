
<h1>Lista de Vehiculos</h1>

<table>
	<thead>
		<tr>
			<th> ID </th>
			<th> Matricula </th>
			<th> Modelo </th>
			<th> Color </th>
		</tr>
	</thead>
	<tbody>
		@foreach($vehiculo as $vehiculos)
		<tr>
			<td>{{$vehiculos->id}}</td>
			<td>{{$vehiculos->matricula}}</td>
			<td>{{$vehiculos->modelo}}</td>
			<td>{{$vehiculos->color}}</td>
		</tr>
		@endforeach
	</tbody>
</table>