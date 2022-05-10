@extends('layouts.ecommerce-template')
@section('content')
<!-- component -->
<div class="bg-indigo-500 h-screen w-screen">
    <div class="flex items-center h-full w-full justify-center">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-3/2 bg-white ">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">Registra el Curso</h1>
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('curso.register') }}">
                           @csrf
                            <div class="flex flex-col mt-4">
                                <input id="name" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="name" value="" placeholder="Nombre del Curso" required autofocus>
                            </div>                         
                            <div class="flex flex-col mt-2">
                                <p class="font-semibold text-gray-400">Imagen del Curso</p>
                                <input id="image" type="file" class="flex-grow h-8 px-2 border rounded border-grey-400" name="image" value="" placeholder="Imagen" required autofocus>
                            </div>
                            <div class="flex flex-col mt-4">
                                <textarea id="descripcion" rows="5" name="descripcion" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripcion del curso..."></textarea>                            
                            </div> 
                        <div class="input-group">
                             <label for="email" class="block mb-1 text-gray-600 font-semibold">Categoria</label>
                            <select name="select">
                                <option value="">Selecciona una Categoria</option>
                                @foreach ($categoria as $c)
                                    <option value="<?= $c->id_cat ?>"><?= $c->name?></option>
                                @endforeach
                              </select>
                           <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-clinic-medical"></span>
                            </div>
                          </div>
                     </div>
                            <div class="flex flex-col mt-8">
                                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                    Registrar Curso
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://agendor-blog-uploads.s3.sa-east-1.amazonaws.com/2016/01/19232051/cursos-online-vender-mais.jpg'); background-size: cover; background-position: center center;"></div>
        </div>
    </div>
</div>
@endsection