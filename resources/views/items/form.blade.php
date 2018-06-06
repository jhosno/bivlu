<div class="modal-header">Agregar Ejemplar de {{ isset($libro) ? $libro['titulo'] : '' }} <br> COTA: {{ isset($libro) ? $libro['cota'] : '' }}</div>
<div class="modal-body">
    <form class="form-horizontal" method="POST" action="{{ url('ejemplares/store') }}">
        <input type="hidden" name="book_id" value="{{$libro->id}}"> 
        {{ csrf_field() }} 


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="libro" class="col-md-3 control-label">N° Registro:<b style="color:red">*</b></label>

            <div class="col-md-3">
               <input class="form-control"  title="Ingrese N° registro del libro." placeholder="Ej. 1245214" name="n_registro" type="number"   id = "n_registro"required > 

           </div>


           <label for="libro" class=" control-label col-md-3">N° Ejemplar <b style="color:red">*</b></label>
           <div class="col-md-3">
             <input class="form-control"  title="Ingrese número de ejemplar" placeholder="Ej. 2132" name="n_ejemplar" type="text"   id = "n_ejemplar"required > 


         </div>


     </div>
     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="libro" class="col-md-3 control-label">Cod. BN:<b style="color:red">*</b></label>

        <div class="col-md-3">
           <input class="form-control"  title="Ingrese el código de Bienes necionales del primer ejemplar" placeholder="Ej. 2132" name="cbn" type="number"   id = "cbn"required value="onchange.uniqid()"> 

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