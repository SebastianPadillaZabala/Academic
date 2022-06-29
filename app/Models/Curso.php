<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    protected $fillable = [
        'nombreCurso', 'image', 'descripcion', 'cantidad_clases', 'estado', 'fecha', 'id_prof', 'id_categoria'
    ];
    protected $primaryKey = 'id_curso';

    static public $atributos = ['nombreCurso', 'image', 'descripcion', 'cantidad_clases', 'estado', 'fecha'];

    ///Carol todos los cursos
    public function getAllCursos() {
        return $this->orderBy('id', 'desc')->get();
    }
    
}
