@extends('layouts.app')
@section('content') 
<div class="container container-fluid ">
  <div>
<img class="marp img-fluid" src="img/buho_bivle_lentes.png" alt="MARP - bivlu">
</div>
<div>
<span ><img class="" src="<?php echo e(asset('img/logo_blue.png')); ?>" alt="MARP - bivlu"></span></div>
                <form class="search form">
                    <input type="search" name="q" id="q" ng-model="index.q" onkeyup="loadBooks();"  placeholder="Ingrese su búsqueda aquí.">
                    <span  class="small link">Mostrar Búsqueda Avanzada</span>
                    <div  ng-show="toggleAdvanced">
                        <div class="three columns">
                            <div class="column">
                                <input id="authors" class="autocompletar" onkeyup="loadBooks();" data-collection="autores" type="text" ng-model="index.author" placeholder="Por autor">
                            </div>
                            <div class="column">
                                <input id="tags" type="text" onkeyup="loadBooks();" class="autocompletar" data-collection="etiquetas" ng-model="index.tag" placeholder="Por etiqueta">
                            </div>
                            <div class="column">
                                <SELECT id="clasificacion" style="width: 100%; " class="form-control" onchange="loadBooks();">
                                  <option value="">Todos</option>
                                  <option value="1">Consulta Virtual</option>
                                  <option value="2">Consulta Física</option>
                                  <option value="3">Proyectos</option>
                                </SELECT>
                            </div>
                            <div class="column">
                            </div> 
                        </div>
                    </div>
                </form> 
                
            <div class="wrapper row" id="contenedor">
              
            </div>
            
</div>
@endsection
@section('scripts')
<script type="text/javascript">

      @if(Session::has('canvio'))
$.alert({
    title: 'Operación exitosa.',
    content: 'Ahora debe iniciar sesion con su nueva contraseña' ,
    type: 'green'
});
@endif
      
@if(Session::has('errors'))
$.alert({
    title: 'Error de acceso.',
    content: 'No ha ingresado el usuario adecuado.' ,
    type: 'red'
});
@endif
      
@if(Session::has('Éxito'))
$.alert({
    title: 'Operación exitosa.',
    content: '{{Session::get('Éxito')}}' ,
    type: 'green'
});
@endif



        $.get('{{ url('libros') }}',function(data){
            $('#contenedor').html(data);
            $('.loan-trigger').on('click', function (event) {
    
          var button = $(event.relatedTarget); // Button that triggered the modal
            
          $.ajax({
            url: '{{url('prestamos')}}',
            method:'POST',
            data:{solicitud:true, book_id: $(this).data('id') },
            success:function(data)
          { 
            if(data=='500')
              $('#all-modal').html('<div class="modal-header">Petición cancelada</div>\
                <div class="modal-body">\
                    <p>Ya tiene una solicitud o un préstamo por un ejemplar de este mismo libro pendiente.</p>\
                </div>\
                <a href="" data-dismiss="modal" class="btn btn-primary">Cerrar</a>').modal('toggle');
            else if(data=='400')
              $('#all-modal').html('<div class="modal-header">Petición cancelada</div>\
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
  $.get('{{ url('libros') }}?query='+query
          +'&page='+1
          +'&author='+author
          +'&class='+classe
          +'&tag='+tag,function(data){
            $('#contenedor').html(data);
            $('.loan-trigger').on('click', function (event) {
    
          var button = $(event.relatedTarget), miid = $(this).data('id'); // Button that triggered the modal
            
          $.ajax({
            url: '{{url('prestamos')}}',
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
@endsection