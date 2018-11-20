<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function adicionales(){
        return $this->belongsToMany(Adicional::class, 'adicionales_productos_sucursales', 'id_sucursal', 'id_adicional');
    }
}
