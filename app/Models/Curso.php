<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    protected $fillable = [
        'name', 'image', 'descripcion', 'cantidad_clases', 'estado', 'fecha', 'id_prof', 'id_categoria'
    ];
    protected $primaryKey = 'id_curso';

}
