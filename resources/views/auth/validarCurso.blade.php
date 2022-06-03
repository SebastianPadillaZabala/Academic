@extends('layouts.ecommerce-template')

@section('content')
<!-- component -->
<div class="bg-indigo-500 h-screen w-screen">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">Validar Curso</h1>
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('cursoValidate', [$id]) }}">
                           @csrf
                           <select name="select">
                                <option value="">Seleccione un Estado</option>
                                    <option value="Aceptado">Aceptado</option>
                                    <option value="Rechazado">Rechazado</option>
                                    <option value="Espera">Espera</option>
                              </select>
                            <div class="flex flex-col mt-8">
                                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                  Resgistrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://www.cetys.mx/noticias/wp-content/uploads/2020/08/1-7.jpg'); background-size: cover; background-position: center center;"></div>
        </div>
    </div>
</div>
@endsection