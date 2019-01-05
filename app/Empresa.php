<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresa extends Authenticatable
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password', 'telefono', 'imagen', 'id_categoria'
    ];

    
    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id');
    }

    public function getImagenAttribute($imagen)
    {
        return Storage::url($imagen);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
    
}
