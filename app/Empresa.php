<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function sucursales()
    {
        return $this->hasMany(Sucursal::class, 'empresa_id', 'id');
    }

    
}
