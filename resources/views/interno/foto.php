@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Usuario</a></li> 
    <li><a href="">Foto de perfil</a></li> 
</ul>

 
<div class="evento" style="max-width: 600px;margin: 0 auto;">
    <div class="modal-header">Restauración de Base de Datos</div>
                <div class="modal-body"> 
                        {{ csrf_field() }} 

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="clave" class="col-md-6 control-label" style="text-align: right;">Contraseña<b style="color:red">*</b></label>

                            <div class="col-md-6">
                                <input id="clave" title="Ingrese su clave de usuario." placeholder="Ingrese su clave de usuario" type="password" class="form-control" name="password" >

                            </div>
                            <label for="archivo" class="col-md-6 control-label" style="text-align: right;">Archivo<b style="color:red">*</b></label>

                            <div class="col-md-6">
                                <input     type="file" accept=".jpg, .png" style="width:auto;opacity:1;height:auto;position:static;" class="form-control" id="archivo" name="archivo" >

                            </div>
                             
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button id="boton3" class="btn btn-primary">
                                    Restaurar BD
                                </button><span id="capita"></span>
 
                            </div>
                        </div> 
                </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">

var contenidoArchivo = '';

$('#boton3').on('click', function() {
    var file = document.getElementById("archivo").files[0];
    if (file) {
        var reader = new FileReader();
        reader.readAsText(file, "UTF-8");
        reader.onload = function (evt) {
            contenidoArchivo = evt.target.result;
            $('#boton3').attr('disabled','disabled');
            $('#capita').html('Cargando');
            $.ajax({
                url: '{{url('restauracion')}}',
                method: 'POST',
                data: {
                    contenido : contenidoArchivo,
                    password : $('#clave').val()
                },
                success:function(data){
            $('#boton3').removeAttr('disabled');
            $('#capita').html('');
            $('#clave,#archivo').val('');
                    if(data=='Error')
                    {
$.alert({
    title: 'Error.',
    content: 'No se pudo continuar con la operación porque la contraseña ingresada fue incorrecta.',
    type: 'red'
});
                    }
                    else
                    {
$.alert({
    title: 'Operación Exitosa.',
    content: 'Base de datos restaurada con éxito.',
    type: 'green'
});
                    }
                }
            });
        }
        reader.onerror = function (evt) {
            contenidoArchivo = "error reading file";
        }
    }
});

 
</script>
@endsection