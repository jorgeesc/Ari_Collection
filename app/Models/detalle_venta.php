<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_venta extends Model
{
    use HasFactory;

    protected $table = 'detalle_venta';
    protected $fillable = ['precio', 'cantidad', 'productos_id', 'venta_id','user_id'];


        public function getProductos()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\Productos','productos_id','id');
    }

     public function getVenta()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\Venta','venta_id','id');
    }

     
}
