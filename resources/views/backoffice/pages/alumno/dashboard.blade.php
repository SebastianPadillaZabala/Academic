@extends('backoffice.layouts.admin')
@section('title','Panel de administracion')
@section('head')
@endsection
@section('header')
<h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Bienvenido Alumno</h5>
@endsection
@section('breadcrumbs')

@endsection

@section('content')
@section('name')
    <img src="https://cdn-icons-png.flaticon.com/512/7340/7340946.png" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
            <h5 class="hidden mt-4 text-xl font-semibold text-white lg:block">
                {{auth()->user()->name}}
            </h5>
        <span class="hidden text-white lg:block">{{auth()->user()->tipo}}</span>
    @endsection
@endsection('content')
@section('foot')
@endsection