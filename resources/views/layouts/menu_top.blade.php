<!-- <div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="/">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search" />
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                
                <div class="pull-left image">
                  <img src="{{ asset('/perfiles_usuario/vanessa.jpg') }}" class="img-circle" alt="User Image">
                </div>
                <span >
                  <strong class="font-bold">
                    {{--Auth::user()->name--}}
                  </strong>
                </span>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-sign-out"></i> Salir
                </a>
            </li>
        </ul>
    </nav>
</div> -->

<div class="row border-bottom">
    <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-gris-oscuro " href="#"><i class="fa fa-bars"></i> </a>
           <!--  <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form> -->
            <img src="{{asset('/images/logo-ecommerce.png')}}" width="160px" height="45px" class="" alt="" style="padding-left: 10px">
        </div>
       
        

            <ul class="nav navbar-top-links text-right">   
                
                <a class="dropdown-toggle" href="{{route('cart.checkout')}}" >
                    <i class="fa fa-shopping-cart color-naranja" style="font-size: 30px; padding-top: 10px"></i>                     
                    @if (count(Cart::getContent()))
                        <span class="label label-primary" id="contador_carrito_menu_top">{{count(Cart::getContent())}}</span>
                    @endif
                </a>   &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; 
                @if (Auth::check()) 
                    <img src="{{asset('/kuravaina/perfiles_usuario/72725.png')}}" class="img-circle img-sm" >
                    <span class="visible-sm-inline visible-md-inline visible-lg-inline"> 
                        {{ Auth::user()->name }}
                    </span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li> -->
                @else
                    <a class="btn btn-white" href="{{route('iniciar_sesion')}}" style="">
                        <i class="fa fa-user"></i> Iniciar Sesión
                    </a> &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-white" href="{{route('crear_usuario')}}" style="">
                        <i class="fa fa-plus"></i> Registro
                    </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @endif
            </ul>

        

    </nav>
</div>
