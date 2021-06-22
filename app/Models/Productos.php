<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = ['nombre', 'descripcion', 'precio', 'status', 'stock','categorias_id', 'imgNombreVirtual', 'imgNombreFisico'];

    public function getCategoria()
    {
                            // Modelo de referencia, campo local, campo foráneo 
        return $this->belongsTo('App\Models\Categoria','categorias_id','id');
    }
    // public function getProveedor()
    // {
    //                         // Modelo de referencia, campo local, campo foráneo 
    //     return $this->belongsTo('App\Models\Proveedor','proveedor_id','id');
    // }
}