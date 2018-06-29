<div class="modal-header">Editar ejemplar de {{ isset($libro) ? $libro['titulo'] : '' }}</div>
<div class="modal-body">
  <form class="form-horizontal" method="POST" action="{{ url('libros/'.$libro['id']) }}">
    <input type="hidden" name="book_id" value="{{$libro->id}}">
    <input type="hidden" name="_method" value="put">
       <input type="hidden" name="vienedeusuario" value="usuario">
    {{ csrf_field() }} 

    <div class="form-group">
      
      <label for="titulo" class="col-md-3 control-label">Título:<b style="color:red">*</b></label>

      <div class="col-md-3">
       <input class="form-control"  title="Título de la edición" placeholder="Ej. El Señor de los anillos" name="titulo" type="text"   id = "n_registro"required onchange="this.value=this.value.toUpperCase();" value="{{ isset($libro) ? $libro['titulo'] : '' }}" autofocus> 
     </div>


     <label for="numero_paginas" class="col-md-3 control-label">Número de Páginas:<b style="color:red">*</b></label>

     <div class="col-md-3">
       <input class="form-control"  title="Título de la edición" placeholder="Ej. El Señor de los anillos" name="numero_paginas" type="text"   id = "n_registro"required onkeypress="return event.which>=48 && event.which<=57" value="{{ isset($libro) ? $libro['numero_paginas'] : '' }}" autofocus> 
     </div>

   </div>
   
    <div class="form-group">

      <label for="autores" class="col-md-3 control-label">Autor(es):<b style="color:red">*</b></label>

      <div class="col-md-3">
       <input class="form-control"  title="Título de la edición" placeholder="Ej. El Señor de los anillos" name="autores" type="text"   id = "n_registro"required onchange="this.value=this.value.toUpperCase();" value="@foreach($libro->authors as $v) {{$v->nombre}},@endforeach" > 
     </div>


    <label for="clasificacion" class="col-md-3 control-label">Clasificacion:<b style="color:red">*</b></label>

    <div class="col-md-3">
      <select onchange="if(this.value==3) $('#subclasificacion').removeAttr('disabled'); else $('#subclasificacion').attr('disabled','disabled');" class="form-control" required name="clasificacion" id="clasificacion">
        <option>Seleccione</option>
        <option <?php if($libro['clasificacion']==1) echo "selected"; ?> value="1">Consulta Virtual</option>
        <option <?php if($libro['clasificacion']==2) echo "selected"; ?> value="2">Consulta Física</option>
        <option <?php if($libro['clasificacion']==3) echo "selected"; ?> value="3">Proyectos</option>
      </select>
    </div>

   </div>
   
    <div class="form-group">

      <label for="anio_edicion" class="col-md-3 control-label">Año de Edición:<b style="color:red">*</b></label>

      <div class="col-md-3">
       <input class="form-control" onkeypress="return event.which>=48 && event.which<=57" name="anio_edicion" title="Ingrese año de edición del libro." placeholder="Ej. 2010" type="number" min="1600" value="{{ isset($libro) ? $libro['anio_edicion'] : '' }}" > 
     </div>



    <label for="subclasificacion" class="col-md-3 control-label">Subclasificación:</label>

    <div class="col-md-3">
      <select class="form-control" disabled required name="subclasificacion" id="subclasificacion">
        <option>Seleccione</option>
        <option <?php if($libro['clasificacion']==3 && $libro['subclasificacion']=='Trabajos de Ascenso') echo "selected"; ?>>Trabajos de Ascenso</option>
        <option <?php if($libro['clasificacion']==3 && $libro['subclasificacion']=='Pregrado PNF') echo "selected"; ?>>Pregrado PNF</option>
        <option <?php if($libro['clasificacion']==3 && $libro['subclasificacion']=='Postgrado PNF') echo "selected"; ?>>Postgrado PNF</option>
      </select>
    </div>

   </div>

   
    <div class="form-group">

      <label for="portada" class="col-md-3 control-label">Tipo de Portada:<b style="color:red">*</b></label>

<div class="col-md-3">
       <input class="form-control" name="portada" value="{{ isset($libro) ? $libro['portada'] : '' }}" required> 

     </div>

    <label for="etiquetas" class="col-md-3 control-label">Etiquetas:</label>

    <div class="col-md-3">
      <input id="autores" type="text" class="form-control" onchange="this.value=this.value.toUpperCase();" title="Ingrese, separadas por comas, las etiquetas en las que ubicaría el libro." placeholder="Ej. Software, IA" name="etiquetas" value="@foreach($libro->tags as $v) {{$v->palabras}},@endforeach" required autofocus>
    </div>

   </div>
   
    <div class="form-group">

      <label for="resumen" class="col-md-3 control-label">resumen:<b style="color:red">*</b></label>

  <div class="col-md-3">
    <textarea class="form-control col-md-3"   name="resumen" cols="2" rows="3"  title="Ingrese el resumen del libro." placeholder="Ej. loren ipsum" value="" > {{ isset($libro)? $libro['resumen'] : '' }}
    </textarea>
  </div>


    <label for="cota" class="col-md-3 control-label">cota:</label>

    <div class="col-md-3">
      <input id="cota" type="text" class="form-control" onchange="this.value=this.value.toUpperCase();" title="Ingrese, separadas por comas, las etiquetas en las que ubicaría el libro." placeholder="Ej. Software, IA" name="cota" value="{{ isset($libro) ? $libro['cota'] : '' }}" required autofocus>
    </div>

   </div>




   <div class="form-group ">

    <label for="archivo" class="control-label col-md-3">Documento:</label>


    <input id="archivo"   onchange="return Validate(document.forms[0]);" title="Seleccione una versión PDF de la tesis." type="file" style="width:auto;opacity:1;height:auto;position:static;" class="form-control col-md-3" accept=".pdf"name="archivo" disabled  required autofocus> 


    
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
    cota = getElementsById("cota").value;
    n_ejemplar = getElementsById("n_ejemplar").value;
    UUID = libro[0] + libro[1] + autor[0] + autor[1] + anioEdicion[0] + anioEdicion[1] + numeroPaginas[0] + numeroPaginas[1] + cota[0] + cota[1] + "-" + 01;
    console.log(UUID);
    return UUID;
  }();
</script>
@endsection