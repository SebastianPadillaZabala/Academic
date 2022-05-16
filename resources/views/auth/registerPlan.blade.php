@extends('layouts.ecommerce-template')

@section('content')
<!-- component -->
<div class="bg-indigo-500 h-screen w-screen">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">Registrar Plan</h1>
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('Rplan') }}">
                           @csrf
                           <div class="flex flex-col mt-4">
                                <input id="name" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="name" value="" placeholder="Nombre" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="descripcion" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="descripcion" value="" placeholder="Descripcion" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="Precio" type="number" class="flex-grow h-8 px-2 border rounded border-grey-400" name="Precio" value="" placeholder="Precio" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="duracion" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="duracion" value="" placeholder="N° Dias">
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
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://integralplm.com/blog/wp-content/uploads/2018/02/5-ventajas-que-haran-que-quieras-pasarte-al-modelo-de-suscripcion.jpg'); background-size: cover; background-position: center center;"></div>
        </div>
    </div>
</div>
@endsection