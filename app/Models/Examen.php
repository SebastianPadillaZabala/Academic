<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $table = 'examenes';
    protected $fillable = [
        'titulo', 'descripcion', 'curso_id'
    ];
    protected $primaryKey = 'id_examen';

    static public $atributos = ['titulo', 'descripcion'];
}
