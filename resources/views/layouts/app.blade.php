<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="description" content="">
    <meta http-equiv="keywords" content="">
    <title>BIVLU</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-material-design.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.css') }}" />
    <!-- Désolé, mais je n'ai eu autre facon de faire cette travail. -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <a class="navbar-brand" href="{{url('/')}}"><img class="navbar-brand" src="{{ asset('img/logo_white.png') }}" alt="BIVLU - Miguel Ángel Pérez Rodríguez"><span class="navbar-brand"> - Biblioteca "Miguel Ángel Pérez Rodríguez"</span></a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/')}}">Inicio</a></li>

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{url('actividades')}}">Actividades</a></li>
                        </li><li><a href="{{url('acerca-de')}}">Nosotros</a></li>
                        <!-- Suggestions 
                        <li><a data-toggle="modal" data-titulo="Tú opinión es importante" data-load="{{ url('sugerencias') }}" data-target="#suggestions-modal" id="suggestions-trigger">Sugerencias</a></li>
               -->
                        <li><a data-toggle="modal" data-titulo="Inicio de Sesión" data-load="{{ url('login') }}" data-target="#all-modal" ><button id="login-trigger" class="btn btn-raised btn-warning btn-sm">¡Entrar!</button></a></li>
                        <li><a data-toggle="modal"  data-load="{{ url('signup') }}" data-target="#all-modal" ><button id="signup-trigger" class="btn btn-raised btn-warning btn-sm">Registrarse</button></a></li>
                        @elseif(Auth::user()->user_level=='admin')

                            <li><a href="{{url('libros/listado') }}">Registro</a></li> 
                               

                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Préstamos <span id="loans_opt"></span><span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('virtuales') }}">Solicitudes</a></li>
                                    <li><a href="{{url('prestamos') }}">Sin Devolver</a></li> 
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Eventos <span id="events_opt"></span><span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('reservaciones') }}">Propuestas</a></li>
                                    <li><a href="{{url('eventos') }}">Pendientes</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Consultas <span id="events_opt"></span><span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('consultas') }}">Individuales</a></li>
                                    <li><a href="{{url('reportes') }}">Solventes y Morosos</a></li>
                                    <li><a href="{{url('estadisticas') }}">Estadísticas</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Mantenimiento <span id="events_opt"></span><span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('usuarios') }}">Usuarios</a></li>
                                    <li><a href="{{url('respaldo') }}">Respaldo BD</a></li>
                                    <li><a href="{{url('restauracion') }}">Restauración BD</a></li>
                                    <li><a href="{{url('bitacora') }}">Bitácora</a></li>
                                </ul>
                            </li>
                           <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('foto') }}">Perfil
                                    </a></li>
                                    <li><a href="{{url('ayuda')}}">Ayuda <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> </a></li>
                                    <li>Acerca de</li>  
                                    <!-- suggestion                                  
                                    <li><a data-toggle="modal" data-titulo="Sugerencias y comentarios" data-load="{{ url('sugerencias') }}" data-target="#suggestions-modal" id="suggestions-trigger">Sugerencias</span> </a></li>
-->
                                    <li>Acerca de</li>
                                    
                            <li><a  class="btn btn-raised btn-warning btn-sm" href="{{url('salir')}}">Salir</a> </li>
                                </ul>
                            </li> 
@else
@foreach(Auth::user()->privilegios()->groupBy('modulo')->get() as $k => $v)
    @if($v->modulo === 'Registro')
        <li><a href="{{ url('libros/listado') }}">Registro</a>
    @elseif(Auth::user()->privilegios()->where([['modulo','=',$v->modulo],['accion','=',null]])->count()>0)
        <li><a href="{{ $v->url_privilegio }}">{{ $v->modulo }}
@if($v->modulo=='Actividades' || $v->modulo=='Libros')
<span id="events_opt"></span>
@endif
        </a>
    @else
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $v->modulo }} 
@if($v->modulo=='Libros' || $v->modulo=='Actividades')
<span id="loans_opt"></span>
@endif
            <span class="caret"></span></a>
                                <ul class="dropdown-menu">
@foreach(Auth::user()->privilegios()->where([['modulo','=',$v->modulo],
['accion','<>',null]])->get() as $k2 => $v2)
    <li><a href="{{ $v2->url_privilegio }}">{{ $v2->accion }}</a>
@endforeach
</ul>
        </li>
@endif
@endforeach
                        </li><li><a href="{{url('acerca-de')}}">Nosotros</a></li>
                          <!--  <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Eventos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('propuestas') }}">Mis Propuestas</a></li>
                                    <li><a href="{{url('organizados') }}">Mis eventos organizados</a></li>
                                </ul>
                            </li>-->
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('foto') }}">Perfil</a></li>
                                    <li><a href="{{url('ayuda')}}"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda</a></li>

<!--
                                    <li><a data-toggle="modal" data-titulo="Tu opinión es importante" data-load="{{ url('sugerencias') }}" data-target="#suggestions-modal" > Sugerencias</a></li>
                                      -->    
                                    <li> Acerca de</li>

                            <li><a  class="btn btn-raised btn-warning btn-sm" href="{{url('salir')}}">Salir</a> </li>
                                </ul>
                            </li> 
                        @endif
                    </ul>
                </div>
            </div>
        </div>

<header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">
                    <span ><img class="" src="{{ asset('img/logo_blue.png') }}" alt="MARP - bivlu"></span>
                </div>
                
                </div>
            </div>
        </header>
    <div class="welcome">
        <div class="container wrapper" ui-view> 
         @yield('content')
        </div> 
    </div>

    </div>
<div id="all-modal" class="modal  modal-lg fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div id="suggestions-modal" class="modal  modal-lg fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<footer>
    
</footer>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery-confirm.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.css') }}"></script>
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
            url: '{{url('signup')}}',
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
            url: '{{url('login')}}',
            method:'GET',
            data:{},
            success:function(data)
          {
          $('#all-modal').html(data);
          }
      });
        });

      $('#suggestions-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
         
          $.ajax({
            url: '{{url('sugerencias')}}',
            method:'POST',
            data:{},
            success:function(data)
          {
          $('#suggestions-modal').html(data);
          }
      });
        });

      setInterval(function(){
        $.ajax({
            url: '{{url('notifications')}}',
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
@if(Session::has('deudas'))
$.alert({
    title: 'Tiene préstamos vencidos.',
    content: 'No se encuentra solvente con la biblioteca, diríjase a Mis Préstamos para ver cuál libro tiene pendiente.' ,
    type: 'red'
});
@endif
 </script>
    @yield('scripts')
</body>
</html>
