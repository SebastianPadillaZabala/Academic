<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Suscripcion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class SuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $suscripcion = new Suscripcion();
        $suscripcion->nombre_plan = DB::table('planes')->where('id_Plan',$id)->value('nombre_Plan');
        $suscripcion->fecha_inicio = Carbon::now();
        $p = Carbon::now();
        $aux = DB::table('planes')->where('id_Plan',$id)->value('duracion');
        $suscripcion->fecha_final = $p->addDay($aux);
        $suscripcion->id_user = auth()->user()->id;
        $suscripcion->id_plan = $id;
        $suscripcion->save();

        $pago = new Pago();
        $pago->monto = DB::table('planes')->where('id_Plan',$id)->value('Precio');
        $pago->owner = $request->input('nombre');
        $pago->card_number = $request->input('card_number');
        $pago->expiration_month = $_POST['month'];
        $pago->expiration_year = $_POST['year'];
        $pago->security_code = $request->input('code');
        $pago->id_user = auth()->user()->id;
        $pago->id_suscripcion = DB::table('suscripciones')->max('id_suscrip');
        $pago->save();

        $user = Auth::user();
        $info = [
            'id usuario' => $user->id,
            'tipo usuario' => $user->tipo,
            'antiguo registro' => $suscripcion,
        ];
        Log::channel('mydailylogs')->info('Realizar Suscripcion: ', $info);

        return redirect()->route('home');
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
