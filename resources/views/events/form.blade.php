<div class="modal-header">{{$accion}}</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('eventos') }}">
                        {{ csrf_field() }}
<input type="hidden" name="tipo" value="{{$tipo}}">
@if(Auth::guest())
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Su nombre:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="evento" title="Ingrese su nombre completo." placeholder="Ej. Jose Tovar" type="text" onchange="this.value=this.value.toUpperCase();" class="form-control" name="nombre_responsable" value="{{ isset($evento) ? $evento['nombre_responsable'] : '' }}" required autofocus>

                            </div>
                            <label for="evento" class="col-md-3 control-label">Teléfono de Contacto:<b style="color:red">*</b></label>

                            <div class="col-md-1">
                            <select name="telefono_responsable1" id="telefono_responsable1" class="form-control"  >
                                    <option value="">Cód.</option>
                                    <option value="0412">0412</option>
                                    <option value="0414">0414</option>
                                    <option value="0424">0424</option>
                                    <option value="0416">0416</option>
                                    <option value="0426">0426</option>
                            </select>
                            </div>
                            <div class="col-md-2">
                                <input title="Ingrese su número de teléfono." placeholder="Ej. 6667777" onkeypress="return event.which>=48 && event.which<=57s"   type="number"  class="form-control" name="telefono_responsable2" value="{{ isset($evento) ? $evento['telefono_responsable'] : '' }}" required> 

                            </div>
                        </div>
@elseif(isset($user) && $user!=null)
<input type="hidden" name="vienedeusuario" value="usuario">
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Nombre:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                               {{ $user->human->nombres }} {{ $user->human->apellidos }}

                            </div>
                            <label for="password" class="col-md-3 control-label">Teléfono de Contacto:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                             {{ $user->human->numero_telefono }}

                            </div>
                        </div>
@endif


<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="evento" class="col-md-3 control-label">Evento<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="evento" title="Ingrese el asunto del evento." placeholder="Ej. Reunión de Consejo Comunal" type="text" onchange="this.value=this.value.toUpperCase();" class="form-control" name="evento" value="{{ isset($evento)? $evento['evento'] : '' }}" required autofocus>

                            </div>
                            <label for="password" class="col-md-3 control-label">Descripción<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <textarea class="form-control" title="Detalle los alcances del evento." placeholder="" onchange="this.value=this.value.toUpperCase();" name="detalles" required>{{ isset($evento)? $evento['detalles'] : '' }}</textarea>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="datetimepicker6" class="col-md-3 control-label">Inicio<b style="color:red">*</b></label>

                           <div class="input-group date col-md-3" id="datetimepicker6">
                                <input type="text" class="form-control" name="inicio"  title="Seleccione fecha y hora de inicio de evento." placeholder="Ej. 07/07/2017 07:30 AM" required ng-model="event.inicio"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <label for="datetimepicker7" class="col-md-3 control-label">Finalización<b style="color:red">*</b></label>

                            <div class="input-group date col-md-3" id="datetimepicker7">
                                <input type="text" class="form-control" name="finalizacion"  title="Seleccione fecha y hora de finalización de evento." placeholder="Ej. 07/07/2017 11:00 AM" required ng-model="event.finalizacion"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
 
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="cantidad" class="col-md-3 control-label">Cantidad de Asistentes<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="cantidad" title="Ingrese un estimado numérico de la cantidad de assitentes al evento (al menos 150). " placeholder="Ej. 50" type="number" class="form-control" name="cantidad_asistentes" value="{{ isset($evento)? $evento['cantidad_asistentes'] : '' }}" max="150" required >

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
 