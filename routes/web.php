<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome-ecommerce');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/log', function () {
    return view('auth.loginE');
})->name('log');

Route::get('/reg', function () {
    return view('auth.registerE');
})->name('reg');

Route::get('/video', function () {
    return view('video.reproductor');
})->name('video');

Route::get('/planes', function () {
    return view('layouts.planes');
})->name('planes');

Route::get('/prueba', function () {
    return view('prueba');
})->name('prueba');

Route::get('/categorias', function () {
    return view('categorias');
})->name('categorias');

Route::get('/equipo', function () {
    return view('grupo');
})->name('grupo');

