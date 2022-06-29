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

    static public $atributos = ['Titulo', 'Url', 'Nro_clase', 'descripcion', 'tiempo'];

    ///carol obtengo las clases por curso
    public function getByCursos($value) {
        return $this->where(['id_curso' => $value])->get();
    }

    public function getByClase($value) {
        return $this->where(['id_clase' => $value])->get();
    }

}
