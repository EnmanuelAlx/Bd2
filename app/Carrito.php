<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrito extends Model
{
    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class, 'carrito_productos', 'id_carrito', 'id_producto');
    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
