<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;

class Planes_Controller extends Controller
{
    public function planes()
    {   $list = new Plan();
        $list =DB::table('planes')->get();
        $planes=[];
        foreach($list as $item){
            //$item['descripcion'] = strip_tags($item['descripcion']);
            //$item['descripcion']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['descripcion']); 
         $plan = new \stdClass();
         $plan->id_Plan=$item->id_Plan;
         $plan->nombre_Plan = $item->nombre_Plan;
         $plan->descripcion = $item->descripcion;
         $plan->Precio=$item->Precio;
         $plan->duracion = $item->duracion;
         array_push($planes, $plan);
        }
         return response()->json($planes);
    }
}