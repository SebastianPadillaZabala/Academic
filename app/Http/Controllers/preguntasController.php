<?php

namespace App\Http\Controllers;

use App\Models\Inciso;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class preguntasController extends Controller
{
    //
    public function index($id_examen)
    {        
        return view('profesor.preguntas',['id' => $id_examen]);
    }

    public function create(Request $request, $id_examen)
    {        
        $pregunta = new Pregunta();
        $pregunta->pregunta = $request->input('pregunta');
        $pregunta->examen_id = $id_examen;
        $pregunta->tipo_pregunta = $request->tipo;
        $pregunta->save();
        $id_pregunta = DB::table('preguntas')->max('id_pregunta');

        if ($request->tipo == "falso") {
            $inciso1 = new Inciso();
            $inciso2 = new Inciso();
            if ($request->respuesta == 'falso') {
                $inciso1->inciso = 'falso';
                $inciso1->tipo_inciso = 'correcto';
                $inciso1->pregunta_id = $id_pregunta;
                $inciso1->save();            

                $inciso2->pregunta_id = $id_pregunta;
                $inciso2->inciso = 'verdadero';
                $inciso2->tipo_inciso = 'incorrecto';                
                $inciso2->save();
            } else {
                $inciso1->inciso = 'falso';
                $inciso1->tipo_inciso = 'incorrecto';
                $inciso1->pregunta_id = $id_pregunta;
                $inciso1->save();            
                
                $inciso2->pregunta_id = $id_pregunta;
                $inciso2->inciso = 'verdadero';
                $inciso2->tipo_inciso = 'correcto';                
                $inciso2->save();
            }

        }else if ($request->tipo == "opcion"){
            $inciso1 = new Inciso();
            $inciso2 = new Inciso();
            $inciso3 = new Inciso();
            $inciso4 = new Inciso();
            $inciso1->pregunta_id = $id_pregunta;
            $inciso1->inciso = $request->input('opcion_1');
            if($request->opciones == 'opcion_1') {
                $inciso1->tipo_inciso = 'correcto';
            } else {
                $inciso1->tipo_inciso = 'incorrecto';
            }
            $inciso1->save();

            $inciso2->pregunta_id = $id_pregunta;
            $inciso2->inciso = $request->input('opcion_2');
            if($request->opciones == 'opcion_2') {
                $inciso2->tipo_inciso = 'correcto';
            } else {
                $inciso2->tipo_inciso = 'incorrecto';
            }
            $inciso2->save();

            $inciso3->pregunta_id = $id_pregunta;
            $inciso3->inciso = $request->input('opcion_3');
            if($request->opciones == 'opcion_3') {
                $inciso3->tipo_inciso = 'correcto';
            } else {
                $inciso3->tipo_inciso = 'incorrecto';
            }
            $inciso3->save();

            $inciso4->pregunta_id = $id_pregunta;
            $inciso4->inciso = $request->input('opcion_4');
            if($request->opciones == 'opcion_4') {
                $inciso4->tipo_inciso = 'correcto';
            } else {
                $inciso4->tipo_inciso = 'incorrecto';
            }
            $inciso4->save();
            
        }else{
            $inciso1 = new Inciso();
            $inciso2 = new Inciso();
            $inciso3 = new Inciso();
            $inciso4 = new Inciso();
            $inciso5 = new Inciso();
            $inciso1->pregunta_id = $id_pregunta;
            $inciso1->inciso = $request->input('inciso_1');                        
            $inciso1->tipo_inciso = 'incorrecto';
            $inciso2->pregunta_id = $id_pregunta;
            $inciso2->inciso = $request->input('inciso_2');
            $inciso2->tipo_inciso = 'incorrecto';
            $inciso3->pregunta_id = $id_pregunta;
            $inciso3->inciso = $request->input('inciso_3');
            $inciso3->tipo_inciso = 'incorrecto';
            $inciso4->pregunta_id = $id_pregunta;
            $inciso4->inciso = $request->input('inciso_4');
            $inciso4->tipo_inciso = 'incorrecto';
            $inciso5->pregunta_id = $id_pregunta;
            $inciso5->inciso = $request->input('inciso_5');
            $inciso5->tipo_inciso = 'incorrecto';
            $respuestas= $request->seleccion;
            foreach($respuestas as $respuesta){
                if($respuesta == "inciso_1"){
                    $inciso1->tipo_inciso = 'correcto';
                }
                if($respuesta == "inciso_2"){
                    $inciso2->tipo_inciso = 'correcto';
                }
                if($respuesta == "inciso_3"){
                    $inciso3->tipo_inciso = 'correcto';
                }
                if($respuesta == "inciso_4"){
                    $inciso4->tipo_inciso = 'correcto';
                }
                if($respuesta == "inciso_5"){
                    $inciso5->tipo_inciso = 'correcto';
                }                
            }           
            $inciso1->save();
            $inciso2->save();
            $inciso3->save();
            $inciso4->save();
            $inciso5->save();
        } 
        //return dd($request);               
        return view('profesor.preguntas', ['id' => $id_examen]);
    }

    public function exit(){
        return view('backoffice.pages.profesor.dashboard');
    }
}
