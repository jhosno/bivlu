<div class="modal-header">Editar Ejemplar de "<?php echo e(isset($libro) ? $libro[0]['titulo'] : ''); ?>"<br>
  <caption>Cota: <?php echo e(isset($libro) ? $libro[0]['cota'] : ''); ?></caption>
</div>

<div class="modal-body">
  
  <form class="form-horizontal" method="POST" action="<?php echo e(url('ejemplares/update')); ?> ">
   <input type="hidden" name="id" value="<?php echo e(isset($item) ? $item['id'] : ''); ?>">
    <input type="hidden" name="book_id" value="<?php echo e(isset($libro) ? $libro[0]['id'] : ''); ?>">
    <input type="hidden" name="_method" value="put"> 
    <?php echo e(csrf_field()); ?> 

     <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <label for="libro" class="col-md-3 control-label">N° Registro:<b style="color:red">*</b></label>

            <div class="col-md-3">
               <input class="form-control"  title="Ingrese N° registro del libro." placeholder="Ej. 1245214" name="n_registro" type="number"   id = "n_registro"required value="<?php echo e(isset($item) ? $item['n_registro'] : ''); ?>"> 

           </div>


           <label for="libro" class=" control-label col-md-3">N° Ejemplar <b style="color:red">*</b></label>
           <div class="col-md-3">
             <input class="form-control"  title="Ingrese número de ejemplar" placeholder="Ej. 2132" name="n_ejemplar" type="text"   id = "n_ejemplar"required value="<?php echo e(isset($item) ? $item['n_ejemplar'] : ''); ?>"> 


         </div>


     </div>
     <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
        <label for="libro" class="col-md-3 control-label">Cod. BN:<b style="color:red">*</b></label>

        <div class="col-md-3">
           <input class="form-control"  title="Ingrese el código de Bienes necionales del primer ejemplar" placeholder="Ej. 2132" name="cbn" type="number"   id = "cbn"required value="<?php echo e(isset($item) ? $item['cbn'] : ''); ?>"> 

       </div>



     <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
        <label for="libro" class="col-md-3 control-label">Estatus del ejemplar:<b style="color:red">*</b></label>

        <div class="col-md-3">
           <select class="form-control" name="estado_item">
            
             <option value="<?php echo e(isset($item) ? $item['estado_item'] : ''); ?>">Selecciones una opción</option>
             <option value="DISPONIBLE">DISPONIBLE</option>
             <option value="NO DISPONIBLE">NO DISPONIBLE</option>
             
           </select>

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