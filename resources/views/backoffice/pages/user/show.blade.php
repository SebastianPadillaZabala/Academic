@extends('backoffice.layouts.admin')
@section('title','Panel de administracion')
@section('head')
@endsection
@section('header')
    <h5 hidden class="text-2xl text-white font-medium lg:block">Bienvenido Administrador</h5>
@endsection
@section('breadcrumbs')
    <li><a href="{{route('backoffice.user.index')}}" class="text-blue-600 hover:text-blue-700"> / Usuarios del sistema</a></li>
    <li><a href="#" class="text-blue-600 hover:text-blue-700"> / {{auth()->user()->name}}</a></li>
@endsection
@section('dropdown')
    <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="{{route('backoffice.user.assign_role',$user)}}">Asignar Roles</a></li>
    <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="{{route('backoffice.user.assign_permission',$user)}}">Asignar permisos</a></li>
@endsection

@section('content')
@section('name')
    <img src="https://cdn-icons-png.flaticon.com/512/2082/2082875.png" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
    <h5 class="hidden mt-4 text-xl font-semibold text-white lg:block">
        {{auth()->user()->name}}
    </h5>
    <span class="hidden text-white lg:block">{{auth()->user()->tipo}}</span>
@endsection
<!-- light mode -->
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-md">
        <!-- card header -->
        <div class="px-6 py-4 bg-white border-b border-gray-200 font-bold uppercase">
            <h2> <strong>Nombre del Usuario : </strong> {{$user->name}}  </h2>
        </div>

        <!-- card body -->
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- content goes here -->
            <ul>
                <h3> <strong>Celuar : </strong> {{$user->celular}}  </h3>
                <h3> <strong>Tipo : </strong> {{$user->tipo}}  </h3>
                <h3> <strong>Email : </strong> {{$user->email}}  </h3>
            </ul>

        </div>
        <!-- card footer -->
        <div class="p-6 bg-white border-gray-200 text-right">
            <!-- button link -->
            <a class="bg-blue-500 shadow-md text-sm text-white font-bold py-3 md:px-8 px-4 hover:bg-blue-400 rounded uppercase"
               href="{{route('backoffice.user.edit',$user)}}">Editar
            </a>

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
    </tr>
        </thead>
        <tbody class="block md:table-row-group">
        @foreach($roles as $role)
            <p><strong>Permisos para el rol:</strong> {{$role->name}}</p>
            @foreach($role->permissions as $permission)
                        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                {{$permission->name}}
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

                        </tr>
            @endforeach
        @endforeach

        </tbody>
    </table>
    <form method="post" action="" name="delete_form">
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
