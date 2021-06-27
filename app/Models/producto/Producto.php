<?php

namespace App\Models\producto;

use Illuminate\Database\Eloquent\Model;
use App\Models\traits\FormatsDates;

class Producto extends Model
{
    use FormatsDates;

    protected $table='producto';
    public $timestamps=false;
    protected $primaryKey='id';   
   
}
