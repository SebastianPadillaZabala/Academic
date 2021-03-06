<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $fillable = [
        'nombreCategoria', 'descripcion'
    ];
    protected $primaryKey = 'id_cat';

    static public $atributos = ['nombreCategoria', 'descripcion'];

}
