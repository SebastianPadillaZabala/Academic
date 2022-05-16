@extends('layouts.templateNavAdmin')
@section('content')
<div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
        <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Cursos</h5>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="flex space-x-4">
                <!--search bar -->
                <div hidden class="md:block">
                    <div class="relative flex items-center text-gray-400 focus-within:text-cyan-400">
                        <span class="absolute left-4 h-6 flex items-center pr-3 border-r border-gray-300">
                        <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 35.997 36.004">
                            <path id="Icon_awesome-search" data-name="search" d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z"></path>
                        </svg>
                        </span>
                        <input type="search" name="leadingIcon" id="leadingIcon" placeholder="Search here" class="w-full pl-14 pr-4 py-2.5 rounded-xl text-sm text-gray-600 outline-none border border-gray-300 focus:border-cyan-300 transition">                        
                    </div>
                </div>                
                <!--/search bar -->
                <button aria-label="search" class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200 md:hidden">
                    <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 mx-auto fill-current text-gray-600" viewBox="0 0 35.997 36.004">
                        <path id="Icon_awesome-search" data-name="search" d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z"></path>
                    </svg>
                </button>
                <button aria-label="chat" class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-auto text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </button>
                <button aria-label="notification" class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-auto text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                </button>
            </div>            
        </div>        
    </div>       
    <div>
        <div class="px-10 py-10 bg-gray-50 grid gap-10 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2">
          @foreach($cursos as $c)
            <div class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
              <h3 class="mb-3 text-xl font-bold text-indigo-600">{{$c->nombreCurso}}</h3>
              <div class="relative">
                <img class="w-full rounded-xl" src="{{$c->image}}" alt="Colors" />
                <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">FREE</p>
              </div>
              <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">"{{$c->descripcion}}"</h1>
              <div class="my-4">
                <div class="flex space-x-1 items-center">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </span>
                  <p>1:34:23 Minutes</p>
                </div>                                
                <button class="mt-4 text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">VER</button>
              </div>
            </div>
            @endforeach
            </div>
        </div>
@endsection