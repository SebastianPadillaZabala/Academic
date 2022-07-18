<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request){
        $resultado = $request->get('curso');
        $cursos = DB::table('cursos')
            ->select('id_curso','nombreCurso','image','descripcion','fecha')
            ->where('nombreCurso','LIKE','%'.$resultado.'%')
            ->orWhere('descripcion','LIKE','%'.$resultado.'%')
            ->orderBy('nombreCurso','asc')
            ->paginate(10);
        return view('layouts.resultado',
        ['cursos' => $cursos
        ]);
    }
}
