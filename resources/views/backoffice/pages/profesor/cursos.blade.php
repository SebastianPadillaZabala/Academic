@extends('backoffice.layouts.admin')
@section('title','Panel de administracion')
@section('head')
@endsection
@section('header')
<h5 hidden class="text-2xl text-white font-medium lg:block">Bienvenido Profesor</h5>
@endsection
@section('breadcrumbs')

@endsection

@section('content')
    @section('name')
    <img src="https://cdn-icons-png.flaticon.com/512/2643/2643361.png" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
            <h5 class="hidden mt-4 text-xl font-semibold text-white lg:block">
                {{auth()->user()->name}}
            </h5>
        <span class="hidden text-white lg:block">{{auth()->user()->tipo}}</span>
    @endsection
    <main class="h-screen w-full">
<div class="ml-auto lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <div class="sticky z-10 top-0 h-16 border-b lg:py-0">
        <div class="px-2 flex items-center justify-between space-x-4 2xl:container">
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Mis Cursos</h5>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
               <!--/search bar -->
               <div hidden class="md:block">                    
                    <a href="{{Route('regCurso')}}">
                        <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Añadir curso</button>
                    </a>                                
                </div>  
        </div>
        <div class="px-10 py-8 grid gap-3 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-4">
          @foreach($cursos as $c)
            <div class="max-w-sm bg-white px-6 pt-4 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
              <h3 class="mb-3 text-xl font-bold text-indigo-600">{{$c->nombreCurso}}</h3>
              <div class="relative">
                <img class="w-full rounded-xl" src="{{$c->image}}" alt="Colors" />
                <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">FREE</p>
              </div>
              <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">"{{$c->descripcion}}"</h1>
              <div class="my-4">
                <div class="flex space-x-1 items-center">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </span>
                  <p>1:34:23 Minutes</p>
                </div>   
                <a href="{{route('regClase',[$c->id_curso])}}">                             
                <button class="mt-4 text-l w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Añadir Clase</button>
                <a/>
                <a href="{{route('examenes',[$c->id_curso])}}">                             
                  <button class="mt-4 text-l w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Añadir Examen</button>
                  <a/>
                <a href="{{route('clase',[$c->id_curso])}}">   
                <button class="mt-4 text-l w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Revisar</button>
                <a/>
              </div>
            </div>
            @endforeach
            </div>
</div>
</main>
@endsection('content')
@section('foot')
@endsection
