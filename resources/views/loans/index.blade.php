@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="javascript:history.back();">{{$perspective=='admin'? 'Sin Devolver' : 'Mis  Préstamos Pendientes'}}</a></li> 
    
</ul>

<div class="evento"></div>

<table class="table">
    <caption>
        {{$perspective=='admin'? 'Sin Devolver' : 'Mis Préstamos Pendientes'}}
    </caption>
    <thead>
        <tr>
            <th>Libro</th>
            <th>Fecha de Retiro</th>
            <th>Fecha de Devolución</th>
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
                        <a title="Confirmar Devolución" onclick="devolver({{$value['loan']['id']}})" ><i class="material-icons ">check</i></a>
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

@if(Session::has('error'))
$.alert({
    title: 'Fallo.',
    content: '{{Session::get('error')}}' ,
    type: 'red'
});
@endif

function descartar(id)
{
  $.confirm({
    title : 'Operación de Descartar',
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

function devolver(id)
{

$.confirm({
    title : 'Operación de Devolución',
    content: '' +
    '<form id="formulario" action="'+'{{url('prestamos')}}/devolver/'+id+'" method="post" class="formName">' +
    '<div class="form-group">' +
    '<label>Observaciones (Opcional)</label>' +
    '<textarea name="observaciones" placeholder="Ej. Deterioro ligero." class="name form-control"></textarea>' +
    '</div>' +
    '</form>',
    buttons: {
        formSubmit: {
            text: 'Registrar Devolución',
            btnClass: 'btn-blue',
            action: function () {
                $('#formulario').submit();
            }
        },
        cancel: { 
        text:'Cancelar',
        action:function(){}
      }
    },
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