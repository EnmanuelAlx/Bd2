<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id');
    }

    public function ordenes(){
        return $this->belongsToMany(Orden::class, 'orden_producto', 'id_producto', 'id_orden');
    }

}
