@extends('frontoffice.layouts.demo')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.15.1/dist/full.css" rel="stylesheet" type="text/css" />
@endsection
@section('profile_data')

    <div class="image overflow-hidden">
        <img class="h-auto w-full mx-auto"
             src="https://previews.123rf.com/images/hvostik/hvostik1607/hvostik160700078/61014335-estudiante-graduado-avatar-estudiante-icono-del-estudiante-estilo-de-dise%C3%B1o-plano-graduaci%C3%B3n-de-educ.jpg"
             alt="">
    </div>
    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$alumno->name}}</h1>
    <h3 class="text-gray-600 font-lg text-semibold leading-6">Bienvenido: {{auth()->user()->tipo}} </h3>
    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Estudiante apasionado por las nuevas tecnologias frontend.
    </p>
@endsection
@section('navbar')
        <li class="flex items-center py-3">
            <span><a href="{{route('frontoffice.alumno.index')}}">Ver tus datos</a></span>
        </li>
        <li class="flex items-center py-3">
            <span><a href="{{route('frontoffice.alumno.edit_password')}}">Cambiar contraseña</a></span>
        </li>
        <li class="flex items-center py-3">
            <span><a href="{{route('frontoffice.alumno.edit',auth()->user()->id)}}">Editar datos del perfil</a></span>
        </li>
@endsection
@section('suscripcion')
@if($alumno->x == true)
    <li>
        <div class="text-indigo-600">Fecha de inicio suscripcion</div>
        <div class="text-gray-500 text-xs">{{$alumno->fecha_inicio}}</div>
    </li>
    <li>
        <div class="text-indigo-600">Fecha fin suscripcion</div>
        <div class="text-gray-500 text-xs">{{$alumno->fecha_final}}</div>
    </li>
    @endif
@endsection
@section('content')
    <div
        class="w-full md:w-9/12 mx-2 h-64">
        <!-- Profile tab -->
        <!-- About Section -->
        <div class="bg-white p-3 shadow-sm rounded-sm">
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span class="text-indigo-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                <span class="tracking-wide">Acerca de:</span>
            </div>
            <div class="text-gray-700">
                <div class="grid md:grid-cols-2 text-sm">
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Nombres:</div>
                        <div class="px-4 py-2">{{$alumno->name}}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Apellidos:</div>
                        <div class="px-4 py-2">{{$alumno->apellido}}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Correo:</div>
                        <div class="px-4 py-2">
                            <a class="text-blue-800 font-semibold" href="mailto:jane@example.com">{{$alumno->email}}</a>
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Celular:</div>
                        <div class="px-4 py-2">
                           {{$alumno->celular}}
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Cantidad de Cursos:</div>
                        <div class="px-4 py-2">
                           {{$alumno->cantidad_cursos}}
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End of about section -->
        <div class="my-4"></div>
        <!-- Experience and education -->
        <div class="bg-white shadow-sm rounded-sm  flex-col space-y-2">
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                        <span class="tracking-wide">Avance de tus cursos</span>
                </div>
            <div class="rounded-lg sahdow-lg flex justify-start flex-wrap">
                @foreach($cursos as $curso)
                   <div class="w-50 h-auto m-2 p-5 ">
                        <div
                        class="w-full bg-gray-900 rounded-lg sahdow-lg p-10 flex flex-col justify-center items-center"
                    >
                        <div class="mb-8">
                            <div class="radial-progress bg-accent text-accent-content border-4 border-accent" style="--size:7rem; --value: {{$curso->progreso}}">
                                {{$curso->progreso}}%
                            </div>
                        </div>
                        <div class="text-center  flex-col  w-33">
                            <p class="text-xl text-white font-bold mb-2">{{$curso->nombreCurso}}</p>
                            <p class="text-base text-gray-400 font-normal">{{$curso->descripcion}}</p>
                            <p class="text-base text-gray-400 font-normal">__________________</p>
                            <button class=" w-3/12 h-41 mt-3 px-3 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-indigo-600 md:mx-2 md:w-auto"><a href="{{route('clase',[$curso->id_curso])}}">Continuar</a></button>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End of profile_alumno tab -->
    </div>
@endsection
