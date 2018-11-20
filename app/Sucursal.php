<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sucursal extends Model
{
    protected $table = 'sucursales';
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function adicionales(){
        return $this->belongsToMany(Adicional::class, 'adicionales_productos_sucursales', 'id_sucursal', 'id_adicional');
    }
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_sucursales', 'id_sucursal', 'id_producto');
    }
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
