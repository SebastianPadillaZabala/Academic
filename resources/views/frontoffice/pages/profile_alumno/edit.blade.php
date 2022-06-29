@extends('frontoffice.layouts.demo')
@section('profile_data')
    <div class="image overflow-hidden">
        <img class="h-auto w-full mx-auto"
             src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
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
                            <h1 class="text-4xl text-center font-thin">Editar datos del estudiante</h1>
                            <div class="w-full mt-4">
                                <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('frontoffice.alumno.update',auth()->user()->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex flex-col mt-4">
                                        <input id="name" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="name" value="{{auth()->user()->name}}" placeholder="Nombre" required autofocus>
                                    </div>
                                    <div class="flex flex-col mt-4">
                                        <input id="apellido" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="apellido" value="{{auth()->user()->apellido}}" placeholder="Apellido" required autofocus>
                                    </div>
                                    <div class="flex flex-col mt-4">
                                        <input id="celular" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="celular" value="{{auth()->user()->celular}}" placeholder="Celular" required autofocus>
                                    </div>
                                    <div class="flex flex-col mt-4">
                                        <input id="email" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="email" value="{{auth()->user()->email}}" placeholder="Email">
                                    </div>
                                    <div class="flex flex-col mt-4 ">
                                        <a href="{{route('frontoffice.alumno.edit_password')}}" style="color: #1D87D8"> ¿Cambio de  contraseña?</a>
                                    </div>
                                    <div class="flex flex-col mt-8">
                                        <button type="submit" class="bg-indigo-200 hover:bg-indigo-500 text-white text-sm font-semibold py-2 px-4 rounded">
                                            Actualizar datos
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- End of about section -->
        <div class="my-4"></div>
        <!-- Experience and education -->

        <!-- End of profile_alumno tab -->
    </div>
@endsection
