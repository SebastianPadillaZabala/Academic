@extends('frontoffice.layouts.demo')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.15.1/dist/full.css" rel="stylesheet" type="text/css" />
@endsection
@section('profile_data')

    <div class="image overflow-hidden">
        <img class="h-auto w-full mx-auto"
             src="https://previews.123rf.com/images/yupiramos/yupiramos1711/yupiramos171108094/89817780-dise%C3%B1o-de-ilustraci%C3%B3n-de-vector-de-profesor-de-avatar-masculino-maestro.jpg"
             alt="">
    </div>
    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$profesor->name}}</h1>
    <h3 class="text-gray-600 font-lg text-semibold leading-6">Bienvenido: {{auth()->user()->tipo}} </h3>
    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Descripcion breve del perfil
    </p>
@endsection
@section('navbar')
    <li class="flex items-center py-3">
        <span><a href="{{route('frontoffice.profesor.index')}}">Ver tus datos</a></span>
    </li>
    <li class="flex items-center py-3">
        <span><a href="{{route('frontoffice.profesor.edit_password')}}">Cambiar contraseña</a></span>
    </li>
    <li class="flex items-center py-3">
        <span><a href="{{route('frontoffice.profesor.edit',auth()->user()->id)}}">Editar datos del perfil</a></span>
    </li>
@endsection
@section('suscripcion')
    <li>
        <div class="text-indigo-600">Fecha de Registro </div>
        <div class="text-gray-500 text-xs">{{$profesor->created_at}}</div>
    </li>
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
                        <div class="px-4 py-2">{{$profesor->name}}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Apellidos:</div>
                        <div class="px-4 py-2">{{$profesor->apellido}}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Correo.</div>
                        <div class="px-4 py-2">
                            <a class="text-blue-800 font-semibold" href="mailto:jane@example.com">{{$profesor->email}}</a>
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
                        <span class="tracking-wide">Tus cursos</span>
                </div>

        </div>
        <!-- End of profile_alumno tab -->
    </div>
@endsection
