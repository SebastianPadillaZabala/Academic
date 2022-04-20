@extends('layouts.welcome-ecommerce-template')

@section('content')
<!-- component -->
<section class="bg-white max-w-full mx-auto sm:px-6 lg:px-4 mb-12 py-24 px-6 pb-0">
    
    <article>
        <h2 class="text-2xl font-extrabold text-gray-900">Categorias</h2>
        <section class="mt-6 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-x-6 gap-y-8">
            <article class="relative w-full h-64 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg hover:shadow-2xl  transition duration-300 ease-in-out"
                style="background-image: url('https://images.unsplash.com/photo-1623479322729-28b25c16b011?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1740&q=80');">
                <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:opacity-75 transition duration-300 ease-in-out"></div>
                <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex justify-center items-center">
                    <h3 class="text-center">
                        <a class="text-white text-2xl font-bold text-center" href="{{route('prueba')}}">
                            <span class="absolute inset-0"></span>
                            Top 10 highest paid programming languages of 2021
                        </a>
                    </h3>
                </div>
            </article>
        </section>
    </article>
</section>
@endsection