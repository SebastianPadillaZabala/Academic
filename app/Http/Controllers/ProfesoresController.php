<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class ProfesoresController extends Controller
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
    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->apellido = $request->input('apellido');
        $user->celular = $request->input('celular');
        $user->tipo = 'Profesor';
        $user->email = $request->input('email');
        $user->password = bcrypt( $request->input('password'));
        $user->save();

        $profesor = new Profesor();
        $profesor->fecha_nac = $request->input('fecha_nac');
        $profesor->descripcion = $request->input('descripcion');
        $profesor->id_user = DB::table('users')->max('id');
        $profesor->save();

        $email = $request->input('email');
        $pass = $request->input('password');
        $credentials = array(
            'email' => $email,
            'password' => $pass
            );
            $auth = Auth::attempt($credentials);

            return view('backoffice.pages.profesor.dashboard');
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
        $profesor =  DB::table('profesores')
            ->where('id_profe','=',$id)
            ->select('profesores.*')
            ->first();
        return view('backoffice.pages.profesor.show',[
            'profesor'=>$profesor,
        ]);
    }

    public function obtener_cursos(){
        $id_profesor = DB::table('profesores')->where('id_user', '=', auth()->user()->id)->value('id_profe');
        $cursos = DB::table('cursos')->where('id_prof', '=', $id_profesor)->get();
        return view('backoffice.pages.profesor.cursos',['cursos' => $cursos]);
    }

    public function profesores(){
        $profesor = DB::select('select * from profesores INNER JOIN users
        on profesores.id_user = users.id');
        return view('backoffice.pages.admin.tablaProfesores', ['profesores' => $profesor]);
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
