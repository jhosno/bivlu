@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Registro</a></li> 
</ul>


<a   id="new-trigger" class="btn btn-primary primary-btn"><i class="material-icons ">add</i> Agregar Nuevo Usuario</a>

<table class="orderedtable table">
    <caption>
        Usuarios
    </caption>
    <thead>
        <tr>
            <th>Cédula</th>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
@foreach($users as $value)
        <tr>
            <td>{{ $value->human->cedula }}</td> 
            <td>{{ $value->email }}</td> 
            <td>{{ $value->human->nombres }} {{ $value->human->apellidos }}</td> 
            <td>{{ $value->user_level }}</td> 
         
            <td><a title="Editar" onclick="paraEdit({{$value['id']}})" title="Editar" ><i class="material-icons ">create</i></a><a  onclick="if(confirm('En verdad desea eliminar el libro?')){$('#miforma').attr('action','{{url('users')}}/'+{{$value['id']}}).submit();}" title="Eliminar" ><i class="material-icons ">delete</i></a>
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
    title: 'Hubo un problema.',
    content: '{{ Session::get('error') }}',
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

function paraEdit(id)
{

          $.ajax({
            url: '{{url('users')a}}/'+id+'/edit',
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