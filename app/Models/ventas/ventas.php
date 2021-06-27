<?php

namespace App\Models\ventas;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Ventas extends Model
{    
    public $timestamps=false;
    protected $table='venta';   
    protected $primaryKey='id';      


     /**  Obtiene el usuario asociado a la venta  */
    public function getUsuario(){
        return $this->belongsTo(User::class,'id_user');
    }
   
}
