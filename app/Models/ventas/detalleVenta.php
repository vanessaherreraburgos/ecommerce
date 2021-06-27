<?php

namespace App\Models\ventas;

use App\Models\producto\Producto;
use App\Models\ventas\Ventas;

use Illuminate\Database\Eloquent\Model;


class DetalleVenta extends Model
{    
    public $timestamps=false;
    protected $table='detalle_venta';   
    protected $primaryKey='id';   

     /**  Obtiene la venta asociada  */
     public function getVenta(){
        return $this->belongsTo(Ventas::class,'id_venta');
    }

    /**  Obtiene el producto asociado a la venta  */
    public function getProducto(){
        return $this->belongsTo(Producto::class,'id_producto');
    }

   
   
}
