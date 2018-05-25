@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">{{$perspective=='admin'? 'Préstamos' : 'Mis  Préstamos'}}</a></li> 
</ul>

<div class="evento"></div>

<table class="table orderedtable">
    <caption>
        {{$perspective=='admin'? 'Préstamos' : 'Mis Préstamos'}}
    </caption>
    <thead>
        <tr>
            <th>Usuario</th> 
            <th>Fecha</th>
            <th>Cant. Libros</th> 
            <th>Acciones</th> 
        </tr>
    </thead>
    <tbody>
@foreach($usuarios as $value)
@if(!isset($cuentas[$value->id]) || count($cuentas[$value->id]) == 0 )
@continue
@endif
  @foreach($cuentas[$value->id] as $key2 => $value2)

                  <tr> 
                      <td>{{ $value->human->nombres }} {{ $value->human->apellidos }}</td>  
                      <td>{{ date("d/m/Y", strtotime($key2)) }}</td>
                      <td>{{ $value2 }}</td>
                      <td> 
                          <a title="Visualizar" href="{{ url('prestamos/'.$value->id.'/'. 
                          date("Y-m-d", strtotime($key2)) ) }}"><i class="material-icons ">remove_red_eye</i></a>
 
                      </td>
                  </tr>
  @endforeach
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
    title : 'Confirmar Operación de Cancelación',
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