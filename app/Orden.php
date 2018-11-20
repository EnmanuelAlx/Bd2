<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class, 'orden_productos', 'id_orden', 'id_producto');
    }
}
