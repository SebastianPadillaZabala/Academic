<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Curso;

class Cursos_Controller extends Controller
{
    public function index()
    {   $list = new Curso();
        $list = $list->getAllCursos();
        $cursos=[];
        foreach($list as $item){
         $item['descripcion'] = strip_tags($item['descripcion']);
         $item['descripcion']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['descripcion']);
         
         $curso = new \stdClass();
         $curso->id=$item->id_curso;
         $curso->nombreCurso = $item->nombreCurso;
         $curso->image = $item->image;
         $curso->descripcion = $item->descripcion;
         $curso->cantidad_clases=$item->cantidad_clases;
         $curso->estado = $item->estado;
         $curso->fecha = $item->fecha;
         $curso->id_prof = $item->id_prof;
         $curso->id_categoria =$item->id_categoria;
         array_push($cursos, $curso);
        }
         return response()->json($cursos);
 
  
    }
}
