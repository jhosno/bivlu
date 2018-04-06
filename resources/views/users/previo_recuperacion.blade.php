@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Recuperación de Contraseña</a></li>  
</ul>

 <form method="post" enctype="multipart/form-data">
<div class="evento" style="max-width: 600px;margin: 0 auto;">
    <div class="modal-header">Recuperación de Contraseña</div>
                <div class="modal-body"> 
                        {{ csrf_field() }} 
 
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="clave" class="col-md-6 control-label" style="text-align: right;">Ingrese su dirección de correo electrónico<b style="color:red">*</b></label>

                            <div class="col-md-6">
                                <input id="email" title="Ingrese su correo electrónico." placeholder="Ingrese su correo electrónico" type="email" class="form-control" name="email" >

                            </div>
                           
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button id="boton3" class="btn btn-primary">
                                    Siguiente
                                </button><span id="capita"></span>
 
                            </div>
                        </div> 

                </div>
</div>
</form>
@endsection

@section('scripts')
<script type="text/javascript">
 @if(Session::has('error'))
$.alert({
    title: 'Fallo.',
    content: 'El correo no existe.' ,
    type: 'red'
});
@endif
 @if(Session::has('error2'))
$.alert({
    title: 'Fallo.',
    content: 'Respuesta incorrecta.' ,
    type: 'red'
});
@endif
</script>
@endsection