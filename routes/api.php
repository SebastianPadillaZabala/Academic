<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('register',[App\Http\Controllers\API\RegisterController::class, 'register']);
Route::post('login',[App\Http\Controllers\API\RegisterController::class, 'login']);


Route::middleware('auth:api')
    ->post('logout',[App\Http\Controllers\API\RegisterController::class, 'logout']);
Route::middleware('auth:api')
    ->get('user', [App\Http\Controllers\API\RegisterController::class, 'user']);

Route::middleware('auth:api')
    ->put('user', [App\Http\Controllers\API\RegisterController::class, 'userUpdate']);

//obtener todos los Cursos

Route::get('cursos',[App\Http\Controllers\API\Cursos_Controller::class,'index']);

//Clases_x_Curso
Route::middleware('auth:api')
->get('clases/{id_curso}',[App\Http\Controllers\API\Clases_Controller::class,'get_clases']);

//crear mis cursos
Route::middleware('auth:api')
->put('crear_mis_cursos/{id_curso}',[App\Http\Controllers\API\Miscursos_Controller::class,'mis_cursos']);
//ver mis cursos
Route::middleware('auth:api')
->get('mis_cursos',[App\Http\Controllers\API\Miscursos_Controller::class,'get_mis_cursos']);
//ver planes
Route::get('planes',[App\Http\Controllers\API\Suscripcion_Controller::class,'planes']);
// ingresar tarjeta
Route::middleware('auth:api')
->put('suscripcion/{id_plan}',[App\Http\Controllers\API\Suscripcion_Controller::class,'suscripcion']);
//insertar progreso
Route::middleware('auth:api')
->put('progreso/{id_curso}/{index}',[App\Http\Controllers\API\Miscursos_Controller::class,'progresoCurso']);

//obtener todos los Categorias
Route::get('categorias',[App\Http\Controllers\API\Cursos_Controller::class,'categorias']);

//EXAMEN
Route::middleware('auth:api')//obtener datos del examen de cierto curso
->get('getExamen/{id_curso}', [App\Http\Controllers\API\ExamenController::class, 'getExamen']);

Route::get('getExamen2/{id_curso}', [App\Http\Controllers\API\ExamenController::class, 'getExamen']);

Route::middleware('auth:api')//obtener las preguntas de cierto examen
->get('getPreguntas/{id_examen}', [App\Http\Controllers\API\ExamenController::class, 'getPreguntas']);

Route::get('getPreguntas2/{id_examen}', [App\Http\Controllers\API\ExamenController::class, 'getPreguntas']);

Route::middleware('auth:api')//obtener las preguntas de cierto examen
->get('getIncisos/{id_pregunta}', [App\Http\Controllers\API\ExamenController::class, 'getIncisos']);

Route::get('getIncisos2/{id_pregunta}', [App\Http\Controllers\API\ExamenController::class, 'getIncisos']);

Route::middleware('auth:api')//obtener datos de alumno y suscripcion
->get('getAlumno/{id_user}', [App\Http\Controllers\API\RegisterController::class, 'getAlumno']);

Route::get('getAlumno2/{id_user}', [App\Http\Controllers\API\RegisterController::class, 'getAlumno']);

Route::middleware('auth:api')//obtener datos de alumno y suscripcion
->get('getUnCurso/{id_user}', [App\Http\Controllers\API\ExamenController::class, 'getUnCurso']);

Route::get('getUnCurso2/{id_user}', [App\Http\Controllers\API\ExamenController::class, 'getUnCurso']);
