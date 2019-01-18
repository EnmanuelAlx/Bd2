<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adicional extends Model
{
    protected $table = 'adicionales';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'descripcion', 'precio', 'id_empresa'
    ];

    public function productos(){
        return $this->belongsToMany(Producto::class, 'adicionales_productos', 'id_adicional', 'id_producto');
    }

    public static function AdicionalesNotProduct($producto){

        $id_adicionales = $producto->adicionales->map(function ($item) {
            return $item->id;
        });
        return Adicional::whereNotIn('id', $id_adicionales)->where('id_empresa', '=', Auth::guard('empresa')->user()->id)->get();
    }


}
