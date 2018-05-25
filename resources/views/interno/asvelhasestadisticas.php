@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Estadísticas</a></li> 
</ul>

<div class="modal-header">Estadísticas</div>
                <div class="modal-body"> 
                        {{ csrf_field() }} 



<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                       

                            <label for="tipo" class="col-md-3 control-label">Tipo de Estadística<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <select class="form-control" id="tipo" name="tipo">
                                    <option value="">Todos</option>
                                    <option value="carnet" {{ $tipo == 'carnet' ? 'selected' : ''  }}>Emisi&oacute;n de Carnet</option>
                                    <option value="solvencia" {{ $tipo == 'solvencia' ? 'selected' : ''  }}>Emisi&oacute;n de Solvencias</option>
                                    <option value="libro" {{ $tipo == 'solvencia' ? 'selected' : ''  }}>Solventes y Morosos</option>
                                    <option value="poresp" {{ $tipo == 'solvencia' ? 'selected' : ''  }}>Préstamos por Especialidad</option>
                                    <option value="sala" {{ $tipo == 'solvencia' ? 'selected' : ''  }}>Eventos Internos y Externos</option>
                                  <!--  <option value="sala" {{ $tipo ==  'sala' ? 'selected' : ''  }}>Eventos</option>
                                    <option value="consultas" {{ $tipo ==  'consultas' ? 'selected' : ''  }}>Consultas</option>-->
                                </select>

                            </div>
                            <div class="col-md-6"></div>
                        </div>
<br>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="datetimepicker6" class="col-md-3 control-label">Tomar en cuenta desde<b style="color:red">*</b></label>

                           <div class="input-group date col-md-3" id="datetimepicker6">
                                <input type="text" id="jhon" class="form-control" name="fi"  title="Seleccione fecha y hora de inicio de evento." value="{{ $fi }}" placeholder="Ej. 07/07/2017 07:30 AM" required ng-model="event.inicio"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
<br>
                            </div>
                            <label for="datetimepicker7" class="col-md-3 control-label">Tomar en cuenta hasta<b style="color:red">*</b></label>

                            <div class="input-group date col-md-3" id="datetimepicker7">
                                <input type="text" id="mayba" class="form-control" name="ff"  title="Seleccione fecha y hora de finalización de evento." placeholder="Ej. 07/07/2017 11:00 AM" required ng-model="event.finalizacion" value="{{ $ff }}"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button onclick="makeQuery()"  class="btn btn-primary">
                                    Filtrar
                                </button>
 
                            </div>
                        </div> 
                </div>
                <div class="row">
                <div class="col-md-6">
                <div style="width:400px;height:400px;">
 <canvas id="donut" style="padding-left: 0;padding-right: 0;margin-left: auto;margin-right: auto;display: block;width: 800px;" height="400" width="400"></canvas></div></div>
<div id="estadistica" class="col-md-6" style="padding-top: 4em;"></div></div>
             <style type="text/css">
                 canvas{height:400px !important; width:400px !important;}
             </style>
@endsection

@section('scripts')
<script type="text/javascript">
@if(Session::has('Éxito'))
$.alert({
    title: 'Operación exitosa.',
    content: '{{ Session::get('Éxito') }}',
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

 
makeQuery = function(){
    var clase =$('#tipo').val(),url2;
    if(clase.trim()!='')
    {
        if( clase=="carnet") url2 = "{{url('estadisticas/carnet')}}";
        if( clase=="solvencia") url2 = "{{url('estadisticas/solvencia')}}";
        if( clase=="libro") url2 = "{{url('estadisticas/libro')}}";
        if( clase=="sala") url2 = "{{url('estadisticas/sala')}}";
        if( clase=="poresp") url2 = "{{url('estadisticas/poresp')}}";
         
          $.ajax({
            url:url2,
            method:'POST',
            data:{fi:$('#jhon').val(),ff:$('#mayba').val(),tipo:clase},
            success:function(data){
                $('#estadistica').html(data);
            }
                    });
    }
    else alert("Seleccione un tipo de estadistica que desea consultar.");
       
  };
</script>
@endsection