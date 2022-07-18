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
<img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
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
            <img class="w-full rounded-xl" src="/storage/{{$c->nombreCurso}}/{{$c->image}}" alt="Colors" />
          </div>
          <div class="my-4">
            <div class="flex space-x-1 items-center">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </span>
              <p>Estado: {{$c->estado}}</p>
            </div>
            <div class="flex space-x-1 items-center">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </span>
              <p>N° Clases: {{$c->cantidad_clases}}</p>
            </div>
            <div class="flex space-x-1 items-center">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
                </svg>
              </span>
              <p>N° Alumnos: {{$c->cant_sus}}</p>
            </div>
            <a href="{{route('regClase',[$c->id_curso])}}">
              <button class="mt-4 text-l w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Añadir Clase</button>
            </a>
            <a href="{{route('examenes',[$c->id_curso])}}">
              <button class="mt-4 text-l w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Añadir Examen</button>
            </a>
            <a href="{{route('clase',[$c->id_curso])}}">
              <button class="mt-4 text-l w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Revisar</button>
            </a>
            </div>
        </div>
            @endforeach
          </div>
        </div>
</main>
@endsection('content')
@section('foot')
@endsection