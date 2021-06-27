
@extends('layouts.template')

@section('title')
   Carrito de Compras
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title border-bottom">
                        <h2 class="letra-azul-negrita" >Carrito de compras</h2>                  
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <!-- LISTADO DE PRODUCTOS  -->
                            <div class="col-md-8">
                                @php
                                    $total_compra = 0;    
                                @endphp
                                @if (count(Cart::getContent()))                                   
                                    @foreach (Cart::getContent() as $item)
                                        <div class="row">
                                            <div class="col-md-12">
                                                @php                                                      
                                                    $rutaFotoProducto = $item->attributes->urlfoto;   
                                                @endphp
                                                <div class="col-md-3">
                                                    <img class='img-circle img-md center-block' src='{{asset($rutaFotoProducto)}}'>
                                                </div>

                                                <div class="col-md-8">
                                                    <h3>{{ $item->name }}</h3>
                                                    {{ $item->price }}
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" onclick="eliminar_producto_carrito('{{$item->id}}')"><i class="fa fa-trash" style="font-size: 18px; padding-top: 15px; color: #ed5565"></i></a>  
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $total_compra = $total_compra + $item->price;
                                        @endphp
                                        <hr>
                                    @endforeach
                                @else
                                    <div class="alert alert-warning">
                                        Carrito de compras Vacio.
                                    </div>
                                @endif

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
                                    
                                    <div class="m-t-sm text-center">
                                        <div class="btn-group text-center">
                                        <a href="{{route('procesar_compra')}}" class="btn btn-primary btn-sm"><i class="fa fa-credit-card"></i> Procesar Compra</a>                                        
                                        </div>
                                    </div>
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
@endsection

@section('codigo_scripts')
<script src="{{ asset('/js/carrito_compras/list_carrito_compras.js') }}"></script>
@endsection
