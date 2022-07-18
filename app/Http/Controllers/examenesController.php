<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Examen;
use App\Models\Examen_Alumno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class examenesController extends Controller
{
    //
    public float $promedio;
    public function index($id)
    {
        return view('profesor.examen', ['id_curso' => $id]);
    }

    public function create(Request $request, $id)
    {
        $examen = new Examen();
        $examen->titulo = $request->input('titulo');
        $examen->descripcion = $request->input('descripcion');
        $examen->curso_id = $id;
        $examen->save();
        $id_examen = DB::table('examenes')->max('id_examen');
        return view('profesor.preguntas', ['id' => $id_examen]);
    }

    public function redirect($id_examen){
        $examen = Examen::find($id_examen);
        
        $clase_curso = DB::table('clases')
        ->join('cursos', 'clases.id_curso', '=', 'cursos.id_curso')
        ->select('clases.*', 'cursos.nombreCurso')
        ->where('clases.id_curso', '=', $examen->curso_id)->get();

        $examen_curso = DB::table('examenes')             
             ->where('examenes.curso_id', '=', $examen->curso_id)->get();  

        $preguntas = DB::table('preguntas')
        ->join('examenes', 'preguntas.examen_id', '=', 'examenes.id_examen')
        ->join('incisos', 'preguntas.id_pregunta', '=', 'incisos.pregunta_id')
        ->select('preguntas.*','incisos.inciso')
        ->where('examenes.id_examen', '=', $id_examen)->get();
        
        return view('evaluacion', ['clase_curso'=>$clase_curso, 'examen_curso' => $examen_curso, 'examen' => $examen, 'preguntas'=>$preguntas, 'nro' => 0 , 'c' => 0]);
    }

    public function revisar(Request $request, $id_examen){
        $correcto = "correcto";
        $incisos = DB::table('preguntas')
        ->join('examenes', 'preguntas.examen_id', '=', 'examenes.id_examen')
        ->join('incisos', 'preguntas.id_pregunta', '=', 'incisos.pregunta_id')
        ->select('preguntas.tipo_pregunta','incisos.inciso','incisos.pregunta_id')
        ->where('examenes.id_examen', '=', $id_examen)
        ->where('incisos.tipo_inciso', '=', $correcto)->get();
                       
        $promedio = 0;
        $c = count($request->all())-1;
        $nro = 0;       
            
        for($i=1; $i<=$c; $i++){            
                if($incisos[$nro]->tipo_pregunta=="falso"){
                    $numero= "respuesta" . strval($i);
                    $respuesta = $request->input($numero);
                    if($respuesta == $incisos[$nro]->inciso){
                        $promedio = $promedio + 1.0;                    
                    }                
                }
                if($incisos[$nro]->tipo_pregunta=="opcion"){
                    $numero= "opciones" . strval($i);
                    $respuesta = $request->input($numero);                
                    if($respuesta == $incisos[$nro]->inciso){
                        $promedio = $promedio + 1.0;                                            
                    }                
                }
                if($incisos[$nro]->tipo_pregunta=="seleccion"){
                    $numero= "seleccion" . strval($i);
                    $respuesta = $request->input($numero);                    
                    foreach($respuesta as $r){
                        if($r == $incisos[$nro]->inciso){
                            $promedio = $promedio + 1.0;
                        }
                        $nro++;
                    }          
                    $nro--;                          
                }
                $nro++;                    
        }        
        $promedio = $promedio * 100 / count($incisos);
        if($promedio > 80.0){
            $examen_alumno = new Examen_Alumno();
            $examen_alumno->fecha = Carbon::now();
            $examen_alumno->estado = "aprobado";
            return view('aprobado');
        }else{
            $examen_alumno = new Examen_Alumno();
            $examen_alumno->fecha = Carbon::now();
            $examen_alumno->estado = "reprobado";
            return view('reprobado');
        }                
    }

    public function salir(){
        return view('alumno.dashboard');
    }
}
