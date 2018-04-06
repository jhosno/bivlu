<div class="row">Para emitir una consulta no todos los campos deben ser rellenados</div>
<div class="row">
                       <div class="col-md-6"><label style="text-align:right; float:right;" for="titulo">Que se llame</label></div>
                       <div class="col-md-6"><input class="form-control" type="text" name="titulo" id="titulo"></div>
</div> 
<div class="row">
                       <div class="col-md-6"><label style="text-align:right; float:right;" for="libro">Que haya escrito algo llamado</label></div>
                       <div class="col-md-6"><input class="form-control" type="text" name="libro" id="libro"></div>
</div> 

<div class="row">
                       <div class="col-md-6"><label style="text-align:right; float:right;" for="resumen">Que haya escrito un libro que contenga en el resumen la(s) palabra(s)</label></div>
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
  <div class="col-md-offset-4 col-md-4">
    <input type="submit"   class="btn btn-raised btn-primary" value="Consultar"/>
  </div>
</div>
