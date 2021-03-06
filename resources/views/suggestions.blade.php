<div class="modal-header">Sugerencias y comentarios</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('send_sugerencias') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nombre (requerido)</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" title="Ingrese su nombre" placeholder="Ej. Pedro Pérez" class="form-control" name="name" required autofocus>

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Dirección de Correo (requerido)</label>

                            <div class="col-md-6">
                                <input id="email" type="email" title="Ingrese su dirección de correo" placeholder="Ej. asasa@hotmail.com" class="form-control" name="email" value="{{ old('email') }}" required >

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('topic') ? ' has-error' : '' }}">

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Comentarios y sugerencias</label>

                            <div class="col-md-6">
                                
                                <textarea name="message" id="message" cols="30" rows="10" required=""></textarea>
                              

                        </div>
                        </div>
                            
 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <input type="button" class="btn btn-primary" value="Cancelar" data-dismiss="modal" id="canc" name="">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
 
                            </div>
                        </div>
                    </form>
                </div>