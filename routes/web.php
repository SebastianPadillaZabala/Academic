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
use App\Http\Controllers\examenesController;
use App\Http\Controllers\preguntasController;
use App\Http\Livewire\ListaCurso;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuscripcionController;
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
Route::get('/EditCategorias/{id}',[CategoriaController::class, 'edit'])
->name('Editcategorias');
Route::post('/ECat/update/{id}',[CategoriaController::class, 'update'])
->name('Ecat');
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


Route::get('/modal', function () {
    return view('modal');
})->name('#');

Route::get('/Categorias',[CategoriaController::class, 'categorias'])
->name('categorias');


Route::get('/', function () {
    return view('welcome-ecommerce');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


/////PLANES
Route::get('/planes',[PlanesController::class, 'index'])
->name('planes');
Route::get('/Tplanes',[PlanesController::class, 'tabla'])
->name('Tplanes');
Route::get('/Addplan',[PlanesController::class, 'create'])
->name('Addplan');
Route::post('/Rplan',[PlanesController::class, 'store'])
->name('Rplan');

///Reproduccion de clases y clases
Route::get('/prueba/{cat}', [CursosController::class, 'livewire'])
->name('prueba');

Route::get('/clase/{id}',[ClasesController::class, 'redirect'])
->name('clase');

Route::get('/video', function () {
    return view('video.reproductor');
})->name('video');

Route::get('/curso/clase/{id}',[ClasesController::class, 'redirectClase'])
->name('claseR');

Route::get('/video', function () {
    return view('video.reproductor');
})->name('video');

///EQUIPO-SOBRE NOSOTROS
Route::get('/equipo', function () {
    return view('grupo');
})->name('grupo');

///Pagos-Suscripcion
Route::get('/check-out/{id}', [PlanesController::class, 'pagos'])
->name('check-out',);
Route::post('/checkout/{id}',[SuscripcionController::class, 'store'])
->name('checkout-input');

///Otros
Route::get('/redirect',[LoginController::class, 'index'])
->name('re');

///Bitacora
Route::group(['middleware' => ['auth'],'as' => 'bitacora.'],function () {
    Route::get('/private00', function () {
        return view('backoffice.pages.admin.passwordbitacora');
    })->name('logBit');

    Route::post('/private0101', [LoginController::class, 'loginBitacora'])
        ->name('logBitacora');
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('bitacora');
});
//Reportes
Route::get('/reportes',function () {
    return view('backoffice.layouts.reporte');
})->name('reporte');
Route::post('/reportes',[ReportesController::class, 'validar'])->name('reporte.validar');
Route::get('/reportePDF',[ReportesController::class, 'index'])->name('reporte.index');

//ROLES
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
//todo frontoffice
    Route::group(['middleware'=>['auth'],'as'=>'frontoffice.'],function (){
        Route::resource('alumno','App\Http\Controllers\AlumnosController');
        Route::get('profile_alumno/edit_password','App\Http\Controllers\AlumnosController@edit_password')->name('alumno.edit_password');
        Route::put('profile_alumno/change_password','App\Http\Controllers\AlumnosController@change_password')->name('alumno.change_password');
        Route::post('alumno/inscribir_curso','App\Http\Controllers\AlumnosController@inscribirCurso')->name('alumno.inscribir_curso');
        Route::get('avanzar','App\Http\Controllers\AlumnosController@avanzar')->name('alumnos.avanzar');

        Route::resource('profesor','App\Http\Controllers\ProfesoresController');
        Route::get('profile_profesor/edit_password','App\Http\Controllers\ProfesoresController@edit_password')->name('profesor.edit_password');
        Route::put('profile_profesor/change_password','App\Http\Controllers\ProfesoresController@change_password')->name('profesor.change_password');
    });

    Route::get('/examenes',[examenesController::class, 'index'])
    ->name('examen.crear');
    Route::post('/examenes',[examenesController::class, 'create'])
    ->name('examen.registrar');
    Route::get('/preguntas',[preguntasController::class, 'index'])
    ->name('preguntas.index');
    Route::post('/preguntas',[preguntasController::class, 'create'])
    ->name('pregunta.registrar');
