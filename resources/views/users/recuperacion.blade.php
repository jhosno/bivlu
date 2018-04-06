@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Recuperación de Contraseña</a></li>  
</ul>

 <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="{{$usuario[0]->id}}">
<div class="evento" style="max-width: 600px;margin: 0 auto;">
    <div class="modal-header">Recuperación de Contraseña</div>
                <div class="modal-body"> 
                        {{ csrf_field() }} 
 
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="clave" class="col-md-6 control-label" style="text-align: right;">{{ $usuario[0]->domanda_di_securida }}<b style="color:red">*</b></label>

                            <div class="col-md-6">
                                <input id="clave" title="Ingrese su clave de usuario." placeholder="Ingrese su respuesta de seguridad" type="password" class="form-control" name="password" >

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