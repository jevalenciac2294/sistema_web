
<h1>Lista de vehiculos por rutas</h1>

<table>
    <thead>

    	<tr>
        <th>    Matricula  </th>
        <th>    Ruta  </th>
        </tr>
    </thead>
    <tbody>

        @foreach($datos as $vr)
            
       <tr>

        <td>{{$vr['matricula']}}</td>
        <td>{{$vr['name']}}</td>     
		</tr>

         @endforeach
<!---->
    </tbody>

</table>