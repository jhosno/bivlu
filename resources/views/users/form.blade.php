<div class="modal-header">{{$accion}}</div>
                <div class="modal-body">
                <p>Todos los campos marcados con <b style="color:red">*</b> son requeridos.</p>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('libros') }}">
                        {{ csrf_field() }} 

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="libro" class="col-md-3 control-label">Título:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="libro" type="text" onchange="this.value=this.value.toUpperCase();" class="form-control" name="titulo" title="Ingrese aquí el título del libro." placeholder="Ej. Mecánica Básica" required autofocus>

                            </div>
                            <label for="password" class="col-md-3 control-label">Número de Páginas:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input class="form-control" onkeypress="return event.which>=48 && event.which<=57" name="numero_paginas" type="number" min="20" max="2000" title="Ingrese el número de páginas con que cuenta el libro." placeholder="Ej. 451" required> 

                            </div>
                        </div>

<input type="hidden" name="vienedeusuario" value="usuario">
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="libro" class="col-md-3 control-label">Portada: </label>

                            <div class="col-md-3">
                              <select class="form-control" id="portada" required name="portada">
                                  <option value="">Seleccione</option>
                                  <option>TAPA DURA</option>
                                  <option>TAPA BLANDA</option>
                              </select>

                            </div>
                            <label for="password" class="col-md-3 control-label">Año de Edición:</label>

                            <div class="col-md-3"> 
                            <input class="form-control" onkeypress="return event.which>=48 && event.which<=57" name="anio_edicion" title="Ingrese año de edición del libro." placeholder="Ej. 2010" maxlength="4" type="number" min="1600" value="{{ isset($libro) ? $libro['anio_edicion'] : '' }}" required><b style="color:red">*</b> 
                            </div>
                        </div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="clasificacion" class="col-md-3 control-label">Clasificacion:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                              <select onchange="if(this.value=='3'){ $('#subclasificacion').removeAttr('disabled');  }else{ $('#subclasificacion').attr('disabled','disabled'); } if(this.value!='2'){$('#archivo').removeAttr('disabled'); $('#portada').attr('disabled','disabled'); }else{ $('#archivo').attr('disabled','disabled'); $('#portada').removeAttr('disabled'); }" class="form-control" required name="clasificacion" id="clasificacion">
                                  <option>Seleccione</option>
                                  <option value="1">Consulta Virtual</option>
                                  <option value="2">Consulta Física</option>
                                  <option value="3">Proyectos</option>
                              </select>

                            </div>
                            <label for="subclasificacion" class="col-md-3 control-label">Subclasificación:</label>

                            <div class="col-md-3">
                              <select class="form-control" disabled required name="subclasificacion" id="subclasificacion">
                                  <option>Seleccione</option>
                                  <option>Trabajos de Ascenso</option>
                                  <option>Pregrado PNF</option>
                                  <option>Postgrado PNF</option> 
                              </select>

                            </div>
</div>



<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="libro" class="col-md-3 control-label">Etiqueta(s)<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="autores" onchange="this.value=this.value.toUpperCase();" title="Ingrese, separadas por comas, las etiquetas en las que ubicaría el libro." placeholder="Ej. Software, IA" type="text" class="form-control" name="etiquetas"   required autofocus>

                            </div>
                            <label for="password" class="col-md-3 control-label">Autor(es)<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input id="etiquetas" onchange="this.value=this.value.toUpperCase();" placeholder="Ej. Kenneth C. Louden" title="Ingrese el nombre del autor del libro, si es más de uno, separados por comas." type="text" class="form-control" name="autores"   required autofocus><b style="color:red">*</b>

                            </div>
                        </div>

 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="libro" class="col-md-3 control-label">Correlativo Primer Ejemplar:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                               <input class="form-control" onkeypress="return event.which>=48 && event.which<=57" title="Ingrese el código propio del primer ejemplar." placeholder="Ej. 2132" name="correlativo" type="number"  value="{{ isset($libro) ? $libro['portada'] : '' }}" required> 
<b style="color:red">*</b>
                            </div>
                           
                        </div>
 
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                            <label for="archivo" class="col-md-3 control-label">PDF de Tesis</label>

                            <div class="col-md-9">
                                <input id="archivo"  title="Seleccione una versión PDF de la tesis." type="file" style="width:auto;opacity:1;height:auto;position:static;" class="form-control" name="archivo" disabled  required autofocus> 

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
              