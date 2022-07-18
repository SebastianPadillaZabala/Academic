@extends('layouts.welcome-ecommerce-template')
@section('content')
    <div class="h-screen flex flex-col gap-4 items-center justify-center bg-white">
        <h2>Resultados de la busqueda</h2>
        <!-- Card 1 -->
        @foreach($cursos as $curso)
            <a href="{{route('clase',[$curso->id_curso])}}" class="w-[30rem] border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">
            <!-- Badge -->
            <p class="bg-sky-500 w-fit px-4 py-1 text-sm font-bold text-white rounded-tl-lg rounded-br-xl"> FEATURED </p>
            <div class="grid grid-cols-6 p-5 gap-y-2">
                <!-- Profile Picture -->
                <div>
                    <img src="https://picsum.photos/seed/2/200/200" class="max-w-16 max-h-16 rounded-full" />
                </div>

                <!-- Description -->
                <div class="col-span-5 md:col-span-4 ml-4">
                    <p class="text-sky-500 font-bold text-xs"> {{$curso->descripcion}} </p>
                    <p class="text-gray-600 font-bold"> {{$curso->nombreCurso}} </p>

                    <p class="text-gray-400">Fecha lazamiento : {{$curso->fecha}} </p>
                    <p class="text-gray-400"> Nivel Intermedio </p>

                </div>
            </div>
        </a>
        @endforeach
    </div>
@endsection
