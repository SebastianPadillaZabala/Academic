@extends('backoffice.layouts.admin')
@section('title','Panel de administracion')
@section('head')
@endsection
@section('header')
    <h5 hidden class="text-2xl text-white font-medium lg:block">Bienvenido Administrador</h5>
@endsection
@section('breadcrumbs')
    <li><a href="#" class="text-blue-600 hover:text-blue-700">Permissions</a></li>
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
           <h2> <strong>Nombre del Profesor : </strong>  </h2>

        </div>

        <!-- card body -->
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- content goes here -->
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type
            specimen book.
        </div>

        <!-- card footer -->
        <div class="p-6 bg-white border-gray-200 text-right">
            <!-- button link -->
            <a class="bg-blue-500 shadow-md text-sm text-white font-bold py-3 md:px-8 px-4 hover:bg-blue-400 rounded uppercase"
               href="#">Click Me</a>
        </div>
    </div>
</div>

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
