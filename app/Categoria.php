<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function productos()
    {
        return $this->hasMany(Product::class, 'categoria_id');
    }
}
