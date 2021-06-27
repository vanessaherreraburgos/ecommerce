
@extends('layouts.template')

@section('title')
   Procesar Compra
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title border-bottom">
                        <h2 class="letra-azul-negrita" >Información para Finalizar la compra</h2>                  
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12" id="capa_finalizacion_compra">
                                <!-- LISTADO DE PRODUCTOS  -->
                                <div class="col-md-8">
                                    @php
                                        $total_compra = 0;    
                                    @endphp
                                    @if (count(Cart::getContent()))                                   
                                        @foreach (Cart::getContent() as $item)                                       
                                            @php
                                                $total_compra = $total_compra + $item->price;
                                            @endphp                                        
                                        @endforeach
                                    @else
                                        <div class="alert alert-warning">
                                            Carrito de compras Vacio.
                                        </div>
                                    @endif
                                    <form id="formFinalizarCompra" action="{{ route('finalizar_compra') }}" class="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Datos de Envio</h3>
                                                @if (Auth::check()) 
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Nombre:</b> {{ Auth::user()->name }}
                                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Teléfono:</b> {{ Auth::user()->telefono }}
                                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Dirección:</b> {{ Auth::user()->direccion_envio }}
                                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Email:</b> {{ Auth::user()->email }}
                                                @else   
                                                    <div class="col-md-8">                                             
                                                        <div class="form-group">                                           
                                                            <span class='col-md-4'>Nombre</span>
                                                            <div class="col-md-8">
                                                                <input type="text" maxlength="30" class="input-sm form-control" require id="nombre_invitado" name="nombre_invitado"   autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" style="padding-top: 10px"></div>
                                                        <div class="form-group">                                           
                                                            <span class='col-md-4'>Apellido</span>
                                                            <div class="col-md-8">
                                                                <input type="text" maxlength="30" class="input-sm form-control" require id="apellido_invitado" name="apellido_invitado"   autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" style="padding-top: 10px"></div>
                                                        <div class="form-group">                                           
                                                            <span class='col-md-4'>Identificación</span>
                                                            <div class="col-md-8">
                                                                <input type="text" maxlength="30" class="input-sm form-control" require id="identificacion_invitado" name="identificacion_invitado"   autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" style="padding-top: 10px"></div>
                                                        <div class="form-group">                                           
                                                            <span class='col-md-4'>Dirección</span>
                                                            <div class="col-md-8">
                                                                <input type="text" maxlength="30" class="input-sm form-control" require id="direccion_invitado" name="direccion_invitado"   autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" style="padding-top: 10px"></div>
                                                        <div class="form-group">                                           
                                                            <span class='col-md-4'>Teléfono</span>
                                                            <div class="col-md-8">
                                                                <input type="text" maxlength="30" class="input-sm form-control" require id="telefono_invitado" name="telefono_invitado"   autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">

                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3>Método de Pago</h3>
                                                <div class="form-group">                                           
                                                    <span class='col-md-4'> Tarjeta de crédito </span>
                                                    <div class="col-md-8">
                                                        <input type="text" maxlength="30" class="input-sm form-control" id="tarjeta_credito" name="tarjeta_credito" require  size="20" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="padding-top: 10px"></div>
                                                <div class="form-group">                                           
                                                    <span class='col-md-4'> Mes de expiracion</span>
                                                    <div class="col-md-8">
                                                        <input type="text" maxlength="2" class="input-sm form-control" id="mes_expiracion" name="mes_expiracion" require  size="10" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="padding-top: 10px"></div>
                                                <div class="form-group">                                           
                                                    <span class='col-md-4'> Año de expiracion</span>
                                                    <div class="col-md-8">
                                                        <input type="text" maxlength="4" class="input-sm form-control" id="anno_expiracion" name="anno_expiracion" require  size="10" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="padding-top: 10px"></div>
                                                <div class="form-group">                                           
                                                    <span class='col-md-4'> CVV</span>
                                                    <div class="col-md-8">
                                                        <input type="text" maxlength="4" class="input-sm form-control" id="cvv" name="cvv" require  size="10" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="padding-top: 10px"></div>
                                                <div class="form-group">                                           
                                                    <span class='col-md-4'> Identificacion del Titular</span>
                                                    <div class="col-md-8">
                                                        <input type="text" maxlength="20" class="input-sm form-control" id="identificacion_titular" name="identificacion_titular" require  size="10" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="padding-top: 10px"></div>
                                                <div class="form-group">                                           
                                                    <span class='col-md-4'> Nombre del Titular</span>
                                                    <div class="col-md-8">
                                                        <input type="text" maxlength="70" class="input-sm form-control" id="nombre_titular" name="nombre_titular" require  size="10" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-12" style="padding-top: 20px"></div>
                                            <div class="col-md-12 m-t-sm text-center">
                                                <div class="btn-group text-center">                                             
                                                <button class="btn btn-primary btn-sm" onclick="guardar_venta()" type="button" >
                                                        Guardar y Finalizar Compra
                                                </button>                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <!-- RESUMEN DE LA COMPRA  -->
                                <div class="col-md-4">
                                    <!-- INICIO RESUMEN COMPRA  -->
                                    <div class="ibox">
                                        <div class="ibox-title">
                                            <h3 style="color: #2f1b7c" class="text-center">Resumen de la compra</h3>
                                        </div>
                                        <div class="ibox-content">
                                            <span>
                                                Total
                                            </span>
                                            <h2 class="font-bold">
                                                {{ $total_compra }}
                                            </h2>
                                            <hr>                                    
                                            
                                        </div>
                                    </div>

                                    <!-- FIN RESUMEN COMPRA  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
@endsection

@section('codigo_scripts')
<script src="{{ asset('/js/carrito_compras/list_carrito_compras.js') }}"></script>
@endsection
