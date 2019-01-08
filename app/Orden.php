<?php

namespace App;

use App\Orden;
use App\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden extends Model
{
    protected $table = 'ordenes';
    protected $fillable = ['status', 'id_usuario'];
    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class, 'ordenes_productos', 'id_orden', 'id_producto');
    }


    public function getProductos(){
        $orden_producto = OrdenProducto::where('id_orden', '=', $this->id)->get()->groupBy('id_producto');
        
        return $orden_producto;
    }

    public function costoTotal(){
        $productos = OrdenProducto::where('id_orden', '=', $this->id)->get();
        $total = 0;
        foreach ($productos as $producto) {
            $t = 0;
            if($producto->id_adicional != null){
                $t += Adicional::find($producto->id_adicional)->precio;
            }
            $t += Producto::find($producto->id_producto)->precio;
            $total += $t * $producto->cantidad;
        }
        return $total;
    }

    public function adicionales(){
        return $this->belongsToMany(AdicionalProducto::class, 'adicionales_ordenes', 'id_orden', 'id_adicional');
    }

    public function cantidadProductos(){
        
        return 0;
    }
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
