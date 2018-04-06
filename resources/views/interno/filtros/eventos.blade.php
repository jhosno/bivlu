<div class="row">Para emitir una consulta no todos los campos deben ser rellenados</div
<div class="row">
  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="datetimepicker6" class="col-md-3 control-label">Tomar en cuenta desde<b style="color:red">*</b></label>

                           <div class="input-group date col-md-3" id="datetimepicker6">
                                <input type="text" id="jhon" class="form-control" name="fi"  title="Seleccione fecha y hora de inicio de evento."  placeholder="Ej. 07/07/2017 07:30 AM" required ng-model="event.inicio"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
<br>
                            </div>
                            <label for="datetimepicker7" class="col-md-3 control-label">Tomar en cuenta hasta<b style="color:red">*</b></label>

                            <div class="input-group date col-md-3" id="datetimepicker7">
                                <input type="text" id="mayba" class="form-control" name="ff"  title="Seleccione fecha y hora de finalización de evento." placeholder="Ej. 07/07/2017 11:00 AM" required ng-model="event.finalizacion"   >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
</div> 

<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <input type="submit"   class="btn btn-raised btn-primary" value="Consultar"/>
  </div>
</div>
<script type="text/javascript">
  $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false 
            }); 
             $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
</script>
