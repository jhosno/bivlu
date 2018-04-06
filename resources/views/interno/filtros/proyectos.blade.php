<div class="row">Para emitir una consulta no todos los campos deben ser rellenados</div
<div class="row">
                       <div class="col-md-6"><label style="text-align:right; float:right;" for="titulo">Que contenga(n) en el título la(s) palabra(s)</label></div>
                       <div class="col-md-6"><input class="form-control" type="text" name="titulo" id="titulo"></div>
</div> 
<div class="row">
        <div class="col-md-6">
            <label for="titulo" style="text-align:right; float:right;">Con un número de páginas:</label>
        </div>
        <div class="col-md-6">
          <select class="form-control" id="numero_paginas" name="numero_paginas">
            <option></option>
            <option>Definido por intervalo</option>
            <option>Exactamente:</option>
          </select>
        </div>
</div> 
<div class="row">
                       <div class="col-md-3">
                        <label for="paginas_desde" style="text-align:right; float:right;">Desde</label> 
                       </div>
                       <div class="col-md-3">
                        <input id="paginas_desde" name="paginas_desde" required class="form-control intervalo_paginas" disabled/> 
                       </div>
                       <div class="col-md-3"> 
                        <label for="paginas_hasta" style="text-align:right; float:right;">Hasta</label>
                       </div>
                       <div class="col-md-3">
                       <input id="paginas_hasta" name="paginas_hasta" required class="form-control intervalo_paginas" disabled/>
                       </div>
</div>
</div> 
<div class="row">
                       <div class="col-md-3"><label style="text-align:right; float:right;" for="paginas_exactamente">Exactamente</label></div>
                       <div class="col-md-9"><input required name="paginas_exactamente" class="form-control paginas_exactamente" disabled/></div>
</div> 


<div class="row">
        <div class="col-md-6">
            <label for="titulo" style="text-align:right; float:right;">Editado en el año:</label>
        </div>
        <div class="col-md-6">
          <select class="form-control" id="anio" name="anio">
            <option></option>
            <option>Definido por intervalo</option>
            <option>Exactamente:</option>
          </select>
        </div>
</div> 
<div class="row">
                       <div class="col-md-3">
                        <label for="anio_entre" style="text-align:right; float:right;">Desde</label> 
                       </div>
                       <div class="col-md-3">
                        <input required id="anio_desde" name="anio_desde" class="form-control intervalo_anio" disabled/> 
                       </div>
                       <div class="col-md-3"> 
                        <label for="anio_entre" id="anio_hasta" name="anio_hasta" style="text-align:right; float:right;">Hasta</label>
                       </div>
                       <div class="col-md-3">
                       <input required name="anio_hasta" class="form-control intervalo_anio" disabled/>
                       </div>
</div>
</div> 

<div class="row">
                       <div class="col-md-3"><label style="text-align:right; float:right;" for="anio_exactamente">Tipo de Proyecto</label></div>
                       <div class="col-md-3"><select name="tipo_proyecto" class="form-control">
                                  <option>Trabajos de Ascenso</option>
                                  <option>Pregrado PNF</option>
                                  <option>Postgrado PNF</option> 
                       </select></div>
                       <div class="col-md-3"><label style="text-align:right; float:right;" for="anio_exactamente">PNF</label></div>
                       <div class="col-md-3"><select name="pnf" class="form-control">
@foreach($pnfs as $pnf)                       
  <option value="{{ $pnf->id }}">{{ $pnf->especialidad }}</option>
@endforeach
                       </select></div>
</div> 

<div class="row">
                       <div class="col-md-3"><label style="text-align:right; float:right;" for="anio_exactamente">Exactamente</label></div>
                       <div class="col-md-9"><input name="anio_exactamente" required class="form-control anio_exactamente" name="anio_exactamente" disabled/></div>
</div> 
<div class="row">
                       <div class="col-md-6"><label style="text-align:right; float:right;" for="resumen">Que contenga(n) en el resumen la(s) palabra(s)</label></div>
                       <div class="col-md-6"><textarea class="form-control" type="text" name="resumen" id="resumen"></textarea></div>
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
        <div class="col-md-6">
            <label for="titulo" style="text-align:right; float:right;">Cantidad de resultados:</label>
        </div>
        <div class="col-md-6">
          <select class="form-control" id="cantidad_resultados" name="cantidad_resultados">
            <option>5</option>
            <option>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
          </select>
        </div>
</div> 

<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <input type="submit"   class="btn btn-raised btn-primary" value="Consultar"/>
  </div>
</div>

<script type="text/javascript">
  $(function(){
    $('#numero_paginas').on('change',function(){
      if($(this).val()==='Definido por intervalo')
      {
        $('.intervalo_paginas').removeAttr('disabled');
        $('.paginas_exactamente').attr('disabled','disabled');
      }
      if($(this).val()==='Exactamente:')
      {
        $('.paginas_exactamente').removeAttr('disabled');
        $('.intervalo_paginas').attr('disabled','disabled');
      }
    });

    $('#anio').on('change',function(){
      if($(this).val()==='Definido por intervalo')
      {
        $('.intervalo_anio').removeAttr('disabled');
        $('.anio_exactamente').attr('disabled','disabled');
      }
      if($(this).val()==='Exactamente:')
      {
        $('.anio_exactamente').removeAttr('disabled');
        $('.intervalo_anio').attr('disabled','disabled');
      }
    });
  });
</script>