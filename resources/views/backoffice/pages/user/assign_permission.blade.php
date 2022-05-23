@extends('backoffice.layouts.admin')
@section('title','Panel de administracion')
@section('head')
@endsection
@section('header')
    <h5 hidden class="text-2xl text-white font-medium lg:block">Bienvenido Administrador</h5>
@endsection
@section('breadcrumbs')
    <li><a href="#" class="text-blue-600 hover:text-blue-700"> / Roles /Crear rol</a></li>
@endsection
@section('dropdown')

@endsection
@section('content')
@section('name')
    <img src="https://cdn-icons-png.flaticon.com/512/2082/2082875.png" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
    <h5 class="hidden mt-4 text-xl font-semibold text-white lg:block">
        {{auth()->user()->name}}
    </h5>
    <span class="hidden text-white lg:block">{{auth()->user()->tipo}}</span>
@endsection
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-md">
        <!-- card header -->
        <div class="px-6 py-4 bg-white border-b border-gray-200 font-bold uppercase">
            <h2> <strong>Selecciona los permisos que desea asignar </strong> </h2>
        </div>

        <!-- card body -->
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- content goes here -->
            <form class="col s12 m8 offset-m2" method="post" action="{{route('backoffice.user.permission_assignment',$user)}}">
                {{csrf_field()}}

                {{--aqui se muestra permisos--}}
                @foreach($roles as $role)
                    <p>{{$role->name}}</p>
                    @foreach($role->permissions as $permission)
                        <p>
                            <input type="checkbox" id="{{$permission->id}}" name="permissions[]" value="{{$permission->id}}"
                                   @if($user->has_permission($permission->id)) checked @endif >
                            <label for="{{$permission->id}}">
                                <span>{{$permission->name}}</span>
                            </label>
                        </p>
                    @endforeach
                @endforeach
                <div class="row">
                    <div class="input-field col s12">

                    </div>
                </div>
                <div class="p-6 bg-white border-gray-200 text-right">
                    <!-- button link -->
                    <button class="bg-blue-500 shadow-md text-sm text-white font-bold py-3 md:px-8 px-4 hover:bg-blue-400 rounded uppercase" type="submit" >Guardar
                    </button>
                </div>
            </form>

        </div>

        <!-- card footer -->

    </div>
</div>
@endsection('content')
@section('foot')
@endsection
