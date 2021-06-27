<?php

namespace App\Http\Controllers\productos;

use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\producto\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Auth;
use DB;


class ProductosController extends Controller
{
    /**
     * Muestra la interfaz del catalogo de productos
     *
     * @return view
     */
    public function index()
    {
        return view('productos.list_productos');

    }

    public function listar_carrito(){
        
        return view('carrito-compras.list_carrito_compras');        
    }

    /**
     * Arma la tabla que muestra el catalogo de clientes
     * @author Vanessa Herrera
     *
     * @return {Datatables} elementos del dataTable.
     */
    public function dataTableProducto()
    {
        $productos = Producto::get();

        return Datatables::of($productos)
        ->addColumn('foto_producto',function($productos){            
            $ruta_adjuntos = Config::get('constants.RUTA_FOTO_PRODUCTOS');            
            $rutaFotoProducto = $ruta_adjuntos.$productos->foto;            
                 
            return "<img alt='image' class='img-circle img-sm center-block' src='".asset($rutaFotoProducto)."'>";
        })
        ->addColumn('descripcion',function($productos){            
            return $productos->descripcion;
        })
        ->addColumn('precio',function($productos){
            return $productos->precio;
        })       
        ->addColumn('action',function($productos){
            return 
            '<a class="btn btn-white" href="#" onclick=enviar_al_carro("'
            . $productos->id. '")><i class="fa fa-shopping-cart"></i> Agregar al carrito</a>';
        })
        ->rawColumns(['foto_producto', 'action'])
        ->make(true);
    }

}