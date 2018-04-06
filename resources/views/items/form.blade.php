<div class="modal-header">Agregar Ejemplar</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('ejemplares') }}">
                    <input type="hidden" name="book_id" value="{{$libro->id}}"> 
                        {{ csrf_field() }} 

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="libro" class="col-md-3 control-label">Título:</label>

                            <div class="col-md-3">
                                {{ isset($libro) ? $libro['titulo'] : '' }}

                            </div>
                            <label for="password" class="col-md-3 control-label">Correlativo:<b style="color:red">*</b></label>

                            <div class="col-md-3">
                                <input class="form-control" onkeypress="return event.which>=48 && event.which<=57" title="Ingrese el identificador del ejemplar." placeholder="Ej. 343453" name="correlativo" type="number" min="1" value="{{ isset($item) ? $item['correlativo'] : '' }}" required> 

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <input type="button" class="btn btn-primary" value="Cancelar" id="canc" name="">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
 
                            </div>
                        </div>
                    </form>
                </div>