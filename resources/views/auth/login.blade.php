<div class="modal-header">Acceso</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Dirección de Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" title="Ingrese su dirección de correo con que se registró." placeholder="Ej. asasa@hotmail.com" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" title="Ingrese su contraseña." placeholder="********" type="password" class="form-control" name="password" required>

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