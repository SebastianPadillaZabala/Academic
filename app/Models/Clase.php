<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    protected $table = 'clases';
    protected $fillable = [
        'Titulo', 'Url', 'Nro_clase', 'descripcion', 'tiempo', 'id_curso'
    ];
    protected $primaryKey = 'id_clase';

}
