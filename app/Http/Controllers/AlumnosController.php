<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Models\Alumno;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $id = Auth()->user()->id;
            //$alumno = DB::select('SELECT * FROM alumnos, users where alumnos.id_user=users.id and users.id = '. $id);
            $alumno = DB::select('SELECT alumnos.*, users.*, suscripciones.fecha_inicio, suscripciones.fecha_final, (true) as x
            FROM alumnos, users, suscripciones
            where alumnos.id_user=users.id and users.id = '.$id. 'and suscripciones.id_user ='.$id);
             if($alumno == null){
                 $alumno = DB::select('SELECT alumnos.*, users.*, (false) as x
                  FROM alumnos, users where alumnos.id_user=users.id and users.id = '. $id);
                }
           $curso = DB::select('SELECT * FROM  cursos_alumnos, cursos, alumnos
           where cursos.id_curso=cursos_alumnos.curso_id and  alumnos.id_alum=cursos_alumnos.alumno_id and alumnos.id_user = '. $id

           );

            return view('frontoffice.pages.profile_alumno.index',[
                'alumno'=> $alumno[0],
                'cursos'=>$curso,
            ]);

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
    //    $alumno->id_user = DB::table('users')->max('id');
        $alumno->id_user = $user->id;
        $alumno->save();

        DB::table('role_user')->insert([
            'role_id'=>3,
            'user_id'=>$user->id,
        ]);

        $email = $request->input('email');
        $pass = $request->input('password');
        $credentials = array(
            'email' => $email,
            'password' => $pass
            );
            $auth = Auth::attempt($credentials);

        $info = [
            'IP' => $request->getClientIp(),
            'id usuario' => $user->id,
            'email' => $user->email,
            'tipo usuario' => $user->tipo,
            'nuevo registro' => $alumno,
        ];
        Log::channel('mydailylogs')->info('Crear Usuario Alumno: ', $info);

        return redirect()->route('frontoffice.alumno.index');
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
        return view('frontoffice.pages.profile_alumno.edit');
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
        DB::table('users')
            ->where('id','=',$id)
            ->update([
                'name'=>$request->input('name'),
                'apellido'=>$request->input('apellido'),
                'celular'=>$request->input('celular'),
                'email'=>$request->input('email'),
            ]);
        return redirect()->route('frontoffice.alumno.index');
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
    public function edit_password(){
        return view('frontoffice.pages.profile_alumno.edit_password');
    }
    public function change_password(ChangePasswordRequest $request){
        $request->user()->password = Hash::make($request->password);
        $request->user()->save();
        return redirect()->back();
    }
    public function inscribirCurso(Request $request){
        $date =Carbon::now();
        $date_ini = $date->format('d-m-Y');
        $date_fin = $date->addYear();
        DB::table('cursos_alumnos')->insert([
            'fecha_inicio'=>$date,
            'fecha_fin'=>$date_fin,
            'estado'=>'activo',
            'progreso'=>1,
            'curso_id'=>$request->input('curso_id'),
            'alumno_id'=>$request->input('alumno_id')
        ]);
        return redirect()->back();
    }
    public function avanzar($id){
        DB::table('cursos_alumnos')
            ->where('id','=',$id)
            ->update([
                'progreso'=>10,
            ]);
        return redirect()->route('frontoffice.alumno.index');
    }
}
