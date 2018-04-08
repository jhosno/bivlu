<div class="modal-header">Sugerencias y comentarios</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('suggestions') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nombre (requerido)</label>

                            <div class="col-md-6">
                                <input id="email" type="email" title="Ingrese su dirección de correo con que se registró." placeholder="Ej. asasa@hotmail.com" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Dirección de Correo (requerido)</label>

                            <div class="col-md-6">
                                <input id="email" type="email" title="Ingrese su dirección de correo con que se registró." placeholder="Ej. asasa@hotmail.com" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Asunto</label>

                            <div class="col-md-6">
                                <input id="asunto" title="Asunto del correo" placeholder="" type="text" class="form-control" name="asunto" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Asunto</label>

                            <div class="col-md-6">
                                <textarea name="" id="" cols="30" rows="10"></textarea>
                                <input id="asunto" title="Asunto del correo" placeholder="" type="text" class="form-control" name="asunto" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>
                        </div>
                            <div class="col-md-offset-8"><a href="{{url('recuperacion')}}">¿Olvidó su contraseña? <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a></div>
 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <input type="button" class="btn btn-primary" value="Cancelar" data-dismiss="modal" id="canc" name="">
                                <button type="submit" class="btn btn-primary">
                                    Acceder
                                </button>
 
                            </div>
                        </div>
                    </form>
                </div>