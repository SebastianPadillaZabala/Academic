<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    protected $table = 'preguntas';
    protected $fillable = [
        'pregunta', 'tipo', 'examen_id'
    ];
    protected $primaryKey = 'id_pregunta';

    static public $atributos = ['pregunta', 'tipo'];
}
