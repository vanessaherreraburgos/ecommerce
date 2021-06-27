
@extends('layouts.template')

@section('title')
    {{trans('copies.breadcrumbs.list_productos')}}
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
          <div class="ibox">
              <div class="ibox-title border-bottom">
                  <h2 class="letra-azul-negrita" >Catalogo de Productos</h2>                  
              </div>
              <div class="ibox-content">
        			@component('components.tabla_elementos')
                        @slot('id')
        			        tablaListarProductos
        			    @endslot
        		        @slot('headers', [ 'Foto','Descripción', 'Precio','Acción'])
        		    @endcomponent
              </div>
          </div>
      </div>
		</div>
	</div>
@endsection

@section('codigo_scripts')
    <script src="{{ asset('/js/productos/list_productos.js') }}"></script>
@endsection
