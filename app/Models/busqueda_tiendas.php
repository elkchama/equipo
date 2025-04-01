<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusquedaTienda extends Model
{
    use HasFactory;

    protected $table = 'busqueda_tiendas'; // Nombre correcto de la tabla intermedia

    protected $fillable = ['busqueda_id', 'tienda_id'];

    public $timestamps = false; // La tabla intermedia no suele necesitar timestamps
}
