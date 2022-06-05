@extends('frontoffice.layouts.profile')
@section('profile_data')
    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="h-24 w-24 object-cover rounded-full">
    <h1 class="text-2xl font-semibold">Antonia Howell</h1>
    <h4 class="text-sm font-semibold">Joined Since '19</h4>
@endsection
@section('user_nav')

@endsection
@section('content')
    <div class="px-4 pt-4">
        <form action="#" class="flex flex-col space-y-8">
            <div>
                <h3 class="text-2xl font-semibold">Informacion basica</h3>
                <hr>
            </div>
            <div class="form-item">
                <label class="text-xl ">Nombre completo</label>
                <input type="text" value="" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
            </div>
            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                <div class="form-item w-full">
                    <label class="text-xl ">Username</label>
                    <input type="text" value="antonia" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                </div>
                <div class="form-item w-full">
                    <label class="text-xl ">Email</label>
                    <input type="text" value="antoniaph@gmail.com" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                </div>
            </div>
            <div>
                <h3 class="text-2xl font-semibold ">Mis cursos</h3>
                <hr>
            </div>
            <div class="form-item w-full">
                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
                </div>
            </div>
            <div>
                <h3 class="text-2xl font-semibold">Mis redes sociales</h3>
                <hr>
            </div>
            <div class="form-item">
                <label class="text-xl ">Instagram</label>
                <input type="text" value="https://instagram.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
            </div>
            <div class="form-item">
                <label class="text-xl ">Facebook</label>
                <input type="text" value="https://facebook.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
            </div>
            <div class="form-item">
                <label class="text-xl ">Twitter</label>
                <input type="text" value="https://twitter.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " disabled>
            </div>
        </form>
    </div>
@endsection
