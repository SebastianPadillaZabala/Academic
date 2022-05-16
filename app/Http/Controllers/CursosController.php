<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Curso;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::all();
        return view('auth.registrar_curso',['categoria'=>$categoria]);
    }

    public function cursosAdmin(){
        $cursos = DB::select('select * from cursos INNER JOIN categorias
        ON cursos.id_categoria = categorias.id_cat
        INNER JOIN profesores ON cursos.id_prof = profesores.id_profe 
        INNER JOIN users ON users.id = profesores.id_user');  
        return view('backoffice.pages.admin.tablaCursos',['cursos'=>$cursos]);
    }

    public function AllcursosAdmin(){
        $cursos = DB::table('cursos')->where('estado', '=', 'Aprobado')->get();   
        return view('admin.mostrar_cursos',['cursos'=>$cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $curso = new Curso();
        $curso->nombreCurso = $request->input('name');
        $curso->image = $request->input('image');
        $curso->descripcion = $request->input('descripcion');
        $curso->cantidad_clases = 0;
        $curso->estado = 'Revision';
        $curso->fecha = Carbon::now();
        $id_profesor = DB::table('profesores')->where('id_user', '=', auth()->user()->id)->value('id_profe');
        $curso->id_prof = $id_profesor;
        $curso->id_categoria = $_POST['select'];
        $curso->save();                

        return redirect()->route('profesor.cursos');
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

    public function livewire($cat){
      return view('prueba', ['cat'=>$cat]);
    }
}
