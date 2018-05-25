@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Actividades del Mes</a></li> 
</ul>

<a  id="new-trigger" data-toggle="modal" data-titulo="Inicio de Sesión"  data-target="all-modal" class="btn btn-primary primary-btn"><i class="material-icons ">add</i> Agregar evento</a>
<div class="evento">
    
</div>
<form method="GET">
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
                            <div class="col-md-8 col-md-offset-2">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button type="submit" class="btn btn-primary">
                                    Filtrar
                                </button>
 
                            </div>
                        </div>
</form>
                        <br/><br/><br/>
<div class="wrapper " id="contenedor_eve" >
@foreach($data as $value)
                <div class="col-md-12"  >
                    <div class="bs-component well" style="text-align: left;">
                    <h4>{{ $value['nombre'] }}</h4>
                    <strong>Inicio:</strong>{{ $value['inicio'] }}<br/>
                    <strong>Finalizacion:</strong>{{ $value['finalizacion'] }}<br/>
                    <section class="tags" style="width:50%; height: 50%">
                    <p>{{ $value['detalles'] }}</p>
                   
                    </section> 
                    </div>
                </div>
@endforeach
            </div>
@endsection

@section('scripts')
<script type="text/javascript">
@if(Session::has('Éxito'))
$.alert({
    title: 'Condiciones de uso.',
    content: 'Se ha realizado con éxito la solicitud del evento. Le informamos que al hacerse efectiva la solicitud ud acepta las reglas y normas de uso del área y queda bajo su responsabilidad el uso adecuado del espacio y su mobiliario, el orden y limpieza. Gracias por elegirnos',
    type: 'green'
});
@endif
@if(Session::has('error2'))
$.alert({
    title: 'Evento no introducido.',
    content: 'Evento planificado ya en dicho intervalo.',
    type: 'red'
});
@endif
@if(Session::has('error'))
$.alert({
    title: 'Evento no introducido.',
    content: 'Ya existe un evento planificado para ese día.',
    type: 'red'
});
@endif
@if(Session::has('error3'))
$.alert({
    title: 'Evento no introducido.',
    content: 'Debe introducir los eventos con un mínimo de 5 días de antelación.',
    type: 'red'
});
@endif
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

       $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false 
            }); 
             $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
</script>
@endsection