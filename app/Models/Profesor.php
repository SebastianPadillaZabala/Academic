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
<<<<<<< HEAD
    public function user(){
        return $this->belongsTo(User::class,'id_user','id_profe');
    }
=======

    static public $atributos = ['fecha_nac', 'descripcion'];
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
}
