<?php

namespace App;
use App\Producto;


use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
