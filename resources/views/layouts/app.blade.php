<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="description" content="">
    <meta http-equiv="keywords" content="">
    <title>BIVLU</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-material-design.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-datetimepicker.css')); ?>" />

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-confirm.css')); ?>" />
    <!-- Désolé, mais je n'ai eu autre facon de faire cette travail. -->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/chart.min.js')); ?>"></script>
    <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.ico')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118771021-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118771021-1');
    </script>
</head>
<body ng-app="bivlu">   

    <div id="app">
        <div class="navbar navbar-inverse">

          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand img-fluid" href="<?php echo e(url('/')); ?>"><img class="navbar-brand" src="<?php echo e(asset('img/logo_white.png')); ?>" alt="BIVLU - Miguel Ángel Pérez Rodríguez"><span class="navbar-brand"> - Biblioteca "Miguel Ángel Pérez Rodríguez"</span></a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>

                <!-- Authentication Links -->
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('actividades')); ?>">Actividades</a></li>
                    <li><a href="<?php echo e(url('acerca-de')); ?>">Nosotros</a></li>




                    <!-- Suggestions -->                 
                    <li><a data-toggle="modal" data-titulo="Inicio de Sesión" data-load="<?php echo e(url('sugerencias')); ?>" data-target="#all-modal" ><button id="sugerencias-trigger" class="btn btn-sm">¡Entrar!</button></a></li>
                    <li><a data-toggle="modal" data-titulo="Envíanos tus comentarios y sugerencias" data-load="<?php echo e(url('sugerencias')); ?>" data-target="#my-modal" ><button id="sugerencias-trigger" class="btn btn-sm" style="color: #fff;">Sugerencias</button></a></li>
                    <!-- Suggestions -->   








                    <li><a data-toggle="modal" data-titulo="Inicio de Sesión" data-load="<?php echo e(url('login')); ?>" data-target="#all-modal" ><button id="login-trigger" class="btn btn-raised btn-warning btn-sm">¡Entrar!</button></a></li>
                    <li><a data-toggle="modal"  data-load="<?php echo e(url('signup')); ?>" data-target="#all-modal" ><button id="signup-trigger" class="btn btn-raised btn-warning btn-sm">Registrarse</button></a></li>
                    <?php elseif(Auth::user()->user_level=='admin'): ?>


                        <li><a href="<?php echo e(url('libros/listado')); ?>">Registro</a></li> 


                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Préstamos <span id="loans_opt"></span><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(url('virtuales')); ?>">Solicitudes</a></li>
                                <li><a href="<?php echo e(url('prestamos')); ?>">Sin Devolver</a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Eventos <span id="events_opt"></span><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(url('reservaciones')); ?>">Propuestas</a></li>
                                <li><a href="<?php echo e(url('eventos')); ?>">Pendientes</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Consultas <span id="events_opt"></span><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(url('consultas')); ?>">Individuales</a></li>
                                <li><a href="<?php echo e(url('reportes')); ?>">Solventes y Morosos</a></li>
                                <li><a href="<?php echo e(url('estadisticas')); ?>">Estadísticas</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Mantenimiento <span id="events_opt"></span><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(url('usuarios')); ?>">Usuarios</a></li>
                                <li><a href="<?php echo e(url('respaldo')); ?>">Respaldo BD</a></li>
                                <li><a href="<?php echo e(url('restauracion')); ?>">Restauración BD</a></li>
                                <li><a href="<?php echo e(url('bitacora')); ?>">Bitácora</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(url('foto')); ?>">Perfil
                                </a></li>
                                <li><a href="<?php echo e(url('ayuda')); ?>">Ayuda <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> </a></li>
                                <!-- suggestion-->
                                
                                <li><a href="<?php echo e(url('sugerencias')); ?>">Sugerencias <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> </a></li>

                                
                                <li><a  class="btn btn-raised btn-warning btn-sm" href="<?php echo e(url('salir')); ?>">Salir</a> </li>
                            </ul>
                        </li> 
                        <?php else: ?>
                            <?php $__currentLoopData = Auth::user()->privilegios()->groupBy('modulo')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($v->modulo === 'Registro'): ?>
                                <li><a href="<?php echo e(url('libros/listado')); ?>">Registro</a>
                                    <?php elseif(Auth::user()->privilegios()->where([['modulo','=',$v->modulo],['accion','=',null]])->count()>0): ?>
                                    <li><a href="<?php echo e($v->url_privilegio); ?>"><?php echo e($v->modulo); ?>

                                    <?php if($v->modulo=='Actividades' || $v->modulo=='Libros'): ?>
                                        <span id="events_opt"></span>
                                    <?php endif; ?>
                                </a>
                                <?php else: ?>
                                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo e($v->modulo); ?> 
                                    <?php if($v->modulo=='Libros' || $v->modulo=='Actividades'): ?>
                                        <span id="loans_opt"></span>
                                    <?php endif; ?>
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php $__currentLoopData = Auth::user()->privilegios()->where([['modulo','=',$v->modulo],
                                        ['accion','<>',null]])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $v2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($v2->url_privilegio); ?>"><?php echo e($v2->accion); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </li><li><a href="<?php echo e(url('acerca-de')); ?>">Nosotros</a></li>
                          <!--  <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Eventos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo e(url('propuestas')); ?>">Mis Propuestas</a></li>
                                    <li><a href="<?php echo e(url('organizados')); ?>">Mis eventos organizados</a></li>
                                </ul>
                            </li>-->
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo e(url('foto')); ?>">Perfil</a></li>
                                    <li><a href="<?php echo e(url('ayuda')); ?>"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda</a></li>
                                    <!-- Suggestion-->
                                    <li><a data-toggle="modal" data-titulo="Sugerencias" data-load="<?php echo e(url('login')); ?>" data-target="#all-modal" id="login-trigger" >Sugerencias
                                        <i class="fa fa-comment-dots"></i></a></li>
                                        <li><a data-toggle="modal" data-titulo="Tu opinión es importante" data-load="<?php echo e(url('sugerencias')); ?>" data-target="#suggestions-modal" > Sugerencias</a></li>

                                        <li> Acerca de</li>

                                        <li><a  class="btn btn-raised btn-warning btn-sm" href="<?php echo e(url('salir')); ?>">Salir</a> </li>
                                    </ul>
                                </li> 
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="welcome">
                <div class="container container-fluid wrapper" ui-view> 
                   <?php echo $__env->yieldContent('content'); ?>

               </div> 



           </div>
       </div>
       <!-- FOOTER -->
       <div class="push">
        <div class="footer-top text-center ">
            <div>
                <h4>Enlaces de la institución</h4>
                <p>
                    <a href="upta.edu.ve/"> UPT Aragua </a> | 
                    <a href="dace.upta.edu.ve/"> DACE </a> | 
                    <a href="eva.upta.edu.ve/"> Aula virtual </a> | 
                    <a href="https://www.facebook.com/UptAragua/"> <i class=" fa fa-facebook">   </i> </a> </li>
                    <a href="https://twitter.com/uptaragua"> <i class="fa fa-twitter">   </i> </a> </li>
                </p>
            </div>
        </div>
        <div class="footer-bottom ">
            <div class="text-center"><p>Desarrollado por Jhosnoirlit Hernández. 2017 - 2018</p></div>
            <div class="text-center social">
                <a href="https://twitter.com/jhosno"> <i class="fa fa-twitter fa-lg">   </i> </a> 
                <a href="https://github.com/jhosno"> <i class="fa fa-github fa-lg">   </i> </a> 
            </div>
        </div>
    </div>

</div>
<div id="all-modal" class="modal  modal-lg fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> </div>
<div id="all-modal" class="modal  modal-lg fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="all-modal" class="modal  modal-lg fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>


<!-- Scripts -->
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-confirm.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/material.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/fullcalendar.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/datatables.css')); ?>"></script>
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript">
    $(function(){ $('.orderedtable').dataTable(
    {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        } 
    }
    );});

    $('#signup-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal

          $.ajax({
            url: '<?php echo e(url('signup')); ?>',
            method:'GET',
            data:{},
            success:function(data)
            {
              $('#all-modal').html(data);
          }
      });
      });

    $('#login-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal

          $.ajax({
            url: '<?php echo e(url('login')); ?>',
            method:'GET',
            data:{},
            success:function(data)
            {
              $('#all-modal').html(data);
          }
      });
      });

    $('#sugerencias-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal

          $.ajax({
            url: '<?php echo e(url('sugerencias')); ?>',
            method:'GET',
            data:{},
            success:function(data)
            {
              $('#all-modal').html(data);
          }
      });
      });


    setInterval(function(){
        $.ajax({
            url: '<?php echo e(url('notifications')); ?>',
            method:'GET',
            data:{},
            success:function(data)
            {
              console.log(data);
              var eamount = data.event_notif;
              var lamount = data.loan_notif;
              if(eamount) $('#events_opt').html('<span class="label label-warning">'+eamount+'</span>');          
              if(lamount) $('#loans_opt').html('<span class="label label-warning">'+lamount+'</span>'); 
          }
      });
    },4000);
    <?php if(Session::has('deudas')): ?>
        $.alert({
            title: 'Tiene préstamos vencidos.',
            content: 'No se encuentra solvente con la biblioteca, diríjase a Mis Préstamos para ver cuál libro tiene pendiente.' ,
            type: 'red'
        });
    <?php endif; ?>
</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
