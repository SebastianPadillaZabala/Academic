@extends('frontoffice.layouts.demo')
@section('profile_data')
    <div class="image overflow-hidden">
        <img class="h-auto w-full mx-auto"
             src="https://previews.123rf.com/images/hvostik/hvostik1607/hvostik160700078/61014335-estudiante-graduado-avatar-estudiante-icono-del-estudiante-estilo-de-dise%C3%B1o-plano-graduaci%C3%B3n-de-educ.jpg""
             alt="">
    </div>
    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{auth()->user()->name}}</h1>
    <h3 class="text-gray-600 font-lg text-semibold leading-6">Bienvenido: {{auth()->user()->tipo}} </h3>
    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Descripcion breve del perfil
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
@section('content')
    <div class="w-full md:w-9/12 mx-2 h-64">
        <!-- Profile tab -->
        <!-- About Section -->

        <div class="flex rounded-lg shadow-lg w-full bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">Cambiar contraseña</h1>
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('frontoffice.alumno.change_password') }}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="flex flex-col mt-4">
                                <input id="old_password" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="old_password" placeholder="Contraseña actual">
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:teal">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="password" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password"  placeholder="Nueva Contraseña">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:teal">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="password_confirm" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password_confirmation" placeholder="Repita contraseña">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:teal">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="flex flex-col mt-8">
                                <button type="submit" class="bg-indigo-200 hover:bg-indigo-500 text-white text-sm font-semibold py-2 px-4 rounded">
                                    Cambiar contraseña
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
