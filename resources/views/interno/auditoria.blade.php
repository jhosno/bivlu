@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Auditoría</a></li> 
</ul>

<div class="modal-header">Filtrado de Operaciones</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('bitacora') }}">
                        {{ csrf_field() }} 



<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-3 control-label">Usuario<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <select class="form-control" id="user_id" name="user_id">
                                    <option value="">Todos</option>
                                    @foreach( $usuarios as $k => $v )
                                    <option {{ $user_id == $v->id ? 'selected' : '' }}  value="{{ $v->id }}">{{$v->human->nombres.' '.$v->human->apellidos}}</option>
                                    @endforeach 
                                </select>

                            </div>
                            <label for="tipo" class="col-md-3 control-label">Tipo de Operación<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <select class="form-control" id="tipo" name="tipo">
                                    <option value="">Todos</option>
                                    <option {{ $tipo == 'Entrada' ? 'selected' : ''  }}>Entrada</option>
                                    <option {{ $tipo ==  'Salida' ? 'selected' : ''  }}>Salida</option>
                                    <option {{ $tipo ==  'Prestamos' ? 'selected' : ''  }}>Prestamos</option>
                                    <option {{ $tipo ==  'Eventos' ? 'selected' : ''  }}>Eventos</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="datetimepicker6" class="col-md-3 control-label">Inicio<b style="color:red">*</b></label>

                           <div class="input-group date col-md-3" id="datetimepicker6">
                                <input type="text" class="form-control" name="fi"  title="Seleccione fecha y hora de inicio de evento." value="{{ $fi }}" placeholder="Ej. 07/07/2017 07:30 AM" required ng-model="event.inicio"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <label for="datetimepicker7" class="col-md-3 control-label">Finalización<b style="color:red">*</b></label>

                            <div class="input-group date col-md-3" id="datetimepicker7">
                                <input type="text" class="form-control" name="ff"  title="Seleccione fecha y hora de finalización de evento." placeholder="Ej. 07/07/2017 11:00 AM" required ng-model="event.finalizacion" value="{{ $ff }}"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button type="submit" class="btn btn-primary">
                                    Filtrar
                                </button>
 
                            </div>
                        </div>
                    </form>
                </div>
 
<table class="orderedtable table">
    <caption>Bitácora
    </caption>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Tipo de Operación</th> 
            <th>Detalles</th> 
        </tr>
    </thead>
    <tbody>
@foreach($data as $value)
        <tr>
            <td>{{ date("d/m/Y h:i:s a",strtotime($value->created_at)) }}</td> 
            <td>{{ $value->user->human->nombres }} {{ $value->user->human->apellidos }}</td> 
            <td>{{ $value->tipo }}</td>  
            <td>{{ $value->detalles }}</td> 
          
        </tr>
@endforeach
    </tbody>
</table>
            <form id="miforma" method="post" action="{{ url('ejemplares') }}">
                <input type="hidden" name="_method" value="delete"> 
            </form>
@endsection

@section('scripts')
<script type="text/javascript">
@if(Session::has('exito'))
$.alert({
    title: 'Operación exitosa.',
    content: '{{ Session::get('exito') }}',
    type: 'green'
});
@endif
   
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false 
            }); 
             $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });

function paraEdit(id)
{

          $.ajax({
            url: '{{url('libros')}}/'+id+'/edit',
            method:'GET',
            data:{},
            success:function(data)
          {
            $('#all-modal').html(data).modal('show');
            $('#canc').on('click', function (event) {   $('.evento').html(''); });
              
          },
          error:function(data){
            console.log(data);
          }
      });
}
</script>
@endsection