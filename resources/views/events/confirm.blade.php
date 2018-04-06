<div class="modal-header">Confirmar Evento</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('eventos/confirmar') }}">
                    
                        {{ csrf_field() }} 

<input type="hidden" name="event_id" value="{{$evento['id']}}">
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Nombre:</label>

                            <div class="col-md-3">
                               {{ $evento->nombre_responsable }}

                            </div>
                            <label for="password" class="col-md-3 control-label">Teléfono de Contacto:</label>

                            <div class="col-md-3">
                               {{ $evento->telefono_responsable }}

                            </div>
                        </div>


<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Evento</label>

                            <div class="col-md-3">
                                <input id="evento" type="text" class="form-control" name="evento" value="{{ isset($evento)? $evento['nombre'] : '' }}" required autofocus>

                            </div>
                            <label for="password" class="col-md-3 control-label">Descripción</label>

                            <div class="col-md-3">
                                <textarea class="form-control" name="detalles" required>{{ isset($evento)? $evento['detalles'] : '' }}</textarea>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="datetimepicker6" class="col-md-3 control-label">Inicio</label>

                           <div class="input-group date col-md-3" id="datetimepicker6">
                                <input value="{{ \Carbon\Carbon::createFromFormat('Y-m-d h:i:00',$evento['fecha_inicio'])->format('m/d/Y h:i A' ) }}" type="text" class="form-control" name="inicio" required ng-model="event.inicio"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <label for="datetimepicker7" class="col-md-3 control-label">Finalización</label>

                            <div class="input-group date col-md-3" id="datetimepicker7">
                                <input type="text" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d h:i:00',$evento['fecha_finalizacion'])->format('m/d/Y h:i A' ) }}" class="form-control" name="finalizacion" required ng-model="event.finalizacion"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                             
                            <label for="password" class="col-md-3 control-label">Cantidad de asistentes: </label>
                            
                            <div class="col-md-3">
              <input id="cantidad_asistentes" type="number" class="form-control" name="cantidad_asistentes" value="{{ isset($evento)? $evento['cantidad_asistentes'] : '' }}" required >
                            </div>

                            </div>
                       
 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <label for="password" class="col-md-3 control-label">Observaciones</label>
                             
                            <div class="col-md-3">
                                <textarea class="form-control" name="Observaciones" required> </textarea>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" onclick="$('.evento').html('');" name="">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
 
                            </div>
                        </div>

                    </form>
                </div>