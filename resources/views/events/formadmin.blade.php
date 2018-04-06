<div class="modal-header">{{$accion}}</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('eventos') }}">
                        {{ csrf_field() }}
<input type="hidden" name="confirmado" value="1">
<input type="hidden" name="tipo" value="{{$tipo}}">
<input type="hidden" name="user_id">

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Cédula del Responsable:</label>

                            <div class="col-md-3">
                                <input id="cedula" type="text" title="Ingrese la cédula del responsable." placeholder="Ej. 2443412" onkeypress="return event.which>=48 && event.which<=57" onchange="buscar()" maxlength="9" class="form-control" name="cedula"  required autofocus>

                            </div>
                            <label for="check" class="col-md-3 control-label">El responsable no pertenece a la UPTA</label>

                            <div class="col-md-3">
                                <input class="form-control" type="checkbox" name="noupta"  onclick="activame();"> 

                            </div>
                        </div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Su nombre:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="n" type="text" title="Ingrese su nombre completo." placeholder="Ej. Jose Tovar"  onchange="this.value=this.value.toUpperCase();"   class="form-control datos_persona" name="nombre_responsable" value="{{ isset($evento) ? $evento['nombre_responsable'] : '' }}" required >

                            </div>
                            <label for="password" class="col-md-3 control-label">Teléfono de Contacto:<b style="color:red">*</b></label>

                            <div class="col-md-1">
                            <select name="telefono_responsable1" id="telefono_responsable2" class="form-control">
                                    <option value="">Cód.</option>
                                    <option value="0412">0412</option>
                                    <option value="0414">0414</option>
                                    <option value="0424">0424</option>
                                    <option value="0416">0416</option>
                                    <option value="0426">0426</option>
                            </select>
                            </div>
                            <div class="col-md-2">
                                <input title="Ingrese su número de teléfono." placeholder="Ej. 6667777" onkeypress="return event.which>=48 && event.which<=57"   maxlength="7" class="form-control" name="telefono_responsable2" value="{{ isset($evento) ? $evento['telefono_responsable'] : '' }}" required> 

                            </div>
                        </div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Evento<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="evento" type="text" title="Ingrese el asunto del evento." placeholder="Ej. Reunion de Consejo Comunal" onchange="this.value=this.value.toUpperCase();" class="form-control" name="evento" value="{{ isset($evento)? $evento['evento'] : '' }}" required autofocus>

                            </div>
                            <label for="password" class="col-md-3 control-label">Descripción<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <textarea class="form-control" title="Detalle los alcances del evento." onchange="this.value=this.value.toUpperCase();" name="detalles" required>{{ isset($evento)? $evento['detalles'] : '' }}</textarea>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="datetimepicker6" class="col-md-3 control-label">Inicio<b style="color:red">*</b></label>

                           <div class="input-group date col-md-3" id="datetimepicker6">
                                <input type="text" class="form-control" name="inicio" title="Seleccione fecha y hora de inicio de evento." placeholder="Ej. 07/07/2017 07:30 AM" required ng-model="event.inicio"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <label for="datetimepicker7" class="col-md-3 control-label">Finalización<b style="color:red">*</b></label>

                            <div class="input-group date col-md-3" id="datetimepicker7">
                                <input type="text" class="form-control"   title="Seleccione fecha y hora de finalización de evento." placeholder="Ej. 07/07/2017 11:00 AM"  name="finalizacion" required ng-model="event.finalizacion"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <label for="password" class="col-md-3 control-label">Observaciones</label>

                            <div class="col-md-3">
                                <textarea class="form-control" name="Observaciones" required> </textarea>

                            </div>

                            <label for="cantidad" class="col-md-3 control-label">Cantidad de Asistentes<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="cantidad" title="Ingrese un estimado numérico de la cantidad de assitentes al evento, al menos 150." placeholder="Ej. 150" type="number" max="150" class="form-control" name="cantidad_asistentes" value="{{ isset($evento)? $evento['cantidad_asistentes'] : '' }}" required >

                            </div>
                            
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
 
                            </div>
                        </div>
                    </form>
                </div>

<script type="text/javascript">
    function activame()
    {
        if($('[name=noupta]').prop('checked'))
        { 
                    $('.datos_persona').removeAttr('readonly');
                    $('[name=cedula]').removeAttr('required');
                    $('[name=cedula]').attr('disabled','disabled');
                    $('[name=nombre_responsable]').focus();
         }           
         else
        { 
                    $('.datos_persona').attr('readonly','readonly');
                    $('[name=cedula]').removeAttr('disabled');
                    $('[name=cedula]').attr('required','required').focus();
         }           
        $('.datos_persona').val('');
    }

    function buscar()
    {
        var val = $('[name=cedula]').val();
        if(val.trim!='')
        $.get('{{url('api/humanos?cedula=')}}'+val,function(data)
            { 
                if(data[0]!=undefined)
                {
                    $('[name=nombre_responsable]').val(data[0]['nombres']+' '+data[0]['apellidos']);
                    $('[name=telefono_responsable]').val(data[0]['numero_telefono']);
                    $('[name=user_id]').val(data[0]['id']);
                }
                else
                {
                    alert('Usuario no encontrado');
                    $('[name=cedula]').focus();

                }
            });
    }
</script>                
