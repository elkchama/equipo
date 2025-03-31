<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fidelizacion extends Model
{
    use HasFactory;

    protected $table = 'fidelizacion';

    protected $fillable = [
        'finalidad',
        'puntos_totales',
        'limite_puntos',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
