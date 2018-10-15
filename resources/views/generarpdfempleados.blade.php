
<h1>Lista de Empleados</h1>

<table>
	<thead>
		<tr>
			<th> ID </th>
			<th> Nombre </th>
			<th> Apellidos </th>
			<th> Correo </th>
		</tr>
	</thead>
	<tbody>
		@foreach($empleado as $empleados)
		<tr>
			<td>{{$empleados->id}}</td>
			<td>{{$empleados->name}}</td>
			<td>{{$empleados->apellidoS}}</td>
			<td>{{$empleados->email}}</td>
		</tr>
		@endforeach
	</tbody>
</table>