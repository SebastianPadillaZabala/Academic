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
    <iframe width="850" height="450" src="https://www.youtube.com/embed/OiXS2JBVbf0?autoplay=1&mute=1" title="YouTube video player" frameborder="0" 
     allowfullscreen></iframe>
     <h2 class="text-4xl">Iniciamos!</h2>
     <p>descripcion</p>
 </div>
</div>
@endsection