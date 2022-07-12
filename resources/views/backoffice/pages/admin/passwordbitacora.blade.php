@extends('layouts.ecommerce-template')
@section('content')
<!-- component -->
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-900">
	<div class="bg-indigo-600 w-full sm:w-3/4 max-w-lg p-12 pb-6 shadow-2xl rounded">
		<div class="text-white pb-4 text-center text-3xl font-semibold">Insertar Clave de Desarrollador</div>
        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('bitacora.logBitacora') }}">
         @csrf
		<input
			class="block text-gray-700 p-1 m-4 ml-0 w-full rounded text-lg font-normal placeholder-gray-300"
			name="password"
            id="password"
			type="password"
			placeholder="Password"
		/>
		<button type="submit"
			class="inline-block mt-2 bg-gray-900 hover:bg-indigo-500 focus:bg-indigo-800 px-6 py-2 rounded text-white shadow-lg"
		>
			Acceder
		</button>
        </form>
	</div>
</div>
@endsection
