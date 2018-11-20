<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function ordenes(){
        return $this->belongsToMany(Orden::class, 'orden_producto', 'id_producto', 'id_orden');
    }
}
