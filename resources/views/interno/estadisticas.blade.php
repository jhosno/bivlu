@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Estadísticas</a></li> 
</ul>

<div class="modal-header">Estadísticas</div>
                <div class="modal-body"> 
                        {{ csrf_field() }} 


<form class="search form">
                   <div class="row">
                       <div class="col-md-9"><select class="form-control" id="clase">
                                    <option value="">Seleccione</option>
                                    <option>Libros</option>
                                    <option>Proyectos</option>
                                    <option>PNF</option>
                                    <option>Lector</option>
                                    <option>Autor</option>
                                    <option>Eventos</option>
                       </select></div>
                       <div class="col-md-3"><input type="button" onclick="makeQuery()" class="btn btn-raised btn-primary" value="Continuar"/></div>
                   </div> 
                </form> 
                <form  method="post" id="mentirosaDeMierdaTeVoyAMeterUnTenedorInfectadoConTetanosPorLaQK">
                    
                <div id="resultadosNuevos"></div> 
                <canvas id="donut">Lo sentimos, la etiqueta canvas no es soportada por su navegador.</canvas>
                </form>
                </div>
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
    var clase =$('#clase').val(),mon_petit_url;
    if(clase.trim()!='')
    {
        $('#mentirosaDeMierdaTeVoyAMeterUnTenedorInfectadoConTetanosPorLaQK').attr('action',"{{url('estadisticas')}}"+'/'+clase);
         mon_petit_url = "{{url('estadisticas/get')}}"+'/'+clase;
         
          $.ajax({
            url: mon_petit_url,
            method:'GET',
            data:{},
            success:function(data){
                $('#resultadosNuevos').html(data);
            }
                    });
    }
    else alert("Seleccione un tipo de estadistica que desea consultar.");
  };
</script>
@endsection