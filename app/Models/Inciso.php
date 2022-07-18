<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inciso extends Model
{
    use HasFactory;
    protected $table = 'incisos';
    protected $fillable = [
        'inciso', 'tipo_inciso', 'pregunta_id'
    ];
    protected $primaryKey = 'id_inciso';

    static public $atributos = ['inciso', 'tipo_inciso'];

}
