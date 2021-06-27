
@extends('layouts.template')

@section('title')
   Pago Exitoso
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
                                <div class="col-md-12 text-center"> <div class="alert alert-success">Pago Procesado exitosamente</div>
                                <br><br><button type="button" class="btn btn-w-m btn-success">Imprimir Comprobante de Pao</button></div>
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
