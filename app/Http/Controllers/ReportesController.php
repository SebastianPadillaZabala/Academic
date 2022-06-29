<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\AlumnosExport;
use App\Exports\CategoriasExport;
use App\Exports\ClasesExport;
use App\Exports\CursosExport;
use App\Exports\PlanesExport;
use App\Exports\ProfesoresExport;
use App\Exports\UsersExport;
use App\Models\Alumno;
use App\Models\Categoria;
use App\Models\Clase;
use App\Models\Curso;
use App\Models\Plan;
use App\Models\Profesor;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Log;

class ReportesController extends Controller
{
    //
    public function index()
    {
        return view('backoffice.layouts.reporte');
    }

    public function validar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'modelo' => 'required',
            'extension' => 'required',
        ]);
        switch ($request->extension) {
            case 'pdf':
                return $this->pdf($request);
                break;
            default:
                return $this->otros($request);
                break;
        }
    }

    public function DefaultModel($modelo)
    {
        switch ($modelo) {
            case 'users':
                return User::$atributos;
                break;
            case 'alumnos':
                return Alumno::$atributos;
                break;
            case 'profesores':
                return Profesor::$atributos;
                break;
            case 'cursos':
                return Curso::$atributos;
                break;
            case 'clases':
                return Clase::$atributos;
                break;
            case 'categoria':
                return Categoria::$atributos;
                break;
            case 'planes':
                return Plan::$atributos;
                break;
            default:
                # code...
                break;
        }
    }

    public function PDF($datos){
        if ($datos['atributos'] == null) {
            $datos['atributos']  = $this->DefaultModel($datos['modelo']);
        }
        if ($datos['filtro'] != null && $datos['buscar'] != null && $datos['order'] != null && $datos['orderBy'] != null && $datos['cantidad'] != null) {

            if ($datos['cantidad'] == 'all') {
                $query = DB::table($datos['modelo'])->where($datos['filtro'], 'like', '%' . $datos['buscar'] . '%')
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->get();
            } else {
                $query = DB::table($datos['modelo'])->where($datos['filtro'], 'like', '%' . $datos['buscar'] . '%')
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->paginate($datos['cantidad']);
            }
        } else if ($datos['order'] != null && $datos['orderBy'] != null && $datos['cantidad'] != null) {
            if ($datos['cantidad'] == 'all') {
                $query = DB::table($datos['modelo'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->get();
            } else {
                $query = DB::table($datos['modelo'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->paginate($datos['cantidad']);
            }
        } else {
            $query = DB::table($datos['modelo'])->get();
        }
        $pdf = FacadePdf::loadView('admin.reporte',['query' => $query, 'datos' => $datos]);
        return $pdf->stream('reporte.pdf');
        //return view('admin.reporte',['query' => $query, 'datos' => $datos);
    }



    public function otros($datos)
    {
        if ($datos['atributos'] == null) {
            $datos['atributos']  = $this->DefaultModel($datos['modelo']);
        }
        switch ($datos['modelo']) {
            case 'users':
                return Excel::download(new UsersExport($datos), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'alumnos':
                return Excel::download(new AlumnosExport($datos), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'profesores':
                return Excel::download(new ProfesoresExport($datos), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'planes':
                return Excel::download(new PlanesExport($datos), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'categorias':
                return Excel::download(new CategoriasExport($datos), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'cursos':
                return Excel::download(new CursosExport($datos), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'clases':
                return Excel::download(new ClasesExport($datos), $datos['nombre'] . '.' . $datos['extension']);
                break;
            default:
                # code...
                break;
        }
    }
}
