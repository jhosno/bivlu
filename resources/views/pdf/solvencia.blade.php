<img img class="Membrete" src="img/membrete.png" alt="UPT - Aragua">
<!-- <p style="text-align: center;"> 
    República Bolivariana de Venezuela<br/>Ministerio del Poder Popular para la Educación Universitaria, Ciencia y Tecnología<br/>Universidad Politécnica Territorial de Aragua<br/>"Federico Brito Figueroa"
</p> --><br><br>
<br>
<h1 style="text-align: center">Carta de Solvencia</h1>
<br><br>

<p style="text-align: justify; text-indent: 1cm; line-height: 1.5; ">
@if(!isset($data['prestamos']) && !isset($data['solicitudes']))
    Quien suscribe, en su carácter de encargada de la Biblioteca Universitaria, ubicadas en la sede de la Universidad Politécnica Territorial de Aragua,  les hago saber que el(la) ciudadano(a) <b>{{ $persona->nombres }}  {{ $persona->apellidos }} </b> ,  titular de la Cédula de Identidad No. <b>{{ $persona->cedula }} </b>, nada debe por concepto de libros, encontrándose totalmente <b>SOLVENTE</b> para con la comunidad Bibliotecaria.
</p>
<p style="text-align: justify;">
Otorgo esta solvencia a petición de parte interesada.
</p>
@else
<p style="text-align: justify;">
    Quien suscribe, en su carácter de encargada de la Biblioteca Universitaria, ubicadas en la sede de la Universidad Politécnica Territorial de Aragua,  les hago saber que el(la) ciudadano(a) {{ $persona->nombres }}  {{ $persona->apellidos }}  ,  titular de la Cédula de Identidad No. {{ $persona->cedula }},  tiene deudas  para con la comunidad Bibliotecaria, detalladas a continuación. 
</p>

    @if(count($data['prestamos'])>0)
    <ul>
    @foreach( $data['prestamos'] as $value )
       <li> {{ $value['book']->titulo }} Ejemplar: {{ $value['item']->correlativo }} (Retirado de biblioteca y aún sin devolver)</li>
    @endforeach
    </ul>
    @endif

    @if(count($data['solicitudes'])>0)
    <ul>
    @foreach( $data['solicitudes'] as $value )
       <li> {{ $value['book']->titulo }} Ejemplar: {{ $value['item']->correlativo }} (Solicitud en espera)</li>
    @endforeach
    </ul>
    @endif
@endif
<br><br>
<br><br>
<br><br>
<br><br>
<p style="text-align: center;">
___________________________________________<br/>
<b>Prof(a). {{ $jefe->nombres}} {{$jefe->apellidos }}</b><br/>
JEFE DEL CENTRO DE INFORMACIÓN, <br>
SEDE NUEVA.
</p>