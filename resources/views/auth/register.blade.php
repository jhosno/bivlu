<div class="modal-header">Nuevo Usuario</div>
<div class="modal-body">
    <form class="form-horizontal" method="POST" onsubmit="return validar();" action="{{ url('estudiantes') }}">

        <input type="hidden" name="human_id" > 
        <input type="hidden" name="tranca" required title="Debe ingresar una cédula existente en sistema.">
        <input type="hidden" name="tranca" required title="Esta cédula ya esta registrada pruebe con la opción de recuperar contraseña">
        {{ csrf_field() }} 

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <label for="evento" class="col-md-3 control-label">Cédula:<b style="color:red">*</b></label>

            <div class="col-md-3">
                <input id="cedula" type="text" title="Ingrese su cédula" placeholder="Ej. 2312122" onkeypress="return event.which>=48 && event.which<=57" onchange="buscar()" maxlength="9" class="form-control" name="cedula"  required autofocus>

            </div>
            <label for="evento" class="col-md-3 control-label">Correo Electrónico:<b style="color:red">*</b></label>

            <div class="col-md-3">
                <input id="email" type="email" title="Ingrese su dirección de correo electrónico." placeholder="Ej. asasa12@hotmail.com"   class="form-control" name="email"  required autofocus>

            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="evento" class="col-md-3 control-label">Nombres:<b style="color:red">*</b></label>

            <div class="col-md-3">
                <input id="n" type="text" title="Nombres del usuario" placeholder="Ej. Jose"  class="form-control datos_persona" name="nombres"   required >

            </div>
            <label for="apellidos" class="col-md-3 control-label">Apellidos:<b style="color:red">*</b></label>

            <div class="col-md-3">
                <input class="form-control datos_persona"  title="Apellidos del usuario" placeholder="Ej. Tovar" name="apellidos"    required> 

            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="evento" class="col-md-3 control-label">Contraseña:<b style="color:red">*</b></label>

            <div class="col-md-3">
                <input id="p" type="password" title="Su clave de acceso." placeholder="*******"  class="form-control " name="contrasena"  onChange="validar()"required >

            </div>
            <label for="password" class="col-md-3 control-label">Confirme Contraseña:<b style="color:red">*</b></label>

            <div class="col-md-3">
                <input class="form-control " title="Repita la contraseña ingresada." placeholder="*******" type="password" onchange="if(this.value!=$('[name=contrasena]').val()) {alert('Contraseñas no coinciden'); this.value='';}"  name="contrasena_2"   required> 

            </div>
        </div>
        
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="domanda_di_securida" class="col-md-3 control-label">Pregunta de seguridad:<b style="color:red">*</b></label>

            <div class="col-md-3">
                <select class="form-control " title="Seleccione una pregunta de seguridad en caso de extravio de contraseña."  name="domanda_di_securida"  >
                <option >Seleccione Pregunta de Seguridad</option>
                <option value="Nombre de la mascota">Nombre de la mascota</option>
                <option value="Postre favorito">Postre favorito</option>
                <option value="Ciudad de nacimiento">Ciudad de nacimiento</option>
                <option value="Apellido de soltera de la madre">Apellido de soltera de la madre</option>
                <option value="Mejor amigo de la infancia">Mejor amigo de la infancia</option>
                <option value="Heroe de la infancia">Heroe de la infancia</option>
            </select> 

        </div>
        <label for="password" class="col-md-3 control-label">Respuesta de seguridad:<b style="color:red">*</b></label>

        <div class="col-md-3">
            <input class="form-control " title="Respuesta de seguridad" placeholder="Respuesta de seguridad" type="password" name="answer" required> 

        </div>
    
    </div>
<div class="col-md-offset-8"><a href="{{url('recuperacion')}}">¿Olvidó su contraseña? <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a></div>
    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancelar" id="canc" name="">
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>

        </div>
    </div>
</form>
</div>
<script type="text/javascript">


    function buscar()
    {
        var val = $('[name=cedula]').val();
        if(val.trim!='')
            $.get('{{url('api/humanos')}}?nouser=1&cedula='+val,function(data)
            {  
                
                var human_id = data[0]['id'];
                    
                if(data[0]!=undefined)
                {
                    $('[name=nombres]').val(data[0]['nombres']);
                    $('[name=apellidos]').val(data[0]['apellidos']);
                    $('[name=human_id]').val(data[0]['id']);
                    $('[name=tranca]').val("PASA");
                }
                else
                {
                    $('[name=cedula]').val('');
                    alert('Usuario no encontrado o ya registrado'); 

                }
            });
      
      

    }


    function validar(){
        var errores ='';
        
        if(! $('[name=contrasena]').val().match(/^(.)*([A-Z])(.)*$/))
        {
            errores += ' La clave debe tener al menos una mayuscula.';
        }
        if(! $('[name=contrasena]').val().match(/^.*([0-9]).*$/))
        {
            errores += ' La clave debe tener al menos un digito.';
        }
        if(! $('[name=contrasena]').val().match(/^.*([\$\!/\.\#\@\*]).*$/))
        {
            errores += ' La clave debe tener al menos alguno de estos simbolos: $ - ! - . - # - @ - *';
        }
        if(errores!='')
        {
            alert(errores);
            return false;
        }
        return true;
    }
</script>