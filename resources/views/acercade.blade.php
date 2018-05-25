@extends('layouts.app')
@section('content')

<div id="carousel-example-generic" class="carousel slide col-md-8 col-md-offset-2" data-ride="carousel" style="align-items: 'center';">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/carrusel_1.jpg" alt="Nuestra universidad - UPT Aragua">
      <div class="carousel-caption">
        <h3>Autoridades de la UPT Aragua dieron la bienvenida a estudiantes nuevo ingreso</h3>
        <p>Estudiarán en los diferentes Programas Nacionales de Formación que imparte la casa de estudios. Noticia vía <a href="https://www.mppeuct.gob.ve/actualidad/noticias/autoridades-de-la-upt-aragua-dieron-la-bienvenida-estudiantes-nuevo-ingreso" target="_blank">mppeuct.gob.ve</a></p>
      </div>
    </div>
    <div class="item">
      <img src="img/carrusel_2.jpg" alt="...">
      <div class="carousel-caption">
        <h3>Autoridades de la UPT-Aragua dieron la bienvenida a nuevos estudiantes</h3>
        <p>acto realizado en los espacios de la biblioteca Miguel Ángel Pérez Rodríguez de la Universidad Politécnica Territorial del estado Aragua “Federico Brito Figueroa” (UPT Aragua). Noticia vía <a href="https://cactus24.com.ve/autoridades-de-la-upt-aragua-dieron-la-bienvenida-nuevos-estudiantes" target="_blank">Cactus24</a></p>
      </div>
    </div>
        <div class="item">
      <img src="img/carrusel_3.jpg" alt="Taller de formación">
      <div class="carousel-caption">
        <h3>Poder Judicial impartió Taller de Formación en la UPT Aragua. Noticia vía</h3> <p>La actividad contó con la participación de más de 70 estudiantes y se desarrolló en los espacios de la Biblioteca “Miguel Ángel Pérez Rodríguez” en la sede principal de la institución, ubicada en La Victoria <a href="https://www.mppeuct.gob.ve/actualidad/noticias/poder-judicial-impartio-taller-de-formacion-en-la-upt-aragua" target="_blank">mppeuct.gob.ve</a></p>
      </div>
    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
<!-- asdasd -->
<div id="" class="container col-md-12"> 
<ul class="nav nav-tabs">
      <li class="active">
        <a  href="#1" data-toggle="tab">Biografía MÁPR</a>
      </li>
      <li><a href="#2" data-toggle="tab">Misión</a>
      </li>
      <li><a href="#3" data-toggle="tab">Visión</a>
      </li>
      <li><a href="#4" data-toggle="tab">Normas de Uso</a>
      </li>
    </ul>

      <div class="tab-content ">
        <div class="tab-pane active" id="1">
          <h3>Biografía del Miguel Ángel Pérez Rodríguez</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="tab-pane" id="2">
          <h3>Visión</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
        </div>
        <div class="tab-pane" id="3">
          <h3>Misión</h3>
          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. </p>
        </div>
        <div class="tab-pane" id="4">
          <h3>Normas de uso</h3>
          <p>ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
        </div>
      </div>
  </div>
<!-- asdasd -->
<style>
.carousel-control .glyphicon-chevron-right, .carousel-control .icon-next {
    color: #FF6736;
}
.carousel-control .glyphicon-chevron-left, .carousel-control .icon-next {
    color: #FF6736;
}

  .carousel-inner>.item>img {
    line-height: 1;
    display: block;
    margin: auto;
    width: 640px;
    opacity: 0.9;
    height: 427px;

-webkit-filter: grayscale(100%);filter: grayscale(100%);}

.nav-tabs {
    background: #3F51B5;
}
</style>
@endsection
@section('scripts')
<script type="text/javascript">
      
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