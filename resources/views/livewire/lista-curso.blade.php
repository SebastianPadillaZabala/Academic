<div>
  <div class="px-10 py-20 bg-white grid gap-10 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2">
    @foreach($cursos as $c)
    <div class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
      <h3 class="mb-3 text-xl font-bold text-indigo-600">"{{$c->nombreCurso}}"</h3>
      <div class="relative">
        {{-- <img class="w-full rounded-xl" src="{{$c->image}}" alt="Colors" /> --}}
        <img class="w-full rounded-xl" src="/storage/{{$c->nombreCurso}}/{{$c->image}}" alt="Colors" />
        {{-- <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">FREE</p> --}}
      </div>
      <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">"{{$c->descripcion}}"</h1>
      <div class="my-4">
        <div class="flex space-x-1 items-center">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </span>
          <p>7:34:23 Minutes</p>
        </div>
        <div class="flex space-x-1 items-center">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </span>
          <p>N° Clases: {{$c->cantidad_clases}}</p>
        </div>
        <div class="flex space-x-1 items-center">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
            </svg>
          </span>
          <p>Profe. {{$c->name}}</p>
        </div>
        <div class="flex space-x-1 items-center">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
            </svg>
          </span>
          <p>N° Alumnos: {{$c->cant_sus}}</p>
        </div>
        @if(auth()->user())
        @if(auth()->user()->tipo =='Alumno')
        @if(!auth()->user()->has_curso($c->id_curso) )
        <form action="{{route('frontoffice.alumno.inscribir_curso')}}" method="post">
          @csrf
          <input type="hidden" name="curso_id" value="{{$c->id_curso}}">
          <input type="hidden" name="alumno_id" value="{{auth()->user()->id_alum()}}">
          <button type="submit" class="mt-4 text-xl w-full text-white bg-indigo-600  py-2 rounded-xl shadow-lg">
            Agregar a mis cursos
          </button>
          @endif
          @endif
        </form>
        <button class="mt-4 text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg"><a href="{{route('clase',[$c->id_curso])}}">Empezar</a></button>
        @endif
      </div>
    </div>
    @endforeach
  </div>

</div>
<script>

</script>