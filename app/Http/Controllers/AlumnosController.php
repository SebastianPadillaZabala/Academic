<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlumnosController extends Controller
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

    public function alumnos(){
        $alumnos = DB::select('select * from alumnos INNER JOIN users
        on alumnos.id_user = users.id');       
        return view('backoffice.pages.admin.tablaAlumnos', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->apellido = $request->input('apellido');
        $user->celular = $request->input('celular');
        $user->tipo = 'Alumno';
        $user->email = $request->input('email');
        $user->password = bcrypt( $request->input('password'));
        $user->save();

        $alumno = new Alumno();
        $alumno->cantidad_cursos = 0;
        $alumno->suscripcion = 'ninguna';
        $alumno->id_user = DB::table('users')->max('id');
        $alumno->save();

        $email = $request->input('email');
        $pass = $request->input('password');
        $credentials = array(
            'email' => $email,
            'password' => $pass
            );
            $auth = Auth::attempt($credentials); 
            $info = [
                'IP' => $request->getClientIp(),
                'id_alumno' => $alumno->id_alum,
                'email' => $user->email,
                'id_usuario' => $user->id,
            ];
            Log::channel('mydailylogs')->info('Registro Alumno: ', $info);

        return redirect()->route('alumno.dashboard');
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
