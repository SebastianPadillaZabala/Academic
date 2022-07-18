<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;
use App\Models\Suscripcion;
use App\Models\Pago;
use Carbon\Carbon;

use Illuminate\Support\Facades\Log;

class Suscripcion_Controller extends Controller
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

    public function suscripcion(Request $request,$id_plan)
    {
        $request->validate([
            'nombre' => 'required', 
            'card_number'=>'required',
            'month'=>'required',
            'year'=>'required',
            'code'=>'required',

        ]);
        
        $user = Auth::user();
        $id_user=$user->id;

        $suscripcion = new Suscripcion();
        $suscripcion->nombre_plan = DB::table('planes')->where('id_Plan',$id_plan)->value('nombre_Plan');
        $suscripcion->fecha_inicio = Carbon::now();
        $p = Carbon::now();
        $aux = DB::table('planes')->where('id_Plan',$id_plan)->value('duracion');
        $suscripcion->fecha_final = $p->addDay($aux);
        $suscripcion->id_user = $id_user;
        $suscripcion->id_plan = $id_plan;
        $suscripcion->save();

        $pago = new Pago();
        $pago->monto = DB::table('planes')->where('id_Plan',$id_plan)->value('Precio');
        $pago->owner = $request->input('nombre');
        $pago->card_number = $request->input('card_number');
        $pago->expiration_month = $request->input('month');
        $pago->expiration_year = $request->input('year');
        $pago->security_code = $request->input('code');
        $pago->id_user = $id_user;
        $pago->id_suscripcion = DB::table('suscripciones')->max('id_suscrip');
        $pago->save();

        $info = [
            'id usuario' => $user->id,
            'tipo usuario' => $user->tipo,
            'antiguo registro' => $suscripcion,
        ];
        Log::channel('mydailylogs')->info('Realizar Suscripcion: ', $info);

        return response([
            'message' => 'Compra exitosa!',
        ], 200);
    }
}