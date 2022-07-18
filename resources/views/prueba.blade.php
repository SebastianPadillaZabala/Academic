@extends('layouts.welcome-ecommerce-template')

@section('content')
<div class="container bg-white text-center max-w-full mx-auto py-24 px-6 pb-0">
    <h1 class="text-3xl text-center text-indigo-600 font-extrabold leading-snug tracking-wider mb-2 uppercase">Ultimos Cursos</h1>
    <h2 class="text-xl text-gray-600">Formate online como profesional</h2>
    <h3 class="text-xl text-gray-600">70% de los graduados duplican sus ingresos</h3>
    <div
	class="h-1 mx-auto bg-indigo-400 w-24 opacity-75 mt-4 rounded"
	></div>
</div>
@livewire('lista-curso', ['cat' => $cat])
@endsection
