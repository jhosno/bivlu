<img img class="Membrete" src="img/membrete.png" alt="UPT - Aragua">
<br><br><br>
<h1 style="text-align: center">Listado de Usuarios {{$clase}} </h1>

<style type="text/css">
table{
    text-transform: capitalize;
}
h1
{
    text-align:center;
}
th
{
    color:white;
    background-color: navy;
}
.td_header {
    text-align: center;
}
</style>
<br><br><br>
<table style="width:100%" align="center">
    <thead>
        <tr class= "td_header">
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th> 
            <th>Tipo de Usuario</th> 
            <th style="text-transform: uppercase;">PNF</th> 
        </tr>
    </thead>
    <tbody>
        @foreach($data as $estudiante)
        <tr>
            <td>{{$estudiante->cedula}}</td>
            <td>{{$estudiante->nombres}}</td>
            <td>{{$estudiante->apellidos}}</td> 
            <td>{{$estudiante->user->user_level}}</td> 
            <td>{{$estudiante->user->user_level == 'estudiante' ? $estudiante->student->speciality->especialidad : 'N/A'}}</td> 
        </tr>
        @endforeach
    </tbody>
</table>
<br><br><br><br><br>

<p style="text-align: center;">
___________________________________________<br/>
<b>Prof(a). {{ $jefe->nombres}} {{$jefe->apellidos }}</b><br/>
JEFE DEL CENTRO DE INFORMACIÓN, <br>
SEDE NUEVA.
</p>