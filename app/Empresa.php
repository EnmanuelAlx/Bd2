<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    public function sucursales()
    {
        return $this->hasMany(Sucursal::class, 'empresa_id', 'id');
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
}
