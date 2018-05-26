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
            <label for="password" class="col-md-3 control-label">Número de Páginas:</label>

            <div class="col-md-3">
                <input class="form-control" id="numero-paginas" onkeypress="return event.which>=48 && event.which<=57" name="numero_paginas" type="number" min="20" max="2000" title="Ingrese el número de páginas con que cuenta el libro." placeholder="Ej. 451" > 

            </div>
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="password" class="col-md-3 control-label">Autor(es)<b style="color:red">*</b></label>

            <div class="col-md-3">
                <input id="autores" onchange="this.value=this.value.toUpperCase();" placeholder="Ej. Kenneth C. Louden" title="Ingrese el nombre del autor del libro, si es más de uno, separados por comas." type="text" class="form-control" name="autores"   required autofocus><b style="color:red">
                </div>

                <label for="clasificacion" class="col-md-3 control-label">Clasificacion:<b style="color:red">*</b></label>

                <div class="col-md-3">
                  <select onchange="if(this.value=='3'){ $('#subclasificacion').removeAttr('disabled');  }else{ $('#subclasificacion').attr('disabled','disabled'); } if(this.value!='2'){$('#archivo').removeAttr('disabled'); $('#portada').attr('disabled','disabled'); }else{ $('#archivo').attr('disabled','disabled'); $('#portada').removeAttr('disabled'); }" class="form-control" required name="clasificacion" id="clasificacion">
                      <option>Seleccione</option>
                      <option value="1">Consulta Virtual</option>
                      <option value="2">Consulta Física</option>
                      <option value="3">Proyectos</option>
                  </select>

              </div>
          </div>

          <input type="hidden" name="vienedeusuario" value="usuario">
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <label for="password" class="col-md-3 control-label">Año de Edición:<b style="color:red">*</b></label></label>

            <div class="col-md-3"> 
                <input class="form-control" onkeypress="return event.which>=48 && event.which<=57" id="anio-edicion" name="anio_edicion" title="Ingrese año de edición del libro." placeholder="Ej. 2010" maxlength="4" type="number" min="1600" value="{{ isset($libro) ? $libro['anio_edicion'] : '' }}" required><b style="color:red"> 
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

              <label for="libro" class="col-md-3 control-label">Portada: </label>

              <div class="col-md-3">
                  <select class="form-control" id="portada" required name="portada">
                      <option value="">Seleccione</option>
                      <option>TAPA DURA</option>
                      <option>TAPA BLANDA</option>
                  </select>

              </div>
              <label for="libro" class="col-md-3 control-label">Etiqueta(s)<b style="color:red">*</b></label>

              <div class="col-md-3">
                <input id="autores" onchange="this.value=this.value.toUpperCase();" title="Ingrese, separadas por comas, las etiquetas en las que ubicaría el libro." placeholder="Ej. Software, IA" type="text" class="form-control" name="etiquetas"   required autofocus>

            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
           <label for="libro" class=" control-label col-md-3">Resumen: </label>
           <div class="col-md-3">
            <textarea class="form-control col-md-3" cols="2" rows="2"  name="resumen"  title="Ingrese el resumen del libro." placeholder="Ej. loren ipsum" > </textarea>

        </div>
        <label for="libro" class="col-md-3 control-label">Cota:<b style="color:red">*</b></label>

        <div class="col-md-3">
           <input class="form-control"  title="Ingrese la Cota del libro." placeholder="Ej. REF HD7273R 73 T2" name="correlativo" type="text"  value="{{ isset($libro) ? $libro['portada'] : '' }}" id = "correlative"required value="onchange.uniqid()"> 
       </div>
   </div>
   <div class="form-group ">

    <label for="archivo" class="control-label col-md-3">Documento:</label>


    <input id="archivo"   onchange="return Validate(document.forms[0]);" title="Seleccione una versión PDF de la tesis." type="file" style="width:auto;opacity:1;height:auto;position:static;" class="form-control col-md-3" accept=".pdf"name="archivo" disabled  required autofocus> 


</div>
<div class=" text-center">
    <hr>
    <h4 style="color: #3F51B5">Datos del primer ejemplar</h4>
    <hr>
</div>




<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="libro" class="col-md-3 control-label">N° Registro:<b style="color:red">*</b></label>

    <div class="col-md-3">
       <input class="form-control"  title="Ingrese el código de Bienes necionales del primer ejemplar" placeholder="Ej. 2132" name="n_registro" type="number"  value="{{ isset($libro) ? $libro['portada'] : '' }}" id = "n_registro"required value="onchange.uniqid()"> 

   </div>
   <label for="libro" class="col-md-3 control-label">Cod. BN:<b style="color:red">*</b></label>

   <div class="col-md-3">
       <input class="form-control"  title="Ingrese el código de Bienes necionales del primer ejemplar" placeholder="Ej. 2132" name="cbn" type="number"  value="{{ isset($libro) ? $libro['portada'] : '' }}" id = "cbn"required value="onchange.uniqid()"> 

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

@section('scripts')
<script>
    var _validFileExtensions = [".pdf"];    
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
                            title: 'Alerta.',
                            content: 'Debe seleccionar un archivo PDF.',
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
    function uniqid(){
        libro = getElementsById("libro").value;
        autor = getElementsById("autores").value;
        anioEdicion = getElementsById("anio-edicion").value;
        numeroPaginas = getElementsById("numero-paginas").value;
        correlativo = getElementsById("correlativo").value;
        UUID = libro[0] + libro[1] + autor[0] + autor[1] + anioEdicion[0] + anioEdicion[1] + numeroPaginas[0] + numeroPaginas[1] + correletivo[0] + correletivo[1] + "-" + 01;
        console.log(UUID);
        return UUID;
    }();
</script>
@endsection