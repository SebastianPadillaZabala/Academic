@extends('layouts.ecommerce-template')

@section('content')
<!-- component -->
<div class="bg-indigo-500 h-screen w-screen">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">Editar Categoria</h1>
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('Ecat', [$cat->id_cat]) }}">
                           @csrf
                           <div class="flex flex-col mt-4">
                                <input id="nombre" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="nombre" value="{{$cat->nombreCategoria}}" placeholder="Nombre" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="descripcion" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="descripcion" value="{{$cat->descripcion}}" placeholder="Descripcion" required autofocus>
                            </div>
                            <div class="flex flex-col mt-8">
                                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                    Registrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://conceptodefinicion.de/wp-content/uploads/2016/04/Categor%C3%ADa2.jpg'); background-size: cover; background-position: center center;"></div>
        </div>
    </div>
</div>
@endsection