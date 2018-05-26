<div class="modal-header">Agregar Ejemplar</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('ejemplares/crear/') }}">
                    <input type="hidden" name="book_id" value="{{$libro->id}}"> 
                        {{ csrf_field() }} 

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="libro" class="col-md-3 control-label">Título:</label>

                            <div class="col-md-3">
                                {{ isset($libro) ? $libro['titulo'] : '' }}

                            </div>
                            <label for="password" class="col-md-3 control-label">N° Registro:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input class="form-control" onkeypress="return event.which>=48 && event.which<=57" title="Ingrese el identificador del ejemplar." placeholder="Ej. 343453" name="correlativo" type="number" min="1" value="{{ isset($item) ? $item['correlativo'] : '' }}" required> 

                            </div>
                        </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="libro" class="col-md-3 control-label">Cota:<b style="color:red">*</b></label>

            <div class="col-md-3">
             <input class="form-control"  title="Ingrese la Cota del libro." placeholder="Ej. REF HD7273R 73 T2" name="correlativo" type="text"  value="{{ isset($libro) ? $libro['portada'] : '' }}" id = "correlative"required value="onchange.uniqid()"> 

         </div>


         <label for="libro" class=" control-label col-md-3">N° Registro: <b style="color:red">*</b></label>
         <div class="col-md-3">
           <input class="form-control"  title="Ingrese número de registro del primer ejemplar." placeholder="Ej. 2132" name="n_registro" type="number"  value="{{ isset($libro) ? $libro['portada'] : '' }}" id = "n_registro"required value="onchange.uniqid()"> 


        </div>


    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="libro" class="col-md-3 control-label">Cod. BN:<b style="color:red">*</b></label>

        <div class="col-md-3">
         <input class="form-control"  title="Ingrese el código de Bienes necionales del primer ejemplar" placeholder="Ej. 2132" name="cnb" type="number"  value="{{ isset($libro) ? $libro['portada'] : '' }}" id = "cnb"required value="onchange.uniqid()"> 

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