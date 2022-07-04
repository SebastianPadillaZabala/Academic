<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth()->user()->id;
        $profesor = DB::select('SELECT * FROM profesores, users where profesores.id_user=users.id and users.id = ' . $id);
        return view('frontoffice.pages.profile_profesor.index', [
            'profesor' => $profesor[0]
        ]);
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
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $profesor = new Profesor();
        $profesor->fecha_nac = $request->input('fecha_nac');
        $email = $request->input('email');
        $file = $request->file('cv');
        if (Storage::putFileAs('/public/' . $email . '/', $file, $file->getClientOriginalName())) {
            $profesor->cv = $file->getClientOriginalName();
            $profesor->id_user = DB::table('users')->max('id');
            $profesor->save();

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
                'nuevo registro' => $profesor,
            ];
            Log::channel('mydailylogs')->info('Crear Usuario Profesor: ', $info);

            return view('backoffice.pages.profesor.dashboard');
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

    public function obtener_cursos()
    {
        $id_profesor = DB::table('profesores')->where('id_user', '=', auth()->user()->id)->value('id_profe');
        $cursos = DB::table('cursos')->where('id_prof', '=', $id_profesor)->get();
        return view('backoffice.pages.profesor.cursos', ['cursos' => $cursos]);
    }

    public function profesores()
    {
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
        return view('frontoffice.pages.profile_profesor.edit');
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
            ->where('id', '=', $id)
            ->update([
                'name' => $request->input('name'),
                'apellido' => $request->input('apellido'),
                'celular' => $request->input('celular'),
                'email' => $request->input('email'),
            ]);
        return redirect()->route('frontoffice.profesor.index');
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
    public function edit_password()
    {
        return view('frontoffice.pages.profile_profesor.edit_password');
    }
    public function change_password(ChangePasswordRequest $request)
    {
        $request->user()->password = Hash::make($request->password);
        $request->user()->save();
        return redirect()->back();
    }
}
