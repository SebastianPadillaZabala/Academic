<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Alumno;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use App\Models\Clase;
use App\Models\Inciso;
use App\Models\Pregunta;
use Carbon\Carbon;
//use Validator;

class ExamenController extends BaseController
{

    public function getExamen($id_curso){
        $examen = DB::table('examenes')->where('curso_id', $id_curso)->first();
        $response = [
            'id_examen' => $examen->id_examen,
            'titulo' => $examen->titulo,
            'descripcion' => $examen->descripcion,
            'curso_id' => $examen->curso_id,
        ];
        return response($response, 200);
    }

    public function getIncisos($id_pregunta){
        $list = new Inciso();
        $list = DB::table('incisos')->where('pregunta_id', $id_pregunta)->get();
        $incisos=[];
        foreach($list as $item){
            $inciso = new \stdClass();
            $inciso->id_inciso = $item->id_inciso;
            $inciso->inciso = $item->inciso;
            $inciso->tipo = $item->tipo;
            array_push($incisos, $inciso);
        }
        //return $incisos;
        return response()->json($incisos);
    }


    public function getPreguntas($id_examen){
        $list = new Pregunta();
        $list = DB::table('preguntas')->where('examen_id', $id_examen)->get();
        $preguntas = [];

        foreach($list as $item){
            $pregunta = [
                'id_pregunta' => $item->id_pregunta,
                'pregunta' => $item->pregunta,
                'tipo' => $item->tipo,
            ];
            array_push($preguntas, $pregunta);
        }
        return response()->json($preguntas);
    }

    public function getUnCurso($id_curso){
        $curso = DB::table('cursos')->where('id_curso', $id_curso)->first();
        $response = [
            'id' => $curso->id_curso,
            'nombreCurso' => $curso->nombreCurso,
            'imagen' => $curso->image,
            'descripcion' => $curso->descripcion,
            'cantidad_clases' => $curso->cantidad_clases,
            'estado' => $curso->estado,
            'fecha' => $curso->fecha,
            'id_prof' => $curso->id_prof,
            'id_categoria' => $curso->id_categoria,
        ];
        return response($response, 200);
    }



}
