<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'planes';
    protected $fillable = [
        'nombre_Plan', 'descripcion', 'Precio', 'duracion'
    ];
    protected $primaryKey = 'id_Plan';
}
