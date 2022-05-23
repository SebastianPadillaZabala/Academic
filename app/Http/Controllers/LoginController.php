<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->tipo == 'Admin'){
            return redirect()->route('admin.dashboard');

        }
        if(auth()->user()->tipo == 'Profesor'){
            return redirect()->route('profesor.dashboard'); 
        }
        if(auth()->user()->tipo == 'Alumno'){
            return redirect()->route('alumno.dashboard');

        }
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

    public function login(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('password');
        $credentials = array(
            'email' => $email,
            'password' => $pass
            );
            $auth = Auth::attempt($credentials); 
         if($auth){
            $user = Auth::user();
            $tipo = $user->tipo;
            $info = [
                'IP' => $request->getClientIp(),
                'id' => $user->id,
                'email' => $user->email,
                'tipo' => $tipo,
            ];
            Log::channel('mydailylogs')->info('Inicio de sesion: ', $info);
            if ($tipo == 'Alumno') {
                return redirect()->route('alumno.dashboard');
            }else{
                if($tipo == 'Profesor'){
                    return view('backoffice.pages.profesor.dashboard');    
                }
                return view('backoffice.pages.admin.dashboard');
            }
        }else{
           return back()->withErrors([
            'message' => 'El usuario o la contraseña son incorrectos'
        ]);
        
        }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
