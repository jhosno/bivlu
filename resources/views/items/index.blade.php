@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Registro de Libros</a></li> 
</ul>

<form method="POST" action="{{ url('ejemplares') }}" id="formaporno">
                    <input type="hidden" name="book_id" value="{{$libro->id}}"> 
                    </form>
<a    class="btn btn-primary primary-btn" onclick="$('#formaporno').submit();">Agregar Ejemplar</a>
<a   class="btn btn-primary primary-btn" href="{{url('libros/listado')}}">Volver a Registro de Libros</a>

<table class="table">
    <caption>
        Ejemplares del Libro {{ $libro->titulo }}
    </caption>
    <thead>
        <tr>
            <th>Correlativo</th>
            <th>Estado</th> 
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
@foreach($data as $value)
        <tr>
            <td>{{ $value['correlativo'] }}</td> 
            <td>{{ $value['estado_item'] }}</td> 
            <td>
            <a title="Editar" onclick="paraEdit({{$value['id']}})" ><i class="material-icons ">create</i></a>
             
            <a  title="Eliminar" onclick="if(confirm('En verdad desea eliminar el ejemplar?')){$('#miforma').attr('action','{{url('ejemplares')}}/'+{{$value['id']}}).submit();}" ><i class="material-icons ">delete</i></a>
            </td>
        </tr>
@endforeach
    </tbody>
</table>
            <form id="miforma" method="post" action="{{ url('ejemplares') }}">
                <input type="hidden" name="_method" value="delete"> 
            </form>
@endsection

@section('scripts')
<script type="text/javascript">
@if(Session::has('exito'))
$.alert({
    title: 'Operación exitosa.',
    content: '{{ Session::get('exito') }}',
    type: 'green'
});
@endif
@if(Session::has('error'))
$.alert({
    title: 'Error.',
    content: 'Correlativo ya existe.',
    type: 'red'
});
@endif
       $('#new-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal


          $.ajax({
            url: '{{url('ejemplares/create/'.$libro['id'])}}',
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

function paraEdit(id)
{

          $.ajax({
            url: '{{url('libros')}}/'+id+'/edit',
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
@endsection