@extends('backoffice.layouts.admin')
@section('title','Panel de administracion')
@section('head')
@endsection
@section('header')
<h5 hidden class="text-2xl text-white font-medium lg:block">Bienvenido Administrador</h5>
@endsection
@section('breadcrumbs')

@endsection

@section('content')
    @section('name')
    <img src="https://cdn-icons-png.flaticon.com/512/2082/2082875.png" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
            <h5 class="hidden mt-4 text-xl font-semibold text-white lg:block">
                {{auth()->user()->name}}
            </h5>
        <span class="hidden text-white lg:block">{{auth()->user()->tipo}}</span>
    @endsection
    <main class="h-screen w-full">
<div class="ml-auto lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <div class="sticky z-10 top-0 h-16 border-b lg:py-0">
        <div class="px-2 flex items-center justify-between space-x-4 2xl:container">
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Planes</h5>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="flex space-x-4">
                  <!--/search bar -->
                  <div hidden class="md:block">                    
                    <a href="{{route('Addplan')}}">
                        <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Añadir Plan</button>
                    </a>                                
                </div>  
                <!--search bar -->
            </div>
        </div>
   <!-- component -->
<table class="min-w-full border-collapse block md:table ">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Precio</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Duracion (dias)</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
        @foreach($planes as $p)
			<tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
               
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>{{$p->nombre_Plan}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Precio</span>{{$p->Precio}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Duracion</span>{{$p->duracion}}</td>
				</td>
			</tr>
            @endforeach
		</tbody>
	</table>
    </div>
</div>
</main>
@endsection('content')
@section('foot')
@endsection