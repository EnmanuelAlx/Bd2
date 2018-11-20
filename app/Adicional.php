<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    public function sucursales(){
        return $this->belongsToMany(Sucursal::class, 'adicionales_productos_sucursales', 'id_adicional', 'id_sucursal');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class, 'adicionales_productos_sucursales', 'id_adicional', 'id_producto');
    }

}
