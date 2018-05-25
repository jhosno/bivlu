@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Registro</a></li> 
</ul>


<a   id="new-trigger" class="btn btn-primary primary-btn"><i class="material-icons ">add</i> Agregar Nuevo Registro</a>

<table class="orderedtable table">
    <caption>
        Registros en Sistema
    </caption>
    <thead>
        <tr>
            <th>Título</th>
            <th>Tipo</th>
            <th>Páginas</th>
            <th>Ejemplares Disponibles</th>
            <th>Autores</th>
            <th>Etiquetas</th>
            <th>Acciones aplicables</th>
        </tr>
    </thead>
    <tbody>
@foreach($data as $value)
        <tr>
            <td>{{ $value['titulo'] }}</td> 
            <td>
            @if($value['clasificacion']==1) 
                Consulta Virtual
            @endif
            @if($value['clasificacion']==2) 
                Consulta Fisica
            @endif
            @if($value['clasificacion']==3) 
                Proyecto
            @endif
             
            </td>
            <td>{{ $value['numero_paginas'] }}</td> 
            <td>{{ $value['disponibles'] }}</td> 
            <td>
        @foreach($value['authors'] as $a) 
                    <span class="label label-success">{{ $a['nombre'] }}</span>
        @endforeach
            </td> 
            <td>
        @foreach($value['tags'] as $t)
                    <span class="label label-success">{{ $t['palabras'] }}</span>
        @endforeach
            </td> 
            <td><a title="Editar" onclick="paraEdit({{$value['id']}})" title="Editar" ><i class="material-icons ">create</i></a><a  onclick="if(confirm('En verdad desea eliminar el libro?')){$('#miforma').attr('action','{{url('libros')}}/'+{{$value['id']}}).submit();}" title="Eliminar" ><i class="material-icons ">delete</i></a><a  href="{{url('ejemplares/'.$value['id'])}}" title="Ver Ejemplares"><i class="material-icons ">book</i></a>
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
@if(Session::has('Éxito'))
$.alert({
    title: 'Operación exitosa.',
    content: '{{ Session::get('Éxito') }}',
    type: 'green'
});
@endif
@if(Session::has('error'))
$.alert({
    title: 'Hubo un problema.',
    content: '{{ Session::get('error') }}',
    type: 'red'
});
@endif
@if(Session::has('errorñaño'))
$.alert({
    title: 'Error',
    content: '{{ Session::get('errorñaño') }}',
    type: 'red'
});
@endif
       $('#new-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal


          $.ajax({
            url: '{{url('libros/create')}}',
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