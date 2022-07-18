<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller as Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Clase;
use App\Models\Suscripcion;
use Carbon\Carbon;
class Clases_Controller extends Controller
{
    public function get_clases($id_curso){
        $clases=[];
         /** @var \App\Models\MyUserModel $user **/
          $user = Auth::user();
          $id_user=$user->id;
          $suscripciones= DB::table('suscripciones')->where('id_user',$id_user)->get(); //usuario suscrito
        
       if($suscripciones){
           $fecha_final = DB::table('suscripciones')->where('id_user',$id_user)->max('fecha_final');
           $fecha_actual = Carbon::now();
        if($fecha_actual < $fecha_final){
           $list = new Clase();
           $list = $list->getByCursos($id_curso);
         
          foreach($list as $item){
           $item['descripcion'] = strip_tags($item['descripcion']);
           $item['descripcion']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['descripcion']);
  
           $clase_list= new \stdClass();
           
           $clase_list->id_clase=$item->id_clase;
           $clase_list->Titulo=$item->Titulo;
           $clase_list->Url=$item->Url;
           $clase_list->Nro_clase=$item->Nro_clase;
           $clase_list->descripcion=$item->descripcion;
           $clase_list->tiempo=$item->tiempo;
           $clase_list->id_curso=$item->id_curso;
          
           array_push($clases, $clase_list);
        }
          return response()->json($clases);
        }else{
              return response()->json($clases);
          }
        }else{
          return response()->json($clases);  
        } 
      }
    
     
   
}
