@extends('layouts.ecommerce-template')

@section('content')
<!-- component -->
<div class="bg-indigo-500 h-screen w-screen">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 600px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">Registrate Colega</h1>
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('profesor.register') }}"enctype="multipart/form-data">
                           @csrf
                           <div class="flex flex-col mt-4">
                                <input id="name" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="name" value="" placeholder="Nombre" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="apellido" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="apellido" value="" placeholder="Apellido" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="celular" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="celular" value="" placeholder="Celular" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="fecha_nac" type="date" class="flex-grow h-8 px-2 border rounded border-grey-400" name="fecha_nac" value="" placeholder="Fecha Nacimiento" required autofocus>
                            </div>
                            <div class="flex flex-col mt-2">
                                <p class="font-semibold text-gray-400">Curriculum Vitae</p>
                                <input id="descripcion" type="file" class="flex-grow h-8 px-2 border rounded border-grey-400" name="cv" value="" placeholder="CV" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="email" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="email" value="" placeholder="Email">
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="password" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password" required placeholder="Password">
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="password_confirmation" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password_confirmation" required placeholder="Confirm-Password">
                            </div>
                            <div class="flex flex-col mt-8">
                                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                    Registrar ahora
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://images.unsplash.com/photo-1515965885361-f1e0095517ea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3300&q=80'); background-size: cover; background-position: center center;"></div>
        </div>
    </div>
</div>
@endsection