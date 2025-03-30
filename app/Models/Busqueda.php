<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Busqueda extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla si es diferente de la convención
    protected $table = 'busquedas';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['resultados', 'recientes', 'fecha'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'busqueda_users', 'busqueda_id', 'user_id');
    }
}
