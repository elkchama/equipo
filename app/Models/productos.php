<?php
// app/Models/productos.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model // Nombre del modelo en minúscula y plural
{
    use HasFactory;

    protected $table = 'productos'; // Especificar el nombre de la tabla

    protected $fillable = ['nombre', 'descripcion', 'precio', 'tienda_id'];

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }
}
