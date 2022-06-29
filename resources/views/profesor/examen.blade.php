@extends('layouts.ecommerce-template')

@section('content')
<!-- component -->
<div class="bg-indigo-500 h-screen w-screen">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">Crear Examen</h1>
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('examen.registrar') }}">
                           @csrf
                           <div class="flex flex-col mt-4">
                                <input id="Titulo" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="titulo" value="" placeholder="Titulo" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <textarea id="descripcion" rows="5" name="descripcion" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripcion del examen..."></textarea>                            
                            </div>                    
                            <div class="flex flex-col mt-8">
                                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                    Siguiente
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://examio.com/images/2017/02/07/test_table_cartoon.png'); background-size: cover; background-position: center center;"></div>
        </div>
    </div>
</div>
@endsection