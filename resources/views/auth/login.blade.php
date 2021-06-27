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
                    <h2 class="text-center">Iniciar sesión</h2>
                    <form class="" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">EMAIL</label>
                            <input type="text" class="form-control" placeholder="" id="email" name="email" value="{{ old('email') }}" required>  

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                            <input type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        
                        <div class="form-group text-center">
                            <!-- <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <small>Remember Me</small>
                            </label> -->
                            <button type="submit" class="btn btn-success">Ingresar</button>
                            <br><br>
                            <a class="" href="{{route('crear_usuario')}}" style="">
                                Registrarse
                            </a> 
                        </div>
            
                    </form>
                </div>

                <div class="col-md-3"></div>
                
            </div>    
                    
               
        </div>
    
@endsection
