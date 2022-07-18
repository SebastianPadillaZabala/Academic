@extends('layouts.welcome-ecommerce-template')

@section('content')
<div class="container bg-white max-w-full mx-auto py-28 px-20 pb-0 grid grid-cols-3 gap-4">
    <div class="p-8 bg-gray-900 col-span-1 rounded-lg">
        <ul class="flex flex-col">
            <li class="font-medium text-2XL text-white uppercase mb-4">
                LISTA DE REPRODUCCION
            </li>
            @foreach($clase_curso as $c)
            <a href="{{route('claseR',[$c->id_clase])}}">
                <li class="flex items-center text-white mt-2 hover:text-blue-600">
                    {{$c->Nro_clase}}.- {{$c->Titulo}}
                </li>
            </a>
            @endforeach
            <li class="font-medium text-2XL text-white uppercase mt-10">
                EVALUACIONES
            </li>
            @foreach($examen_curso as $ec)
            <a href="{{route('evaluacion',[$ec->id_examen])}}">
                <li class="flex items-center text-white mt-2 hover:text-blue-600">
                    - {{$ec->titulo}}
                </li>
            </a>
            @endforeach
        </ul>
    </div>
    <div class="text-gray-700 col-span-2">
        <iframe class="rounded-lg" width="850" height="450" src="{{$clase->Url}}?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
        <h2 class="text-4xl font-semibold pt-5 text-indigo-700">{{$clase->Titulo}}</h2>
        <hr />
        <h3 class="text-2xl pt-2 font-semibold text-indigo-700">Descripcion</h3>
        <p class="text-lg text-gray-900">{{$clase->descripcion}}</p>
    </div>
</div>

@endsection

