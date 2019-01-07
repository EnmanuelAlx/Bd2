<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdenProducto extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'ordenes_productos';
    protected $fillable = ['id_orden', 'id_producto', 'id_adicional'];

}
