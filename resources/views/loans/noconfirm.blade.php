@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="javascript:history.back();">{{$perspective=='admin'? 'Solicitudes Virtuales' : 'Mis Solicitudes de Préstamos'}}</a></li> 
</ul>

<div class="evento"></div>

<table class="table orderedtable">
    <caption>
        {{$perspective=='admin'? 'Solicitudes Virtuales' : 'Mis Solicitudes de Préstamos'}}
    </caption>
    <thead>
        <tr>
            <th>Libro</th>
            <th>Fecha</th>
            <th>Fecha de Exp.</th>
            <th>Usuario</th> 
            <th>Estado</th>
            <th>Acciones</th> 
        </tr>
    </thead>
    <tbody>
@foreach($data as $value)
                <tr>
                    <td>{{ $value['book']['titulo'] }}</td>
                    <td>{{ $value['loan']['fecha'] }}</td>
                    <td>{{ $value['loan']['fecha_expiracion'] }}</td>
                    <td>{{ $value['usuario']['nombres'] }} {{ $value['usuario']['apellidos'] }}</td>  
                    <td>{{ $value['loan']['estado'] }}</td>
                    <td>
            @if($perspective=='admin')
                    @if($value['loan']['estado']!='CANCELADA')
                        <a title="Confirmar Retiro" onclick="confirmar({{$value['loan']['id']}})" ><i class="material-icons ">check</i></a>
                    @endif 
                      <a title="Descartar Petición" onclick="descartar({{$value['loan']['id']}});" ><i class="material-icons ">delete</i></a>
            @else
                    @if($value['loan']['estado']!='CANCELADA')
            <a title="Cancelar Solicitud" onclick="cancelar({{$value['loan']['id']}})" ><i class="material-icons ">delete</i></a>
            @endif
            @endif
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
@if(Session::has('exito'))
$.alert({
    title: 'Operación exitosa.',
    content: '{{Session::get('exito')}}' ,
    type: 'green'
});
@endif

function descartar(id)
{
  $.confirm({
    title : 'Operación de Descarte',
    content : 'Proceda si el ejemplar asignado se encuentra en su posición en la Biblioteca.',
    buttons: { 
      confirm:
      { 
        text:'Confirmar',
        action: function()
      {
        $('#miforma').attr('action','{{url('prestamos')}}/'+id).submit();
      }
      },
      cancel: 
      { 
        text:'Cancelar',
        action:function(){}
      }
    }
});
}

function confirmar(id)
{
  $.confirm({
    title : 'Operación de Retiro de libro',
    content : 'Proceda si el estudiante ha retirado personalmente el ejemplar.',
    buttons: {
      confirm:
      { 
        text:'Confirmar',
        action: function()
      {
        window.location = '{{url('prestamos')}}/confirmar/'+id;
      }
    },
      cancel: 
      { 
        text:'Cancelar',
        action:function(){}
      }
    }
});
}

function cancelar(id)
{
  $.confirm({
    title : 'Operación de Cancelación',
    content : 'Proceda si ya no necesita el ejemplar solicitado.',
    buttons: {
      confirm:
      { 
        text:'Confirmar',
        action: function()
      {
        window.location = '{{url('prestamos')}}/cancelar/'+id;
      }
    },
      cancel: 
      { 
        text:'Cancelar',
        action:function(){}
      }
    }
});
}

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