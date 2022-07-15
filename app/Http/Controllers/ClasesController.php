<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('auth.regClase', ['id'=>$id]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $clase = new Clase();
        $clase->Titulo = $request->input('Titulo');
        $clase->Url = $request->input('Url');
        $clase->Nro_clase = $request->input('Nro_clase');
        $clase->descripcion = $request->input('descripcion');
        $clase->tiempo = $request->input('tiempo');
        $clase->id_curso = $id;
        $clase->save();

        $user = Auth::user();
        $info = [
            'IP' => $request->getClientIp(),
            'id usuario' => $user->id,
            'tipo usuario' => $user->tipo,
            'nuevo registro' => $clase,
        ];
        Log::channel('mydailylogs')->info('Crear Clase: ', $info);


        return redirect()->route('profesor.cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function redirect($id_curso){
        $clases = DB::table('clases')->where('id_curso', '=', $id_curso)->get();

        $id_user = auth()->user()->id;
        $fecha_final = DB::table('suscripciones')->where('id_user',$id_user)->max('fecha_final');
        $fecha_actual = Carbon::now();
           if($fecha_actual > $fecha_final && Auth::user()->tipo == "Alumno"){

             return redirect()->route('planes');

           }else{
             $clase_curso = DB::table('clases')
             ->join('cursos', 'clases.id_curso', '=', 'cursos.id_curso')
             ->select('clases.*', 'cursos.nombreCurso')
             ->where('clases.id_curso', '=', $id_curso)->get();
             $curso = DB::table('cursos')->where('id_curso', '=', $id_curso)->value('nombreCurso');

              return view('prueba2', ['clase_curso'=>$clase_curso]);
           }
    }

    public function redirectClase($id_clase){
        $avance =0;

        $clase = Clase::find($id_clase);
        $clase_curso = DB::table('clases')
        ->join('cursos', 'clases.id_curso', '=', 'cursos.id_curso')
        ->select('clases.*', 'cursos.nombreCurso')
        ->where('clases.id_curso', '=', $clase->id_curso)->get();
        $avance =(integer)( 100 * $id_clase)/count($clase_curso);
        settype($avance,"integer");
         $actual = DB::table('cursos_alumnos')
             ->join('cursos', 'cursos_alumnos.curso_id', '=', 'cursos.id_curso')
             ->select('*')
             ->where('cursos_alumnos.curso_id', '=', $clase->id_curso)->get();
         if ($actual[0]->progreso < 100 && $actual[0]->progreso < $avance ){
             DB::table('cursos_alumnos')
                 ->where('cursos_alumnos.id','=',$actual[0]->id)
                 ->update([
                     'progreso'=>$avance,
                 ]);
         }
        return view('prueba3', ['clase_curso'=>$clase_curso], ['clase'=>$clase]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
