<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;
    protected $table = 'suscripciones';
    protected $fillable = [
        'nombre_plan', 'fecha_inicio', 'fecha_final', 'id_user', 'id_plan'
    ];
    protected $primaryKey = 'id_suscrip';
}
