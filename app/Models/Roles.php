<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];


    // Relación: Un rol puede tener muchos usuarios
    public function users()
    {
        return $this->hasMany(User::class, 'id_rol');
    }

    protected $table = 'roles'; // Especificar el nombre de la tabla
}

