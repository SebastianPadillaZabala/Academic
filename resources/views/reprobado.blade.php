@extends('layouts.ecommerce-template')
@section('content')
<!-- component -->
<div class="bg-indigo-500 h-screen w-screen">
    <div class="flex items-center h-full w-full justify-center">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-3/2 bg-white ">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">OH NO, HAS FALLADO</h1>
                    <div class="w-full mt-8 mb-4 items-center">                                  
                        <p style="text-align: center" class="font-semibold text-gray-400">¡Estudia más!</p>                
                        <p style="text-align: center" class="font-semibold text-gray-400">Has fallado la evaluación</p>                
                        <p style="text-align: center" class="font-semibold text-gray-400">Te recomendamos ver con atencion las clases</p>                
                        <p style="text-align: center" class="font-semibold text-gray-400">No te desanimes, intentalo en otra ocasión.</p>                
                        <div style="align-content: center" class="flex flex-col mt-4 items-center">
                            <a class="flex items-center mt-8" href="{{route('frontoffice.alumno.index')}}">
                            <button style="width:100px" class="bg-indigo-500 hover:bg-indigo-700 text-white items-center text-sm font-semibold py-2 px-4 rounded">
                                Salir
                            </button>
                        </a>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://www.frasesmuybonitas.net/wp-content/uploads/2020/03/mensajes-bonitos-de-graduacion.jpg'); background-size: cover; background-position: center center;"></div>
        </div>
    </div>
</div>
@endsection