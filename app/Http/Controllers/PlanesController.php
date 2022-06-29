<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;

use Illuminate\Support\Facades\Log;

class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plan::all();
        return view('layouts.planes', ['planes' => $planes]);
    }

    public function tabla()
    {
        $planes = Plan::all();
        return view('backoffice.pages.admin.tablaPlanes', ['planes' => $planes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.registerPlan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan = new Plan();
        $plan->nombre_Plan = $request->input('name');
        $plan->Precio = $request->input('Precio');
        $plan->descripcion = $request->input('descripcion');
        $plan->duracion = $request->input('duracion');
        $plan->save();

        $user = Auth::user();
        $info = [
            'IP' => $request->getClientIp(),
            'id usuario' => $user->id,
            'tipo usuario' => $user->tipo,
            'nuevo registro' => $plan,
        ];
        Log::channel('mydailylogs')->info('Crear Plan: ', $info);


        return redirect()->route('Tplanes');
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

    public function pagos($id){
        if(auth()->user()){
        return view('checkout',['id'=>$id]);
        }else{
            return redirect()->route('log');
        }
    }
}
