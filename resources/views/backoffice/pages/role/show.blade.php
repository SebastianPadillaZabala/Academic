@extends('backoffice.layouts.admin')
@section('title','Panel de administracion')
@section('head')
@endsection
@section('header')
    <h5 hidden class="text-2xl text-white font-medium lg:block">Bienvenido Administrador</h5>
@endsection
@section('breadcrumbs')
    <li><a href="#" class="text-blue-600 hover:text-blue-700">Roles</a></li>
@endsection
@section('dropdown')
    <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="{{route('backoffice.role.create')}}">Crear Roles</a></li>
@endsection

@section('content')
@section('name')
    <img src="https://cdn-icons-png.flaticon.com/512/2082/2082875.png" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
    <h5 class="hidden mt-4 text-xl font-semibold text-white lg:block">
        {{auth()->user()->name}}
    </h5>
    <span class="hidden text-white lg:block">{{auth()->user()->tipo}}</span>
@endsection
<div class="flex items-center justify-center h-screen bg-gradient-to-br from-indigo-500 to-indigo-800">
    <div class="bg-white font-semibold text-center rounded-3xl border shadow-lg p-10 max-w-xs">
        <strong>Rol:</strong> <p>{{$role->name}}</p>
        <p><b>Slug: </b>{{$role->slug}}</p>
        <p><b>Descripcion: </b> {{$role->description}}</p>
        <div class="flex mt-4 space-x-3 lg:mt-6">
            <a href="{{route('backoffice.role.edit',$role)}}"
               class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-dark bg-info-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</a>
            <a href="#" onclick="enviar_formulario()"
               class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">Eliminar</a>
        </div>
    </div>
</div>
<table class="min-w-full max-w-max border-collapse block md:table ">
    <thead class="block md:table-header-group">
    <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">slug</th>
        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Descripcion</th>
        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Rol</th>
        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones</th>
    </tr>
    </thead>
    <tbody class="block md:table-row-group">
    @foreach($permissions as $permission)
        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                <span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><a href="{{route('backoffice.permission.show',$permission)}}">{{$permission->name}}</a>
            </td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                <span class="inline-block w-1/3 md:hidden font-bold">Slug</span>{{$permission->slug}}
            </td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                <span class="inline-block w-1/3 md:hidden font-bold">Descripcion</span>{{$permission->description}}
            </td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                <span class="inline-block w-1/3 md:hidden font-bold">Role</span> <a href="{{route('backoffice.role.show',$permission->role)}}">
                    {{$permission->role->name}}
                </a>
            </td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                    <a href="{{route('backoffice.permission.edit',$permission)}}">Editar</a>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<form method="post" action="{{route('backoffice.role.destroy',$role)}}" name="delete_form">
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
