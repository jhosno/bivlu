<div class="modal-header">Editar Privilegios de Usuario {{$usuario->name}}</div>
                <div class="modal-body">
                    <form class="form-horizontal " method="POST" action="{{ url('usuarios').'/'.$usuario->id }}">
 
 <div class=" form-group{{ $errors->has('email') ? ' has-error' : '' }}">
     <label for="user_level" class="control-label col-md-6">Nivel de usuario</label>
     <select name="user_level" id="user_level" class="form-control col-md-6">
         <option value="">Selecciones el tipo de usuario</option>
         <option value="estudiante">Estudiante</option>
         <option value="jefe">Jefe</option>
         <option value="encargado">Encargado</option>
         <option value="profesor">Profesor</option>
     </select>
 </div>
 <div class="form-group">
                        {{ csrf_field() }} 


   @foreach( $listado as $key => $value)
@if(is_string($value))
 
{{$key}}

<input type="checkbox" class="{{$key}}" name="privilegio_{{$key}}"  {{ $usuario->privilegios()->where([['modulo','=',$key ],['accion','=',null]] )->count()> 0 ? 'checked' : '' }}> 
 
@else
<br><h3>{{$key}}</h3><input id="{{$key}}" type="checkbox" name="" onchange="var elems = document.getElementsByClassName('{{$key}}'); for( i in elems) if(elems[i].checked != undefined ) elems[i].checked = this.checked;"> <label for="{{$key}}" ><label for="">Seleccionar todos</label></label><br>
    @foreach($value as $key2 => $value2)
 <input class="{{$key}}" type="checkbox" name="privilegio_{{$key}}_{{$key2}}" {{ $usuario->privilegios()->where([['modulo','=',$key ],['accion','=',$key2 ]] )->count()> 0 ? 'checked' 
: '' }} > 
<label for="">  {{$key2}}</label>
 <br>

    @endforeach
    

@endif
   @endforeach
                        
 
 </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
 
                            </div>
                        </div>
                                            <input type="hidden" name="user_id" value="{{$usuario->id}} ">
                    <input type="hidden" name="_method" value="put">
                    </form>
                </div>