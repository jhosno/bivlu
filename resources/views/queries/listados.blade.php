@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Solventes y Morosos</a></li> 
</ul>
 
                <form class="search form"  >
                   <div class="row">
                       <div class="col-md-9"><select class="form-control" id="clase">
                           <option value="">¿Qué desea obtener en el listado?</option>
                           <option value="Solventes">Usuarios Solventes</option>
                           <option value="Morosos">Usuarios Morosos</option>
                       </select></div>
                       <div class="col-md-3"><input type="button" onclick="makeQuery()" class="btn btn-raised btn-primary" value="Consultar"/></div>
                   </div> 
                    
                </form> 
            <div class="wrapper row" id="resultado">
                 
            </div>
@endsection

@section('scripts')
<script>

makeQuery = function(){
    var clase =$('#clase').val();
    if(clase.trim()!='' )
   {

          $('#resultado').html('');
          $('<embed src="'+'listados?clase='+clase+'" width="800" height="400"></embed>').appendTo('#resultado');
        }
       
  };

</script>
@endsection