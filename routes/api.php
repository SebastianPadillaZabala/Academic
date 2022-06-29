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


//Cursos

Route::get('cursos',[App\Http\Controllers\API\Cursos_Controller::class,'index']);

//Clases_x_Curso

Route::get('clases/{id_curso}/{id_user}',[App\Http\Controllers\API\Clases_Controller::class,'get_clases']);

//1 sola clase
Route::get('clases/1clase/{id}',[App\Http\Controllers\API\Clases_Controller::class,'get_x_clase']);

//mis cursos
Route::post('crear_mis_cursos',[App\Http\Controllers\API\Miscursos_Controller::class,'mis_cursos']);
//ver mis cursos
Route::get('mis_cursos/{id_user}',[App\Http\Controllers\API\Miscursos_Controller::class,'get_mis_cursos']);
