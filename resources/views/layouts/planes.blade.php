    @extends('layouts.welcome-ecommerce-template')
    @section('content')
<div class="container max-w-full mx-auto py-24 px-6">
		<h1
		class="text-center text-4xl text-indigo-600 font-extrabold leading-snug tracking-wider"
		>
		Planes
	</h1>
	<p class="text-center text-lg text-gray-700 mt-2 px-6">
    Suscríbete y potencia tu futuro profesional con nosotros!
	</p>
	<div
	class="h-1 mx-auto bg-indigo-400 w-24 opacity-75 mt-4 rounded"
	></div>
<div class="bg-white dark:bg-gray-800">
        <div class="container px-2 py-20 pt-20 mx-auto">
            <div class="flex flex-col items-center justify-center space-y-8 lg:-mx-4 lg:flex-row lg:items-stretch lg:space-y-0">
			@foreach($planes as $p)   
			<div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex-shrink-0">
                        <h2 class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-indigo-500 uppercase rounded-lg bg-gray-50 dark:bg-gray-700">
                            {{$p->nombre_Plan}}
                        </h2>
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="pt-2 text-4xl font-bold text-gray-800 uppercase dark:text-gray-100">
                            {{$p->Precio}} $
                        </span>
                    </div>
                    <ul class="flex-1 space-y-4">
                        <li class="text-gray-500 dark:text-gray-400">
                            {{$p->descripcion}}
                        </li>
                    </ul>
                    <ul class="flex-1 space-y-4">
                        <li class="text-gray-500 dark:text-gray-400">
                           Duracion {{$p->duracion}}
                        </li>
                    </ul>

                    <button
                        class="inline-flex items-center justify-center px-4 py-2 font-medium text-white uppercase transition-colors bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:outline-none"
                    >
                      Seleccionar
                    </button>
                </div>
		@endforeach
		</div>
		</div>
    </div>
@endsection