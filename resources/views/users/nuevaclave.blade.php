@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Recuperación de Contraseña</a></li>  
</ul>

 <form method="post" action="recuperar" enctype="multipart/form-data"> 
        <input type="hidden" name="id" value="{{$usuario->id}}">
<div class="evento" style="max-width: 600px;margin: 0 auto;">
    <div class="modal-header">Recuperación de Contraseña</div>
                <div class="modal-body"> 
                      Una nueva contraseña ha sido generada y enviada a su correo electronico.
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


    function validar(){
        var errores ='';
        if(! $('[name=contrasena]').val().match(/^(.)*([A-Z])(.)*$/))
        {
        errores += 'La clave debe tener al menos una mayuscula';
        }
        if(! $('[name=contrasena]').val().match(/^.*([0-9]).*$/))
        {
        errores += 'La clave debe tener al menos un digito';
        }
        if(! $('[name=contrasena]').val().match(/^.*([\$\!/\.\#\@\*]).*$/))
        {
        errores += 'La clave debe tener al menos alguno de estos simbolos: $ - ! - . - # - @ - *';
        }
        if(errores!='')
        {
            alert(errores);
            return false;
        }
        return true;
    }

</script>
@endsection