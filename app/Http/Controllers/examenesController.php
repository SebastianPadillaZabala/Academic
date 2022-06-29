<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class examenesController extends Controller
{
    //
    public function index()
    {
        return view('profesor.examen');
    }

    public function create(Request $request)
    {
        $examen = new Examen();
        $examen->titulo = $request->input('titulo');
        $examen->descripcion = $request->input('descripcion');
        $examen->curso_id = 1;
        $examen->save();

        return view('profesor.preguntas');
    }
}
