<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';
    protected $fillable = [
        'fecha_nac', 'descripcion',
    ];
    protected $primaryKey = 'id_profe';
    static public $atributos = ['fecha_nac', 'descripcion','id_user'];
    public function user(){
        return $this->belongsTo(User::class,'id_user','id_profe');
    }
}
