@extends('layouts.welcome-ecommerce-template')

@section('content')
<div class="container bg-white max-w-full mx-auto py-24 px-2 pb-0 grid grid-cols-3 gap-4">
 <div class="p-8 bg-gray-200 col-span-1">
   <ul class="flex flex-col">
       <li class="font-medium text-sm text-gray-400 uppercase mb-4">
           Contenido
        </li>
        @foreach($clase_curso as $c)
        <a href="{{route('claseR',[$c->id_clase])}}">
        <li class="flex items-center text-gray-600 mt-2 hover:text-blue-600">
            {{$c->Titulo}}
        </li>
        </a>
        @endforeach
   </ul>
 </div>
 <div class="text-gray-700 col-span-2">
    <iframe width="850" height="450" src="{{$clase->Url}}?autoplay=1&mute=1" title="YouTube video player" frameborder="0"
     allowfullscreen></iframe>
     <div class="flex flex-row">
         <h2 class="p-2 text-4xl">{{$clase->Titulo}}</h2>
         <button class="w-3/12 h-41 mt-3 px-3 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-indigo-600 md:mx-2 md:w-auto justify-content: flex-end">
             <a href="{{route('frontoffice.alumnos.avanzar')}}">Siguiente</a> </button>
     </div>
     <p>{{$clase->descripcion}}</p>

 </div>
</div>
@endsection
