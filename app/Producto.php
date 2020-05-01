<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'nombre', 'precio', 'descripcion',
    'stock', 'promedio', 'image',
    'categoria_id'
  ];
  
  public function categoria()
  {
      return $this->belongsTo(Categoria::class);
  }
}
