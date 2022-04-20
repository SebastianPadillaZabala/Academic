@extends('layouts.welcome-ecommerce-template')

@section('content')
<div class="container bg-gray-50 text-center max-w-full mx-auto py-24 px-6 pb-0">
    <h1 class="text-3xl text-gray-700 mb-2 uppercase">Ultimos Cursos</h1>
    <h2 class="text-xl text-gray-600">Formate online como profesional</h2>
    <h3 class="text-xl text-gray-600">70% de los graduados duplican sus ingresos</h3>
</div>
<livewire:lista-curso>

@endsection
