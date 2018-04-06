@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Mantenimiento</a></li> 
    <li><a href="">Respaldo</a></li> 
</ul>

 
<div class="evento" style="max-width: 600px;margin: 0 auto;">
    <div class="modal-header">Respaldo de Base de Datos</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('respaldo') }}">
                        {{ csrf_field() }} 

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" style="text-align: right;" class="col-md-6 control-label">Contraseña<b style="color:red">*</b></label>

                            <div class="col-md-6">
                                <input id="evento" title="Ingrese su clave de usuario." placeholder="Ingrese su clave de usuario" type="password" class="form-control" name="password" value="{{ isset($evento)? $evento['evento'] : '' }}">

                            </div>
                             
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button type="submit" class="btn btn-primary">
                                    Emitir Respaldo
                                </button>
 
                            </div>
                        </div>
                    </form>
                </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
@if(Session::has('error'))
$.alert({
    title: 'Error.',
    content: 'No se pudo continuar con la operación porque la contraseña ingresada fue incorrecta.',
    type: 'red'
});
@endif
      
</script>
@endsection