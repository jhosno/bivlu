@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">{{$perspective=='admin'? 'Propuestas' : 'Mis Solicitudes de Préstamos'}}</a></li> 
</ul>

<div class="evento"></div>

<table class="table orderedtable ">
    <caption>
        Propuestas de Eventos
    </caption>
    <thead>
        <tr>
            <th>Evento</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Finalización</th>
            <th>Responsable</th>
            <th>Teléfono de Contacto</th>
            <th>Acciones</th> 
        </tr>
    </thead>
    <tbody>
@foreach($data as $value)
                <tr>
                    <td>{{ $value['nombre'] }}</td>
                    <td>{{ $value['inicio'] }}</td>
                    <td>{{ $value['finalizacion'] }}</td>
                    <td>{{ $value['nombre_responsable'] }}</td> 
                    <td>{{ $value['telefono_responsable'] }}</td> 
                    <td>
                          <a title="Ver Solicitud" href="{{ url('eventos/'.$value['id']) }}"><i class="material-icons ">remove_red_eye</i></a>
                        <a  onclick="paraEdit({{$value['id']}})" ><i class="material-icons ">check</i></a>
            <a onclick="if(confirm('En verdad desea cancelar el evento?')){$('#miforma').attr('action','{{url('eventos')}}/'+{{$value['id']}}).submit();}" ><i class="material-icons ">delete</i></a>
                    </td>
                </tr>
@endforeach
            </tbody>
            </table>
            <form id="miforma" method="post" action="{{ url('eventos') }}">
                <input type="hidden" name="_method" value="delete"> 
            </form>
@endsection

@section('scripts')
<script type="text/javascript">
@if(Session::has('Éxito'))
$.alert({
    title: 'Operación exitosa.',
    content: '{{Session::get('Éxito')}}' ,
    type: 'green'
});
@endif
@if(Session::has('error_porno'))
$.alert({
    title: 'Error.',
    content: '{{Session::get('error_porno')}}' ,
    type: 'red'
});
@endif

function paraEdit(id)
{

          $.ajax({
            url: '{{url('eventos')}}/'+id+'/edit',
            method:'GET',
            data:{},
            success:function(data)
          {
            $('.evento').html(data);
            $('#canc').on('click', function (event) {   $('.evento').html(''); });
            $('.evento').html(data);
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false 
            }); 
             $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
          },
          error:function(data){
            console.log(data);
          }
      });
}

       $('#new-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal



          $.ajax({
            url: '{{url('eventos/create')}}',
            method:'GET',
            data:{},
            success:function(data)
          {
            $('.evento').html(data);
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false 
            }); 
             $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
            $('#canc').on('click', function (event) { $('.evento').html(''); });
          },
          error:function(data){
            console.log(data);
          }
      });
        });
</script>
@endsection