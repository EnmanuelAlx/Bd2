<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden extends Model
{
    protected $table = 'ordenes';
    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class, 'orden_productos', 'id_orden', 'id_producto');
    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
