<?php $__env->startSection('content'); ?>
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Registro de libros</a></li> 
    <li><a href="">ejemplares</a></li> 
</ul>


<a   id="new-trigger" class="btn btn-primary primary-btn"><i class="material-icons ">add</i> Agregar Ejemplar</a>

<a   class="btn btn-primary primary-btn" href="<?php echo e(url('libros/listado')); ?>">Volver a Registro de Libros</a>
<table class="orderedtable table">
    <h4>COTA: <?php echo e($libro->cota); ?></h4>
      <h5><?php echo e($libro->titulo); ?></h5>
      <h6>ID: <?php echo e($libro->id); ?></h6>
    <caption>
        Ejemplares del Libro
    </caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>N° Registro</th>
            <th>N° Ejemplar</th>
            <th>Cod. Bienes nacionales</th>
            <th>Estado</th> 
            
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <td><?php echo e($value['id']); ?></td> 
            <td><?php echo e($value['n_registro']); ?></td> 
            <td><?php echo e($value['n_ejemplar']); ?></td> 
            <td><?php echo e($value['cbn']); ?></td> 
            <td><?php echo e($value['estado_item']); ?></td> 
                        
            <td>
                <a title="Editar" onclick="paraEdit({{$value['id']}})" title="Editar" ><i class="material-icons ">create</i></a>
                <a  onclick="if(confirm('¿Desea desincorporar el ejemplar?')){$('#miforma').attr('action','<?php echo e(url('ejemplares')); ?>/'+<?php echo e($value['id']); ?>).submit();}" title="Eliminar" ><i class="material-icons ">delete</i></a>

            </td>
        </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
            <form id="miforma" method="post" action="<?php echo e(url('ejemplares')); ?>">
                <input type="hidden" name="_method" value="delete"> 
            </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
<?php if(Session::has('Éxito')): ?>
$.alert({
    title: 'Operación exitosa.',
    content: '<?php echo e(Session::get('Éxito')); ?>',
    type: 'green'
});
<?php endif; ?>
<?php if(Session::has('error')): ?>
$.alert({
    title: 'Hubo un problema.',
    content: '<?php echo e(Session::get('error')); ?>',
    type: 'red'
});
<?php endif; ?>
<?php if(Session::has('errorñaño')): ?>
$.alert({
    title: 'Error',
    content: '<?php echo e(Session::get('errorñaño')); ?>',
    type: 'red'
});
<?php endif; ?>
       $('#new-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal


          $.ajax({
            url: '<?php echo e(url('ejemplares/create/'.$libro['id'])); ?>',
            method:'GET',
            data:{},
            success:function(data)
          {
            $('#all-modal').html(data).modal('show');
             
            $('#canc').on('click', function (event) { $('.evento').html(''); });
          },
          error:function(data){
            console.log(data);
          }
      });
        });
$('#canc').click(function(){
    $('all-modal').modal('hide');
})
function paraEdit(id)
{ 
        

          $.ajax({
            url: '{{url('ejemplares')}}/edit/'+id,
            method:'GET',
            data:{},
            success:function(data)
          {
            $('#all-modal').html(data).modal('show');
            $('#canc').on('click', function (event) {   $('.evento').html(''); });
              
          },
          error:function(data){
            console.log(data);
          }
      });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>