<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Curso;

class Cursos_Controller extends Controller
{
    public function index()
    {   $list = new Curso();
        $list = DB::table('cursos')->where('estado','=',"Aceptado" )->get();
        $cursos=[];
        foreach($list as $item){
    
         
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
    public function get_by_Categorias()
    { }

    public function categorias()
    {  $list = new Categoria();
        $list = DB::table('categorias')->get();
        $categorias=[];
        foreach($list as $item){

         
         $cat = new \stdClass();
         $cat->id_cat=$item->id_cat;
         $cat->nombreCurso = $item->nombreCategoria;
         $cat->descripcion = $item->descripcion;
         array_push($categorias, $cat);
        }
         return response()->json($categorias);
    }

}
