@extends('layouts.welcome-ecommerce-template')
@section('content')  
<main class="container max-w-full mx-auto py-20 px-6">
<h1 class="mt-10 px-11 text-gray-900 font-bold text-3xl" >Categorias</h1>
    <div class="mt-5 px-10 grid gap-3 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2">
    @foreach($categorias as $cat)
    <div class="max-w-sm h-auto mx-auto my-8 rounded overflow-hidden shadow-lg transform transition-all hover:-translate-y-4">
    <a href="{{route('prueba', ['cat'=> $cat->id_cat])}}"> 
    <img class="object-cover h-48 w-96" src="https://cdn.paperpile.com/guides/img/academic-search-engines-illust-400x400.png" alt="Volcano">
      <div class="px-6 py-4 bg-gray-100">
        <div class="font-bold text-xl mb-2 hover:text-indigo-500 hover:cursor-pointer">{{$cat->nombreCategoria}}</div>
           <p class="text-gray-700 text-base">
           {{$cat->descripcion}}
          </p>
       </div>
       </a> 
    </div>
    @endforeach
   </div>
</div>
</main>
@endsection