<?php $__env->startSection('content'); ?>

<div class="col-md-3" id="side">
   
    <a href="#user"><h4>Usuario</h4></a>
      <ul>
        <li><a href="#login"><h5>Inicio de sesión</h6></a></li>
        <li><a href="#restore_pass" ><h5>Recuperación de clave</h5></a></li>
        <li><a href="#signin"><h5>Nuevo usuario</h5></a></li>
        <li><a href="#prolife"><h5></h5>Perfil</a></li>
      </ul>
      <a href="#search"><h4>Búsqueda</h4></a>
        <ul>
          <li><a href="#filters"><h5>Filtros</h5></a></li>
          <li><a href="#ab">Solicitud de ejemplar</a></li>
        </ul>
      <a href="#activities"><h4>Actividades</h4></a>
        <ul>
          <li><a href="#ask_events"><h5>Propuesta de eventos</h5></a></li>
          <li><a href="#looking_event"><h5>Visualización de eventos pendientes</h5></a></li>
        </ul>
      <a href="#books"><h4>Mis libros</h4></a>
        <ul>
          <li><a href="#requirest_book"><h5>Mis solicitudes</h5></a></li>
          <li><a href="#loans"><h5>Mis préstamos</h5></a></li>
          <li><a href="#history"><h5>Históricos de Préstamos</h5></a></li>
        </ul>
        <a href="#about_us"><h4>Nosotros</h4></a>
        <br>
        <!--Admin functions-->
        <a href="#create"><h4>Registro</h4></a>
          <ul>
            <li><a href="#new_book"><h5>Nuevo libro / Proyecto</h5></a></li>
            <li><a href="#new_item"><h5>Nuevo ejemplar</h5></a></li>
            <li><a href="#update_book"><h5>Modificación de libro / Proyecto</h5></a></li>
            <li><a href="#delete_book"><h5>Eliminación de libro / Proyecto</h5></a></li>
          </ul>
          <a href="#loans"><h4>Préstamos</h4></a>
            <ul>
              <li><a href="#ask_book"><h5>Solicitudes</h5></a></li>
              <li><a href="#devolutions"><h5>Sin devolver</h5></a></li>
            </ul>
          <a href="#event"><h4>Eventos</h4></a></li>
            <ul>
              <li><a href="#ask_events"><h5>Propuesta</h5></a></li>
              <li><a href="#looking_event"><h5>Pendientes</h5></a></li>
            </ul>
          <a href="#consults"><h4>Consultas</h4></a>
            <ul>
              <li><a href="#individuals"><h5>Individuales</h5></a></li>
              <li><a href="#sol&mor"><h5>Solventes y morosos</h5></a></li>
              <li><a href="#stadists"><h5>Estadísicas</h5></a></li>
            </ul>            
          <a href="#mantenain"><h4>Mantenimiento</h4></a>

            <ul>
              <li><a href="#privilegios"><h5>Usuarios</h5></a></li>
              <li><a href="#backup"><h5>Respaldo Base de Datos (BD)</h5></a></li>
              <li><a href="#restore"><h5>Restauración de Base de datos (BD)</h5></a></li>
              <li><a href="#journal"><h5>Bitácora</h5></a></li>
            </ul>


</div>
<div class="col-md-9" id="contenido">
  <h3 id="usuarios">Usuarios</h3>

    <h4 id="login">Inicio de sesión</h4>
      <p>Para interactuar con el formulario de inicio de sesión debe hacer click en el botón “¡ENTRAR!” ubicado en el lado superior derecho, emergerá un formulario. Para ingresar a la sesión el usuario debe proveer su correo electrónico y su contraseña, el proceso finaliza al dar al botón “acceder”
De ser exitoso el inicio de sesión se actualiza el menú contextual, un error de inicio de sesión.
</p>
    <h4 id="restore_pass">Recuperación de Clave</h4>
      <p>Como medida de seguridad los usuarios pueden optar por recuperar sus contraseñas dando click en el enlace “¿Olvidó su contraseña?”, Debajo del formulario de inicio de sesión. Esto lo guiará en una serie de pasos de recuperación de contraseña que se desglosaran a continuación:
        <ol>
          <li>
            El primer paso consiste en ingresar el correo electrónico con el que el usuario se registró en el sistema y darle al botón “siguiente”.
          </li>    
          <li>
            Posterior a eso se muestra la pregunta de seguridad.
          </li>
          <li>
            Una vez validada la respuesta a la pregunta, le permite estar en el formulario final en donde ingresa una nueva contraseña y su confirmación.  
          </li>
          <li>
            De ser exitosa la recuperación de contraseña se muestra esta notificación 
          </li>
        </ol>
      </p>
    <h4 id="signin">Nuevo usuario</h4>
      <p>
        Para registrarse en el sistema bivlu, sus datos deben estar registrados en el sistema de la universidad, una vez validado a través de la cédula que dicha persona pertenece a la comunidad de la UPT Aragua, su nombre y apellido son autocompletados, de tal manera que solo quedará por rellenar el correo y la contraseña.
      </p>
    <h4 id="prolife">Perfil</h4>
      <p>
        Para entrar al perfil y realizar modificaciones debe darle al botón “perfil” ubicado en el submenú desplegable del usuario.
        Una vez en el perfil, se recomienda actualizar la foto de perfil puesto que sin ella no se puede proceder a emitir carnet de biblioteca. Importante: para validar cualquier cambio debe colocar su contraseña actual. 
      </p>
  <h3 id="search">Búsqueda</h3>
  
    <h4 id="filters">Filtros</h4>
    
      <p>
    La búsqueda de documentos cuenta con diferentes filtros para hacer búsquedas exactas: entre los filtros están: título, autor(es), etiqueta(s), tipo.
  </p>
  <h4 id="ab">Soliciud de ejemplar</h4>
    <p>
      Existen dos modalidades de préstamos: préstamos de sala y préstamos circulantes. Los préstamos de sala son exclusivos para el área de biblioteca, siempre y cuando sea dentro del horario de la misma. Los préstamos circulantes son para los libros que pueden ser retirados de la biblioteca por un periodo máximo de tres (3)  días hábiles.
Para la emisión de préstamo de sala el estudiante debe dirigirse a la taquilla de la biblioteca y ser atendido por un encargado, el estudiante debe comunicar el (los) dato(s) del (los) libro(s) que desea consultar al encargado, dicho estudiante debe estar previamente registrado en el sistema BIVLU, además de su número de cédula para el registro. Esto también aplica la préstamo circulante.
Para realizar el préstamo circulante el estudiante puede hacerlo desde cualquier dispositivo con conexión a internet. Para ello debe ingresar a su sesión de usuario en BIVLU, buscar el libro, emitir una solicitud, para luego proceder a retirarlo en la taquilla de la biblioteca central.
El estudiante solo puede solicitar un máximo de tres (3) libros circulante.
De tener préstamos vencidos aparece la siguiente notificación.
Para visualizar un documento virtual solo es necesario realizar la búsqueda del mismo, apretar la opción visualizar y disfrutar de ello.
    </p>
    
  <h3 id="activities">Actividades</h3>
    <h4 id="ask_events">Proponer evento</h4>
    <p>
      Este segmento permite realizar propuestas de eventos, estas pueden ser de personas ajenas a la universidad (sin cuenta en BIVLU), estudiantes y demás miembros de la comunidad universitaria, o incluso a través del administrador del sistema, llenando el siguiente formulario.
    </p>
    <h4 id="looking_event">Visualización de eventos pendientes</h4>
    <p>
      Los eventos aprobados se listan en eventos pendientes
    </p>
  <h3 id="books">Mis Libros</h3>
    <h4 id="requirest_book">Mis solicitudes</h4>
    <p>
      El estudiante también puede visualizar sus solicitudes por fechas y eliminarlas en caso de ya no necesitar dicho ejemplar.
    </p>
    <h4 id="loans">Mis préstamos</h4>
    <p>
      Una vez el estudiante se hace con el ejemplar en caridad de préstamo circulante puede listar los libros que tiene en su haber a través del sistema y el estado de los mismo
    </p>
    <h4 id="history">Historicos de préstamos</h4>
    <p>
      Puede consultar todos los libros solicitados en este segmento, allí también verá las fechas de los movimientos.
    </p>
  <h3 id="about_us">Nosotros</h3>
  <p>
Este segmento es meramente informativo posee información relevante de la biblioteca, como la bibliografía del profesor Miguel Ángel Pérez Rodríguez, de donde se hereda el nombre de la biblioteca, la misión, la visión y normas de uso.
  </p>
  <!--Admin function-->
  <h3 id="create">Registro</h3>

    <h4 id="new_book">Nuevo libro / Proyecto</h4>
      <p>
    En registro se gestiona todo lo relacionado a los libros y proyectos de la biblioteca.
Para registrar un libro se debe dar click en el siguiente botón " + agregar registro"
esto hace que emerja un formulario para rellenar los datos del libro a registrar.
Al finalizar el sistema muestra una notificación informando que el procedimiento fue realizado con éxito.
Si el libro/proyecto esta duplicado emergerá una notificación de error.

  </p>
    <h4 id="new_item">Nuevo ejemplar</h4>
    <p>
      Para gestionar los ejemplares de un mismo libro, está el segmento de ejemplares, allí además se pueden visualizar el estado de los ejemplares. Desde esta vista se puede modificar un ejemplar, eliminar o incluso agregar un ejemplar 
    </p>
    <h4 id="update_book">Modificar libro / Proyecto</h4>
    <p>
      Para modificar un libro, solo se requiere darle al icono de “editar”, esto permitirá mostrar un formulario para editar los datos del libro.
    </p>
    <h4 id="delete_book">Eliminación libro / Proyecto</h4>
    <p>
       Para le eliminación de un ejemplar es necesaria la confirmación de la operación.
       Una vez confirmada la operación se muestra una notificación de operación exitosa y se realiza la operación.
    </p>
  <h3 id="loans">Préstamos</h3>
    <h4 id="">Solicitudes</h4>
    <p>
      Para validar los préstamos circulantes, es decir, que el estudiante hizo su solicitud y se acercó a la taquilla de biblioteca a retirar el ejemplar, el encargado debe confirmar la operación, dándole al click a aceptar.
      Una vez hecho esto aparece una ventana confirmando la operación.
      Luego al finalizar se muestra la ventana de operación exitosa.
    </p>
    <h4 id="">Sin devolver</h4>
    <p>
      Gestiona la devolución y lista los libros pendientes por devolver. Para realizar una devolución solo hay que darle al botón aceptar.
      Se procede a realizar una confirmación en donde el encargado, de ser necesario, anota una observación respecto al estado del libro.
      Finalizada la devolución, se notifica de la operación exitosa
    </p>
  <h3 id="events">Eventos</h3>
    <h4 id="ask_events">Propuestas</h4>
    <p>
        Las propuestas de eventos son listadas y gestionadas  en este apartado, pueden ser eliminadas, visualizadas en detalle y aprobadas.
        Para aprobar un evento, el encargado visualiza un formulario que le permite hacer modificaciones a los datos del evento de ser necesario.
    </p>
    <h4 id="looking_event">Pendientes</h4>
    <p>
      El encargado puede visualizar todos los eventos aprobados
    </p>
  <h3 id="consults">Consultas</h3>
    <h4 id="individuals">individuales</h4>
    <p>
      Las consultas individuales consta de dos opciones: carnet de biblioteca y solvencia de biblioteca, para realizar la consulta solo se debe ingresar la cédula del estudiante y seleccionar la opción a consultar.
      <ul>
        <li>
          Para la emisión de carnet es necesario que el usuario a consultar haya actualizado la foto de perfil. De lo contrario no se procede.
        </li>
        <li>
          Para las emisiones de solvencias el estudiantes no debe poseer ningún libro de la biblioteca en calidad de préstamo, de lo contrario no se procede 
        </li>
      </ul>
    </p>
    <h4 id="sol&mor">Solventes y morosos</h4>
    <p>
      Lista los solventes y los morosos en un documento de formato PDF listo para descargar o imprimir.
    </p>
    <h4 id="stadists">Estadísticas</h4>
    <p>
      Este apartado permite emitir estadística y tablas de datos de diferente elementos relevantes en la administración de la biblioteca. Para realizar una consulta de estadísticas se debe rellenar los formularios, cada uno de ellos es especifico al ítem en cuestión.
    </p>
  <h3 id="mantenain">Mantenimiento</h3>
    <h4 id="privilegios">Usuarios</h4>
    <p>
      Lista los usuarios del sistema, además permite actualizar los privilegios de usuario.
    Para actualizar los privilegios de usuarios hay que dar click al botón actualizar al lado derecho del usuario y aparecerá un formulario con todos los privilegios disponibles en el sistema.
    </p>
    <h4 id="backup">Respaldo de Base de Datos</h4>
    <p>
      El respaldo de Base de datos es una medida de seguridad, para proteger la integridad de la información del sistema. Para proceder a ella el administrador debe ingresar la clave en el formulario. Al emitir respaldo se desgarga un documento de extensión SQL que representa la base de datos.
    </p>
    <h4 id="restore">Restauración de Base de Datos</h4>
    <p>
      El restaurar la base de datos consiste en colocar una copia de la para trabajar con esta nueva copia. Para proceder a ello se ingresa en el formulario la clave del administrador y se coloca el archivo de extensión SQL que corresponda. 
      Al finalizar se emitirá una notificación de operación exitosa.
    </p>
    <h4 id="journal">Bitácoras</h4>
    <p>
      La bitácora lista todos los movimientos realizados en el sistema, además posee filtro de búsqueda que permite mostrar resultados específicos.
    </p>
</div>

<!-- asdasd -->
<style>
#contenido {
  background-color: #EEEEEE;
}
h3, h4, h5{
  text-align: left;
}
h3{
  color: #FF6736;
}
#contenido>h4{
  color: #2B2E83;

}
li{
  text-align: left ;
}

p{
  text-indent: 10px;
  text-align: justify;
  
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
      
<?php if(Session::has('exito')): ?>
$.alert({
    title: 'Operación exitosa.',
    content: '<?php echo e(Session::get('exito')); ?>' ,
    type: 'green'
});
<?php endif; ?>



        $.get('<?php echo e(url('libros')); ?>',function(data){
            $('#contenedor').html(data);
            $('.loan-trigger').on('click', function (event) {
    
          var button = $(event.relatedTarget); // Button that triggered the modal
            
          $.ajax({
            url: '<?php echo e(url('prestamos')); ?>',
            method:'POST',
            data:{solicitud:true, book_id: $(this).data('id') },
            success:function(data)
          { 
            if(data=='500')
              $('#all-modal').html('<div class="modal-header">Error</div>\
                <div class="modal-body">\
                    <p>Ya tiene una solicitud o un préstamo por un ejemplar de este mismo libro pendiente.</p>\
                </div>\
                <a href="" data-dismiss="modal" class="btn btn-primary">Cerrar</a>').modal('toggle');
            else if(data=='400')
              $('#all-modal').html('<div class="modal-header">Error</div>\
                <div class="modal-body">\
                    <p>Ha excedido el máximo simultáneo de solicitudes y préstamos (este es de 3 ejemplares).</p>\
                </div>\
                <a href="" data-dismiss="modal" class="btn btn-primary">Cerrar</a>').modal('toggle');
            else
          $('#all-modal').html(data).modal('toggle');
          },
          error:function(data)
          {
            console.log(data.responseText);
          }
      });
        });
        });

     
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( ".autocompletar" ) 
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "api/"+this.element[0].dataset.collection, {
            q: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
 
function loadBooks()
{
  var query=$('#q').val(), 
    author=$('#authors').val(),
    classe=$('#clasificacion').val(),
    tag=$('#tags').val();
  $.get('<?php echo e(url('libros')); ?>?query='+query
          +'&page='+1
          +'&author='+author
          +'&class='+classe
          +'&tag='+tag,function(data){
            $('#contenedor').html(data);
            $('.loan-trigger').on('click', function (event) {
    
          var button = $(event.relatedTarget), miid = $(this).data('id'); // Button that triggered the modal
            
          $.ajax({
            url: '<?php echo e(url('prestamos')); ?>',
            method:'POST',
            data:{solicitud:true, book_id: $(this).data('id') },
            success:function(data)
          {
            var valor = parseInt($('#badge_'+miid).html()) - 1;
            $('#badge_'+miid).html(valor);
          $('#all-modal').html(data).modal('toggle');
          },
          error:function(data)
          {
            console.log(data.responseText);
          }
      });
        });
        });

}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>