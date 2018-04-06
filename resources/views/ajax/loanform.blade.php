<div class="modal-header">Nuevo Préstamo</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('prestamos/guardar') }}">
                    <input type="hidden" name="book_id" value="{{$libro->id}}"> 
                    <input type="hidden" name="user_id" > 
                    <input type="hidden" name="tranca" required title="Debe ingresar una cédula existente en sistema.">
                        {{ csrf_field() }} 

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="libro" class="col-md-3 control-label">Título:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                {{ isset($libro) ? $libro['titulo'] : '' }}

                            </div>
                            <label for="evento" class="col-md-3 control-label">Cédula del Solicitante:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="cedula" type="text" onkeypress="return event.which>=48 && event.which<=57" onchange="buscar()" maxlength="9" title="Ingrese cédula del usuario solicitante." placeholder="Ej. 343435" class="form-control" name="cedula"  required autofocus>

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Nombre Solicitante:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="n" type="text" title="Nombres del solicitante." placeholder="Ej. Jose"  class="form-control datos_persona" name="nombre_responsable" value="{{ isset($evento) ? $evento['nombre_responsable'] : '' }}" readonly required >

                            </div>
                            <label for="password" class="col-md-3 control-label">Teléfono Solicitante:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input class="form-control datos_persona"  title="Teléfono del Solicitante." placeholder="Ej.04123332222" name="telefono_responsable" value="{{ isset($evento) ? $evento['telefono_responsable'] : '' }}" readonly required> 

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <input type="button" class="btn btn-primary" value="Cancelar" data-dismiss="modal" id="canc" name="">
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
        $.get('{{url('api/humanos?nouser=1')}}&cedula='+val,function(data)
            { 
                console.log(data);
                if(data[0]!=undefined)
                {
                    $('[name=nombre_responsable]').val(data[0]['nombres']+' '+data[0]['apellidos']);
                    $('[name=telefono_responsable]').val(data[0]['numero_telefono']);
                    $('[name=user_id]').val(data[0]['id']);
                    $('[name=tranca]').val("PASA");
                }
                else
                {
                    $('[name=cedula]').val('');
                    alert('Usuario no encontrado'); 

                }
            });
    }
                </script>