<div class="modal-header">Editar {{ isset($libro) ? $libro['titulo'] : '' }}</div>
<div class="modal-body">
  <form class="form-horizontal" method="POST" action="{{ url('libros/'.$libro['id']) }}">
    <input type="hidden" name="book_id" value="{{$libro->id}}">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }} 

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="libro" class="col-md-3 control-label">Título:<b style="color:red">*</b></label>

      <div class="col-md-3">
        <input id="libro" onchange="this.value=this.value.toUpperCase();" title="Ingrese aquí el título del libro." placeholder="Ej. Mecánica Básica" type="text" class="form-control" name="titulo" value="{{ isset($libro) ? $libro['titulo'] : '' }}"  required autofocus>

      </div>
      <label for="password" class="col-md-3 control-label">Número de Páginas:<b style="color:red">*</b></label>

      <div class="col-md-3">
        <input class="form-control" onkeypress="return event.which>=48 && event.which<=57"  title="Ingrese el número de páginas con que cuenta el libro." placeholder="Ej. 451" name="numero_paginas" type="number" min="20" value="{{ isset($libro) ? $libro['numero_paginas'] : '' }}" required> 

      </div>
    </div>

    <input type="hidden" name="vienedeusuario" value="usuario">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="libro" class="col-md-3 control-label">Portada:<b style="color:red">*</b></label>

      <div class="col-md-3">
       <input class="form-control" name="portada" value="{{ isset($libro) ? $libro['portada'] : '' }}" required> 

     </div>
     <label for="password" class="col-md-3 control-label">Año de Edición:<b style="color:red">*</b></label>

     <div class="col-md-3"> 
      <input class="form-control"  onkeypress="return event.which>=48 && event.which<=57" name="anio_edicion" title="Ingrese año de edición del libro." placeholder="Ej. 2010" type="number" min="1600" value="{{ isset($libro) ? $libro['anio_edicion'] : '' }}" required> 
    </div>
  </div>

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="clasificacion" class="col-md-3 control-label">Clasificacion:<b style="color:red">*</b></label>

    <div class="col-md-3">
      <select onchange="if(this.value==3) $('#subclasificacion').removeAttr('disabled'); else $('#subclasificacion').attr('disabled','disabled');" class="form-control" required name="clasificacion" id="clasificacion">
        <option>Seleccione</option>
        <option <?php if($libro['clasificacion']==1) echo "selected"; ?> value="1">Consulta Virtual</option>
        <option <?php if($libro['clasificacion']==2) echo "selected"; ?> value="2">Consulta Física</option>
        <option <?php if($libro['clasificacion']==3) echo "selected"; ?> value="3">Proyectos</option>
      </select>

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


  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="libro" class="col-md-3 control-label">Etiqueta(s)<b style="color:red">*</b></label>

    <div class="col-md-3">
      <input id="autores" type="text" class="form-control" onchange="this.value=this.value.toUpperCase();" title="Ingrese, separadas por comas, las etiquetas en las que ubicaría el libro." placeholder="Ej. Software, IA" name="etiquetas" value="@foreach($libro->tags as $v) {{$v->palabras}},@endforeach" required autofocus>

    </div>
    <label for="password" class="col-md-3 control-label">Autor(es)<b style="color:red">*</b></label>

    <div class="col-md-3">
      <input id="etiquetas" type="text" onchange="this.value=this.value.toUpperCase();" placeholder="Ej. Kenneth C. Louden" title="Ingrese el nombre del autor del libro, si es más de uno, separados por comas." class="form-control" name="autores" value="@foreach($libro->authors as $v) {{$v->nombre}},@endforeach" required autofocus>

    </div>
  </div>


  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="tesis" class="col-md-3 control-label">Tipo de Publicación</label>

    <div class="col-md-3">
     {{ $libro->url!=null? 'TESIS' : 'LIBRO' }}

   </div>
        <label for="libro" class="col-md-3 control-label">Cota:<b style="color:red">*</b></label>

        <div class="col-md-3">
           <input class="form-control"  title="Ingrese la Cota del libro." placeholder="Ej. REF HD7273R 73 T2" name="correlativo" type="text"  value="{{ isset($libro) ? $libro['cota']: '' }}" id = "correlative"required value="onchange.uniqid()">
            
       </div>
 </div>
 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
  <label for="libro" class="col-md-3 control-label">Resumen: <b style="color:red">*</b></label>
  <div class="col-md-3">
    <textarea class="form-control"   name="resumen"  title="Ingrese el resumen del libro." placeholder="Ej. loren ipsum" value="{{ isset($libro) ? $libro['resumen'] : '' }}" required> {{ isset($libro)? $libro['resumen'] : '' }}</textarea>

  </div>

</div>
@if($libro->url!=null)

<div>
<label for="archivo" class="col-md-3 control-label">Cambiar PDF de Tesis</label>

<div class="col-md-3">
  <input id="archivo"  title="Seleccione una versión PDF de la tesis." type="file" style="width:auto;opacity:1;height:auto;position:static;" class="form-control" accept=".pdf" name="archivo" disabled  required autofocus> 

</div>
@endif
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