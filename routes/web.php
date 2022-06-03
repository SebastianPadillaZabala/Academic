<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\ClasesController;
use App\Http\Livewire\ListaCurso;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/////LOGIN
Route::get('/log', function () {
    return view('auth.loginE');
})->name('log');

Route::post('/loggin',[LoginController::class, 'login'])
->name('loggin');


////TODO ADMIN
Route::get('/admin', function () {
    return view('backoffice.pages.admin.dashboard');
})->name('admin.dashboard');
Route::get('/ACategorias',[CategoriaController::class, 'create'])
->name('Acategorias');
Route::get('/AllCategorias',[CategoriaController::class, 'categoriasTable'])
->name('Allcategoriastable');
Route::post('/ACategoriass',[CategoriaController::class, 'store'])
->name('Añadircategorias');

Route::get('/Allprofesores',[ProfesoresController::class, 'profesores'])
->name('Allprofesores');

Route::get('/Allalumnos',[AlumnosController::class, 'alumnos'])
->name('Allalumnos');
Route::get('/Allcursos',[CursosController::class, 'cursosAdmin'])
->name('CursosAdmin');
Route::get('/Allcursoss',[CursosController::class, 'AllcursosAdmin'])
->name('AllCursosAdmin');
Route::get('/ValidateC/{id}',[CursosController::class, 'cursosVal'])
->name('cursosVal');
Route::post('/ValidateCurso/{id}',[CursosController::class, 'validarCurso'])
->name('cursoValidate');

////TODO DE PROFESOR/////////////////
Route::get('/regProfe', function () {
    return view('auth.registerProf');
})->name('reg');
Route::post('/registerProfe',[ProfesoresController::class, 'create'])
->name('profesor.register');

Route::get('/profesor/{profesor}',[ProfesoresController::class,'show'])
    ->name('profesor.show');


Route::get('/profesor', function () {
    return view('backoffice.pages.profesor.dashboard');
})->name('profesor.dashboard');

//REGISTRAR CURSO
Route::get('/regcursp',[CursosController::class, 'index'])
->name('regCurso');
Route::post('/registerCurso',[CursosController::class, 'create'])
->name('curso.register');
Route::get('/CursosP',[ProfesoresController::class, 'obtener_Cursos'])
->name('profesor.cursos');

//CLASES
Route::get('/regclase/{id}',[ClasesController::class, 'index'])
->name('regClase');
Route::post('/registerClase/{id}',[ClasesController::class, 'store'])
->name('claseRegister');

////TODO DE ALUMNO
Route::get('/regAlum', function () {
    return view('auth.registerAlum');
})->name('regA');
Route::post('/registerAlum',[AlumnosController::class, 'create'])
->name('alumno.register');
Route::get('/alumno', function () {
    return view('alumno.dashboard');
})->name('alumno.dashboard');
Route::resource('alumno','App\Http\Controllers\AlumnosController');




Route::get('/Categorias',[CategoriaController::class, 'categorias'])
->name('categorias');


Route::get('/', function () {
    return view('welcome-ecommerce');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





Route::get('/video', function () {
    return view('video.reproductor');
})->name('video');

/////PLANES
Route::get('/planes',[PlanesController::class, 'index'])
->name('planes');
Route::get('/Tplanes',[PlanesController::class, 'tabla'])
->name('Tplanes');
Route::get('/Addplan',[PlanesController::class, 'create'])
->name('Addplan');
Route::post('/Rplan',[PlanesController::class, 'store'])
->name('Rplan');

Route::get('/prueba/{cat}', [CursosController::class, 'livewire'])
->name('prueba');

Route::get('/equipo', function () {
    return view('grupo');
})->name('grupo');

Route::get('/redirect',[LoginController::class, 'index'])
->name('re');

Route::get('/clase/{id}',[ClasesController::class, 'redirect'])
->name('clase');

Route::get('/curso/clase/{id}',[ClasesController::class, 'redirectClase'])
->name('claseR');

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/reportes',function () {
    return view('backoffice.layouts.reporte');
})->name('reporte');
Route::post('/reportes',[ReportesController::class, 'validar'])->name('reporte.validar');
Route::get('/reportePDF',[ReportesController::class, 'index'])->name('reporte.index');

Route::group(['middleware' => ['auth'],'as' => 'backoffice.'],function (){
    Route::resource('role','App\Http\Controllers\RoleController');
    Route::get('user/{user}/assign_role','App\Http\Controllers\UserController@assign_role')
        ->name('user.assign_role');
    Route::post('user/{user}/role_assignment','App\Http\Controllers\UserController@role_assignment')
        ->name('user.role_assignment');

    Route::resource('permission','App\Http\Controllers\PermissionController');
    Route::get('user/{user}/assign_permission','App\Http\Controllers\UserController@assign_permission')
        ->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment','App\Http\Controllers\UserController@permission_assignment')
        ->name('user.permission_assignment');

    Route::resource('user','App\Http\Controllers\UserController');
});

