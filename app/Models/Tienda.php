<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'url', 'es_aliada'];

    public function busquedas()
    {
        return $this->belongsToMany(Busqueda::class, 'busqueda_tiendas', 'tienda_id', 'busqueda_id');
    }

    public function productos()
    {
        return $this->hasMany(productos::class);
    }
}
