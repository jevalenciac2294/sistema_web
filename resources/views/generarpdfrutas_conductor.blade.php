
<h1>Lista de de empleados por rutas</h1>

<table>
    <thead>
    	<tr>
        <th>    Nombre Conductor  </th>
        <th>    Ruta  </th>
    </tr>
    </thead>
    <tbody>
        @foreach($datos as $empleados)       
        <tr>

        <td>{{$empleados['name']}}</td>
        <td>{{$empleados['nombre_ruta']}}</td>
		</tr>   
   
         @endforeach
<!---->
    </tbody>

</table>



