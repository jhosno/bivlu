<p style="text-align: center;"> 
<img img class="Membrete" src="img/membrete.png" alt="UPT - Aragua">
</p>
<br><br>
<br><br>
<br><br>
<h1 style="text-align: center;">Solicitud de Evento</h1>
<br><br>
<p>A quien pudiere interesar</p>
<p style="text-align: justify; text-indent: 1cm; line-height: 1.5; ">
    Quien suscribe, hace solicitud del espacio de la biblioteca de la Universidad Politécnica Territorial de Aragua, a fin de dar lugar al evento de temática 
    <b>{{ $evento->nombre }}</b>, a iniciar en fecha 
    <b>{{date("d/m/Y",strtotime($evento->fecha_inicio)) }}</b>, y a finalizar en fecha 
	<b>{{date("d/m/Y",strtotime($evento->fecha_finalizacion)) }}</b>, propuesto por 
    <b>{{  $evento->nombre_responsable }}</b>. Se preven unos 
    <b>{{ $evento->cantidad_asistentes }}</b> asistentes.
</p>
<p style="text-align: justify;">
Esperando por su aprobaci&oacute;n.
</p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<p style="text-align: center;">
___________________________________________<br/>
<b>{{ $jefe->nombres}} {{$jefe->apellidos }}</b><br/>
JEFE DE CENTRO DE INFORMACIÓN
SEDE PRINCIPAL
</p>