<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen_Alumno extends Model
{
    use HasFactory;
    protected $table = 'examen_alumnos';
    protected $fillable = [
        'fecha', 'estado', 'examen_id'
    ];
    protected $primaryKey = 'id_examen_alumno';

    static public $atributos = ['fecha', 'estado'];
}
