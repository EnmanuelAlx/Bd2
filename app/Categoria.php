<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    protected $table = "categorias";
    use SoftDeletes;
    
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

}
