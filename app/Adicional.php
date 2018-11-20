<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adicional extends Model
{
    public function sucursales(){
        return $this->belongsToMany(Sucursal::class, 'adicionales_productos_sucursales', 'id_adicional', 'id_sucursal');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class, 'adicionales_productos_sucursales', 'id_adicional', 'id_producto');
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];



}
