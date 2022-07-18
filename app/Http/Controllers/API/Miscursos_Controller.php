<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;
use App\Models\Curso;
use Carbon\Carbon;

class Miscursos_Controller extends Controller
{   //crear mis cursos
    public function mis_cursos(Request $request)
    {
        $request->validate([
            'curso_id' => 'required',
            
        ]);

        $curso_id=$request->curso_id;

         /** @var \App\Models\MyUserModel $user **/
        $user = Auth::user();
        $id_user=$user->id;

        $date=Carbon::now();
        $date_ini=$date->format(format:'d-m-Y');
        $date_fin=$date->addYear()->format(format:'d-m-Y');
        $alumno = DB::table('alumnos')->where('id_user',$id_user)->get();
        foreach($alumno as $id_alumno){
           $id=$id_alumno->id_alum;
        }
        $mis_cursos= DB::table('cursos_alumnos')->where('alumno_id',$id)->where('curso_id',$curso_id)->count();
        $nulo=DB::table('cursos_alumnos')->count();
   
        if($mis_cursos==0  || $nulo==0){
        DB::table(table:'cursos_alumnos')->insert([
            'fecha_inicio'=>$date_ini,
            'fecha_fin'=>$date_fin,
            'estado'=>'activo',
            'progreso'=>1,
            'curso_id'=>$request->input(key:'curso_id'),
            'alumno_id'=>$id,
            'created_at'=>Carbon::now(tz:'America/La_Paz'),
            'updated_at'=>Carbon::now(tz:'America/La_Paz')
        ]);
    
        return response([
            'message' => 'curso alumno created.',
            'curso' => $mis_cursos,
        ], 200);
       }else{
        return response([
            'message' => 'curso alumno ya existe.',
            'curso' => $mis_cursos,
        ], 200);
       }
    } 

    public function get_mis_cursos()
    {   /** @var \App\Models\MyUserModel $user **/
        $user = Auth::user();
        $id_user=$user->id;
        $alumno = DB::table('alumnos')->where('id_user',$id_user)->get();
        $cursos1=[];
      
        foreach($alumno as $id_alumno){
            $id=$id_alumno->id_alum;
          $mis_cursos=DB::table('cursos_alumnos')->where('alumno_id',$id)->get();
          
          if($mis_cursos){
            foreach($mis_cursos as $id_curso){
            $idc=$id_curso->curso_id;
            $mis_cursos1=DB::table('cursos')->where('id_curso',$idc)->get();
                foreach($mis_cursos1 as $item){
                    // $item['descripcion'] = strip_tags($item['descripcion']);
                     //$item['descripcion']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['descripcion']);
                     $curso1 = new \stdClass();
                     $curso1->id=$item->id_curso;
                     $curso1->nombreCurso = $item->nombreCurso;
                     $curso1->image = $item->image;
                     $curso1->descripcion = $item->descripcion;
                     $curso1->cantidad_clases=$item->cantidad_clases;
                     $curso1->estado = $item->estado;
                     $curso1->fecha = $item->fecha;
                     $curso1->id_prof = $item->id_prof;
                     $curso1->id_categoria =$item->id_categoria;
                    array_push($cursos1, $curso1);
                }
           }
        
       
       }else{}
     }
       return response()->json($cursos1); 
 }

 public function progresoCurso($id_curso,$index){
    
    $user = Auth::user();
    $id_user=$user->id;

    $alumno = DB::table('alumnos')->where('id_user',$id_user)->get();
    foreach($alumno as $id_alumno){
        $id=$id_alumno->id_alum;
     }
     $progreso= DB::table('cursos_alumnos')->where('alumno_id',$id)->where('curso_id',$id_curso)->value('progreso');
     $clases_count=DB::table('clases')->where('id_curso',$id_curso)->count();
if ($clases_count!=0){
    if ($clases_count==$index){
        $progreso=100;
    }else{
    $progreso=($index*100)/$clases_count;
    $progreso=floor( $progreso);


    }
  
    $id = DB::table('cursos_alumnos')->where('alumno_id',$id)->where('curso_id',$id_curso)->value('id');
    $aux_progreso=DB::table('cursos_alumnos')->where('alumno_id',$id)->where('curso_id',$id_curso)->value('progreso');
    
    DB::table('cursos_alumnos')
    ->where('id',$id)
    ->update([
        'progreso'=>$progreso,
     
    ]);
    
    
}
        return response([
            'progreso' => $progreso,
        ], 200);
    
    }
      

}

