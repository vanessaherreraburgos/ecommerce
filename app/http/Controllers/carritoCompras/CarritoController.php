<?php

namespace App\Http\Controllers\carritoCompras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\producto\Producto;
use App\Models\ventas\Ventas;
use App\Models\ventas\DetalleVenta;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class CarritoController extends Controller
{
    
    /**
     * Agrega un producto al carrito de compras
     * @author Vanessa Herrera
     *
     * @return response
     */
    public function add(Request $request){
       
        $producto = Producto::find($request->producto_id);      

        $ruta_adjuntos = Config::get('constants.RUTA_FOTO_PRODUCTOS');            
        $rutaFotoProducto = $ruta_adjuntos.$producto->foto;

        Cart::add(
            $producto->id, 
            $producto->descripcion, 
            $producto->precio, 
            1,
            array("urlfoto"=>$rutaFotoProducto)
           
        );      

       return response()->json(['success' => true], 200);
   
    }

    /**
     * Muestra interfaz del carrito de compras
     * @author Vanessa Herrera
     *
     * @return view
     */
    public function listar_carrito(){
        return view('carrito-compras.list_carrito_compras');     
    }
    

    /**
     * Elimina un producto del carrito de compras 
     * @author Vanessa Herrera
     *
     * @return response
     */
    public function removeitem(Request $request) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
        'id' => $request->id,
        ]);
        return response()->json(['success' => true], 200);
    }

    /**
     * Vacia el carrito de compras
     * @author Vanessa Herrera
     *     
     */
    public function clear(){
        Cart::clear();
        //return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }

    /**
     * Muestra interfaz para procesar la compra, se ingresa el método de pago
     * @author Vanessa Herrera
     *
     * @return view
     */
    public function procesarCompra(){

        return view('carrito-compras.metodo_pago');     

    }

    /**
     * Guarda toda la información de la venta 
     * @author Vanessa Herrera
     *
     * @return response
     */
    public function FinalizarCompra(Request $request){

        $validator = Validator::make( $request->all(),
                [
                    'tarjeta_credito'    => 'required|string|max:40',
                    'mes_expiracion'     => 'required|string|max:40',
                    'anno_expiracion'         => 'required|string|max:4',  
                    'cvv'                 => 'required',  
                    'identificacion_titular'  => 'required|numeric',                      
                    'nombre_titular'    => 'required|string|max:100',                                 
                ]
            );

        if($validator->fails()){           
            return response()->json(array('errors' => $validator->messages()),200);
        }else{  
            $date = Carbon::now();
            $obj_venta = new Ventas;
            if (Auth::check()){
                $obj_venta->id_user = Auth::user()->login;
            }else{
                $obj_venta->nombre_invitado = $request->nombre_invitado;
                $obj_venta->apellido_invitado = $request->apellido_invitado;
                $obj_venta->identificacion_invitado = $request->identificacion_invitado;
                $obj_venta->direccion_invitado = $request->direccion_invitado;
                $obj_venta->telefono_invitado = $request->telefono_invitado;
            }           
            
            $obj_venta->fecha_venta = date('Y-m-d');
            $obj_venta->total_venta = $request->total_venta;
            $obj_venta->tarjeta_credito = $request->tarjeta_credito;
            $obj_venta->mes_expiracion = $request->mes_expiracion;
            $obj_venta->cvv = $request->cvv;
            $obj_venta->identificacion_titular = $request->identificacion_titular;
            $obj_venta->nombre_titular  = $request->nombre_titular;
            $obj_venta->created_at = date('Y-m-d H:i:s');
            $obj_venta->save();

            foreach (Cart::getContent() as $item){

                $obj_detalle = new DetalleVenta;
                $obj_detalle->id_venta = $obj_venta->id;
                $obj_detalle->id_producto = $item->id;
                $obj_detalle->precio_venta = $item->price;
                $obj_detalle->created_at = date('Y-m-d H:i:s');
                $obj_detalle->save();
            }
           
            Cart::clear();  // se vacia el carrito

            return response()->json(['success' => true], 200);
            
        }        

    }

    /**
     * Muestra la interfaz con información del pago exitoso
     * @author Vanessa Herrera
     *
     * @return view
     */
    public function PagoExitoso(){
        return view('carrito-compras.pago_exitoso');     
    }

}