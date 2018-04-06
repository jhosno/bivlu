<div class="row">Para emitir una consulta no todos los campos deben ser rellenados</div
<div class="row">
                       <div class="col-md-6"><label style="text-align:right; float:right;" for="anio_exactamente">PNF</label></div>
                       <div class="col-md-6"><select name="pnf" class="form-control">
@foreach($pnfs as $pnf)                       
  <option value="{{ $pnf->id }}">{{ $pnf->especialidad }}</option>
@endforeach
                       </select></div>
</div> 

<div class="row">
                       <div class="col-md-6"><label style="text-align:right; float:right;" for="">Tipo de Consulta</label></div>
                       <div class="col-md-3"><input type="radio" checked class="form-control" id="r1" name="tipo_consulta" value="1" /></div>
                       <div class="col-md-3"><label style="text-align:right; float:right;" for="r1">Los libros más consultados</label></div>
</div> 

<div class="row">
                       <div class="col-md-offset-6 col-md-3"><input type="radio"  class="form-control" id="r2" name="tipo_consulta" value="2" /></div>
                       <div class="col-md-3"><label style="text-align:right; float:right;" for="r2">Los proyectos más consultados</label></div>
</div> 

<div class="row">
                       <div class="col-md-offset-6 col-md-3"><input type="radio"  class="form-control" id="r3" name="tipo_consulta" value="3" /></div>
                       <div class="col-md-3"><label style="text-align:right; float:right;" for="r3">Los autores más consultados</label></div>
</div> 

<div class="row">
                       <div class="col-md-3"> <input checked type="checkbox" id="mostrar_tablas" name="mostrar_tablas"><label style="text-align:right; float:right;" for="mostrar_tablas">Mostrar Tablas</label></div>
                       <div class="col-md-3"> <input checked type="checkbox" id="mostrar_grafico" name="mostrar_grafico"> <label style="text-align:right; float:right;" for="mostrar_grafico">Mostrar Gráfico</label></div>
                       <div class="col-md-3">
            <label for="titulo" style="text-align:right; float:right;">Ordenar:</label>
        </div>
        <div class="col-md-3">
          <select class="form-control" id="ordenar" name="ordenar">
            <option>Ascendentemente</option>
            <option>Descendentemente</option>
          </select>
        </div>
</div> 

<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <input type="submit"   class="btn btn-raised btn-primary" value="Consultar"/>
  </div>
</div>

