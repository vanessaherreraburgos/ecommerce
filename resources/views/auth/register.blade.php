@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <a href="{{route('catalogo_productos')}}"><img src="{{asset('/images/logo-ecommerce.png')}}" width="200px" height="65px" class="" alt="" style="padding-left: 10px"></a>
    </div>
    <hr>
    <div class="row">
        
            
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: 70px">
                    <h2 class="text-center">Registro</h2>
                    
                    <form class="form-horizontal" method="POST" action="{{ route('guardar_registro') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Nombre</label>                            
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label for="apellido" class=" control-label">Apellido</label>                            
                            <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>

                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('identificacion') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Identificacion</label>                            
                                <input id="identificacion" type="text" class="form-control" name="identificacion" value="{{ old('identificacion') }}" required autofocus>

                                @if ($errors->has('identificacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identificacion') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="control-label">Dirección de Envio</label>

                            
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('identificacion') }}" required autofocus>

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="control-label">Teléfono</label>
                            
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required autofocus>

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail</label>                            
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password (Mínimo 10 Caracteres)</label>
                            
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirmar Password (Mínimo 10 Caracteres)</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                   Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="col-md-3"></div>
            
       
    </div>
</div>
@endsection
