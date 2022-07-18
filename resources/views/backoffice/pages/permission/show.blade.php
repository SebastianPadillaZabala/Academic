@extends('backoffice.layouts.admin')
@section('title','Panel de administracion')
@section('head')
@endsection
@section('header')
    <h5 hidden class="text-2xl text-white font-medium lg:block">Bienvenido Administrador</h5>
@endsection
@section('breadcrumbs')
    <li>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{$permission->id}}</a>
        </div>
    </li>
@endsection
@section('dropdown')
    <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="{{route('backoffice.permission.create')}}">Crear Permisos</a></li>
@endsection

@section('content')
@section('name')
    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnN8ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
    <h5 class="hidden mt-4 text-xl font-semibold text-white lg:block">
        {{auth()->user()->name}}
    </h5>
    <span class="hidden text-white lg:block">{{auth()->user()->tipo}}</span>
@endsection
    <div class="flex items-center justify-center h-screen bg-gradient-to-br from-indigo-500 to-indigo-800">
        <div class="bg-white font-semibold text-center rounded-3xl border shadow-lg p-10 max-w-xs">
            <strong>Rol:</strong> <p>{{$permission->name}}</p>
            <p><b>Slug: </b>{{$permission->slug}}</p>
            <p><b>Descripcion: </b> {{$permission->description}}</p>
            <div class="flex mt-4 space-x-3 lg:mt-6">
                <a href="{{route('backoffice.permission.edit',$permission)}}"
                   class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-dark bg-info-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</a>
                <a href="#" onclick="enviar_formulario()"
                   class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">Eliminar</a>
            </div>
        </div>
    </div>
    <form method="post" action="{{route('backoffice.permission.destroy',$permission)}}" name="delete_form">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>
@endsection('content')

@section('foot')
    <script>
        function enviar_formulario(){
            document.delete_form.submit();
        }
    </script>
@endsection
