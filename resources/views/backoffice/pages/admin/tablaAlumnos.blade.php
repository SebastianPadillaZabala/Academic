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
    <div class="ml-auto lg:w-[75%] xl:w-[80%] 2xl:w-[85%] ">
<div class="sticky z-10 top-0 h-16 border-b lg:py-0">
        <div class="px-2 py-2 flex items-center justify-between space-x-6 2xl:container">
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Alumnos</h5>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
   <!-- component -->
<table class="min-w-full border-collapse block md:table">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Email</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Celular</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Suscripcion</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
        @foreach($alumnos as $a)
			<tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
               
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>{{$a->name}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Email</span>{{$a->email}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Celular</span>{{$a->celular}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Suscripcion</span>{{$a->suscripcion}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
					<span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
					<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
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