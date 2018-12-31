<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Empresa extends Authenticatable
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password', 'telefono', 'imagen'
    ];

    
    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id');
    }


    
    
}
