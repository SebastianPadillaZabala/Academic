<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    
    protected $table = 'profesores';
    protected $fillable = [
        'fecha_nac', 'descripcion', 'id_user'
    ];
    protected $primaryKey = 'id_profe';
}
