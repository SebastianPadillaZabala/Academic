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
<div class="ml-auto">
    <div class="sticky z-10 top-0 h-16 border-b lg:py-0">
        <div class="px-2 flex items-center justify-between space-x-4 2xl:container">
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Categorias</h5>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    <div class="mt-2 px-2 grid gap-3 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2">
    @foreach($categorias as $cat)
    <div class="max-w-sm h-auto mx-auto my-8 rounded overflow-hidden shadow-lg transform transition-all hover:-translate-y-4"> 
    <img class="object-cover h-48 w-96" src="https://edustud.nic.in/edu/images/Academic1.jpg" alt="Volcano">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2 hover:text-indigo-500 hover:cursor-pointer">{{$cat->nombreCategoria}}</div>
           <p class="text-gray-700 text-base">
           {{$cat->descripcion}}
          </p>
       </div>
    </div>
    @endforeach
   </div>
</div>
</main>
@endsection('content')
@section('foot')
@endsection
