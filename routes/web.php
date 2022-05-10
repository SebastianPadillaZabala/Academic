<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursosController;
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
    return view('admin.dashboard');
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

////TODO DE PROFESOR/////////////////
Route::get('/regProfe', function () {
    return view('auth.registerProf');
})->name('reg');
Route::post('/registerProfe',[ProfesoresController::class, 'create'])
->name('profesor.register');
Route::get('/profesor', function () {
    return view('profesor.dashboard');
})->name('profesor.dashboard');
//REGISTRAR CURSO
Route::get('/regcursp',[CursosController::class, 'index'])
->name('regCurso');
Route::post('/registerCurso',[CursosController::class, 'create'])
->name('curso.register');
Route::get('/CursosP',[ProfesoresController::class, 'obtener_Cursos'])
->name('profesor.cursos');

////TODO DE ALUMNO
Route::get('/regAlum', function () {
    return view('auth.registerAlum');
})->name('regA');
Route::post('/registerAlum',[AlumnosController::class, 'create'])
->name('alumno.register');
Route::get('/alumno', function () {
    return view('alumno.dashboard');
})->name('alumno.dashboard');




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

Route::get('/planes', function () {
    return view('layouts.planes');
})->name('planes');

Route::get('/prueba', function () {
    return view('prueba');
})->name('prueba');

Route::get('/equipo', function () {
    return view('grupo');
})->name('grupo');

