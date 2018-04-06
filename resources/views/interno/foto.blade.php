@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Usuario</a></li> 
    <li><a href="">Perfil</a></li> 
</ul>

 <form method="post" enctype="multipart/form-data">
<div class="evento" style="max-width: 600px;margin: 0 auto;">
    <div class="modal-header">Perfil de {{$usuario->human->nombres}} {{$usuario->human->apellidos}}</div>
                <div class="modal-body"> 
                        {{ csrf_field() }} 
<div>
    <img style="max-width: 200px;" src="{{ (!(isset($foto)) || $foto=='') ? asset('img/usr.png') : url('uploads/'.$foto) }} ">
</div>

<div class="form-group">

<div class="col-md-6" >
    <label for="" class="control-label">
        Cédula:
    </label>
    <input id="cedula" type="text" title="Ingrese su cédula" placeholder="Ej. 2312122" onkeypress="return event.which>=48 && event.which<=57" onchange="buscar()" maxlength="9" class="form-control" value="{{$usuario->human->cedula}}" name="cedula"  required autofocus disabled>
</div>

<div class="form-group">

<div class="col-md-6" >
    <label for="" class="control-label ">
        Correo Electrónico: *
    </label>
    <input id="email" type="email" title="Ingrese su dirección de correo electrónico." placeholder="Ej. asasa12@hotmail.com"   class="form-control" value="{{$usuario->email}}" name="email"  required autofocus>
</div>

<div class="col-md-6" >
    <label for="" class="control-label ">
        Nombres:
    </label>
     <input id="n" type="text" title="Nombres del usuario" placeholder="Ej. Jose"  value="{{$usuario->human->nombres}}" class="form-control datos_persona" name="nombres"   required disabled>
</div>

<div class="col-md-6" >
    <label for="" class="control-label ">
        Apellidos:
    </label>
         <input id="n" type="text" title="Nombres del usuario" placeholder="Ej. Jose"  value="{{$usuario->human->apellidos}}" class="form-control datos_persona" name="nombres"   required disabled>
</div>

<div class="col-md-6" >
    <label for="" class="control-label ">
        Contraseña nueva:
    </label>
    <input id="n" type="password" title="Su clave de acceso." placeholder="*******"  class="form-control " name="contrasena"    >
</div>

<div class="col-md-6" >
    <label for="" class="control-label ">
        Confirme contraseña (solo si desea cambiarla):
    </label>
    <input class="form-control " title="Repita la contraseña ingresada." placeholder="*******" type="password" onchange="if(this.value!=$('[name=contrasena]').val()) {alert('Contraseñas no coinciden'); this.value='';}"  name="contrasena_2"    > 
</div>

<div class="col-md-6" >
    <label for="" class="control-label ">
        Contraseña(ingrese contraseña actual para realizar cualquier cambio):
    </label>
    <input id="clave" title="Ingrese su clave de usuario." placeholder="Ingrese su clave de usuario actual" type="password" class="form-control" name="password" >
</div>

<div class="col-md-6" >
    <label for="" class="control-label ">
        Pregunta de Seguridad (Requerida para la recuperación de contraseña)
    </label>
    <select class="form-control " title="Seleccione una pregunta de seguridad en caso de extravio de contraseña."  name="domanda_di_securida"  >
        <option value="">Seleccione Pregunta de Seguridad</option>
        <option {{ $usuario->domanda_di_securida === 'Nombre de la mascota' ? 'selected' : '' }} >Nombre de la mascota</option>
        <option {{ $usuario->domanda_di_securida === 'Postre favorito' ? 'selected' : '' }}>Postre favorito</option>
        <option {{ $usuario->domanda_di_securida === 'Ciudad de nacimiento' ? 'selected' : '' }}>Ciudad de nacimiento</option>
        <option {{ $usuario->domanda_di_securida === 'Apellido de soltera de la madre' ? 'selected' : '' }}>Apellido de soltera de la madre</option>
        <option {{ $usuario->domanda_di_securida === 'Mejor amigo de la infancia' ? 'selected' : '' }}>Mejor amigo de la infancia</option>
        <option {{ $usuario->domanda_di_securida === 'Heroe de la infancia' ? 'selected' : '' }}>Heroe de la infancia</option>
    </select> 
</div>

<div class="col-md-6" >
    <label for="" class="control-label ">
        Respuesta de Seguridad
    </label>
    <input id="answer" title="Ingrese su respuesta para la pregunta de seguridad seleccionada." placeholder="Ingrese respuesta a la pregunta de seguridad." type="password" class="form-control" name="answer" >
</div>

<div class="col-md-6" >
    <label for="" class="control-label ">
        Foto (solo si desea cambiarla)
    </label>
    <input   onchange="return Validate(document.forms[0]);"  type="file" accept=".png,.jpg" style="width:auto;opacity:1;height:auto;position:static;" class="form-control" id="archivo" name="archivo" >
</div>







</div>

<!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <label for="evento" class="col-md-3 control-label">Cédula:<b style="color:red">*</b></label>
                            <div class="col-md-3">
                                <input id="cedula" type="text" title="Ingrese su cédula" placeholder="Ej. 2312122" onkeypress="return event.which>=48 && event.which<=57" onchange="buscar()" maxlength="9" class="form-control" value="{{$usuario->human->cedula}}" name="cedula"  required autofocus disabled>
                            </div>
                            <label for="evento" class="col-md-3 control-label">Correo Electrónico:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="email" type="email" title="Ingrese su dirección de correo electrónico." placeholder="Ej. asasa12@hotmail.com"   class="form-control" value="{{$usuario->email}}" name="email"  required autofocus>

                            </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Nombres:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="n" type="text" title="Nombres del usuario" placeholder="Ej. Jose"  value="{{$usuario->human->nombres}}" class="form-control datos_persona" name="nombres"   required disabled>

                            </div>
                            <label for="apellidos" class="col-md-3 control-label">Apellidos:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input class="form-control datos_persona"  title="Apellidos del usuario" value="{{$usuario->human->apellidos}}" placeholder="Ej. Tovar" name="apellidos"  disabled  required> 

                            </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Nueva Contraseña:</label>

                            <div class="col-md-3">
                                <input id="n" type="password" title="Su clave de acceso." placeholder="*******"  class="form-control " name="contrasena"    >

                            </div>
                            <label for="password" class="col-md-3 control-label">Confirme Nueva Contraseña (solo si desea cambiarla):</label>

                            <div class="col-md-3">
                                <input class="form-control " title="Repita la contraseña ingresada." placeholder="*******" type="password" onchange="if(this.value!=$('[name=contrasena]').val()) {alert('Contraseñas no coinciden'); this.value='';}"  name="contrasena_2"    > 

                            </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="clave" class="col-md-6 control-label" style="text-align: right;">Ingrese su Contraseña Actual<b style="color:red">*</b></label>

                            <div class="col-md-6">
                                <input id="clave" title="Ingrese su clave de usuario." placeholder="Ingrese su clave de usuario" type="password" class="form-control" name="password" >

                            </div>
                            <label for="archivo" class="col-md-6 control-label" style="text-align: right;">Archivo (Sólo si desea cambiar su foto)<b style="color:red">*</b></label>

                            <div class="col-md-6">
                                <input   onchange="return Validate(document.forms[0]);"  type="file" accept=".png,.jpg" style="width:auto;opacity:1;height:auto;position:static;" class="form-control" id="archivo" name="archivo" >

                            </div>
                             
    </div> -->

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button id="boton3" class="btn btn-primary">
                                    Cambiar perfil
                                </button><span id="capita"></span>
 
                            </div>
                        </div> 
                </div>
</div>
</form>
@endsection

@section('scripts')
<script type="text/javascript">

var contenidoArchivo = '';

var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    $.alert({
    title: 'Error.',
    content: 'Debe seleccionar una imagen.',
    type: 'red'
});
                    oInput.value="";
                    return false;
                }
            }
        }
    }
  
    return true;
}

</script>
@endsection