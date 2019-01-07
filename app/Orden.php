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

    public function adicionales(){
        return $this->belongsToMany(AdicionalProducto::class, 'adicionales_ordenes', 'id_orden', 'id_adicional');
    }
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
