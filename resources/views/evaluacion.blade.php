@extends('layouts.welcome-ecommerce-template')

@section('content')
<div class="container bg-white max-w-full mx-auto py-28 px-20 pb-0 grid grid-cols-3 gap-4">
    <div class="p-8 bg-gray-900 col-span-1 rounded-lg">
        <ul class="flex flex-col">
            <li class="font-medium text-2XL text-white uppercase mb-4">
                LISTA DE REPRODUCCION
                <a href="#">
                    <button class="mx-9 bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 border border-indigo-700 rounded-md">
                        Siguiente
                    </button>
                </a>
            </li>
            @foreach($clase_curso as $c)
            <a href="{{route('claseR',[$c->id_clase])}}">
                <li class="flex items-center text-white mt-2 hover:text-blue-600">
                    {{$c->Nro_clase}}.- {{$c->Titulo}}
                </li>
            </a>
            @endforeach
            <li class="font-medium text-2XL text-white uppercase mt-10">
                EVALUACIONES            
            </li>
            @foreach($examen_curso as $ec)
            <a href="{{route('claseR',[$ec->id_examen])}}">
                <li class="flex items-center text-white mt-2 hover:text-blue-600">
                    - {{$ec->titulo}}
                </li>
            </a>   
            @endforeach 
        </ul>
    </div>
    <div class="text-gray-700 col-span-2">        
        <h2 style="text-align:center" class="text-4xl font-semibold pt-5 text-indigo-700">{{$examen->titulo}}</h2>
        <hr/>
        <h3 class="text-2xl pt-2 font-semibold text-indigo-700">Descripcion</h3>
        <p class="text-lg text-gray-900">{{$examen->descripcion}}</p>
        @php $c2 = 0 @endphp        
        <form method="POST" action="{{route('revisar', [$examen->id_examen])}}">
            @csrf
            @foreach ($preguntas as $p)
                @if($loop->index == $c2)
                    <h3 class="text-2xl pt-2 font-semibold text-indigo-700">{{++$nro}}.- {{$p->pregunta}}</h3>                     
                    @if ($p->tipo_pregunta == "falso")
                        @php $c2 = $c2 + 2 @endphp   
                        <div class="flex flex-col mt-4 ml-10">
                            <fieldset>                                                      
                                <div class="flex items-center mb-4">
                                    <input id="falso" type="radio" name="respuesta{{$nro}}" value="falso" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">                              
                                    <label for="falso" class="block ml-2 text-sm text-lg text-gray-900">
                                        Falso
                                    </label>
                                </div>
                            
                                <div class="flex items-center mb-4">
                                    <input id="verdadero" type="radio" name="respuesta{{$nro}}" value="verdadero" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="verdadero" class="block ml-2 text-sm text-lg text-gray-900">
                                        Verdadero
                                    </label>
                                </div>                        
                            </fieldset>
                        </div>
                    @endif
                    @if ($p->tipo_pregunta == "opcion")                        
                        @php $c2 = $c2 + 4 @endphp   
                        <div class="flex flex-col mt-4 ml-10">
                            <fieldset>                          
                                <div class="flex items-center mb-2">
                                    <input id="opcion_1" type="radio" name="opciones{{$nro}}" value="{{$preguntas[$c2-4]->inciso}}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="opcion_1" class="block ml-2 text-sm text-lg text-gray-900">
                                        {{$preguntas[$c2-4]->inciso}}
                                    </label>
                                </div>
                                
                                <div class="flex items-center mb-2">
                                    <input id="opcion_2" type="radio" name="opciones{{$nro}}" value="{{$preguntas[$c2-3]->inciso}}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="opcion_2" class="block ml-2 text-sm text-lg text-gray-900">
                                        {{$preguntas[$c2-3]->inciso}}
                                    </label>
                                </div>
                                    
                                <div class="flex items-center mb-2">
                                    <input id="opcion_3" type="radio" name="opciones{{$nro}}" value="{{$preguntas[$c2-2]->inciso}}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="opcion_3" class="block ml-2 text-sm text-lg text-gray-900">
                                        {{$preguntas[$c2-2]->inciso}}
                                    </label>
                                </div>

                                <div class="flex items-center mb-2">
                                    <input id="opcion_4" type="radio" name="opciones{{$nro}}" value="{{$preguntas[$c2-1]->inciso}}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="opcion_4" class="block ml-2 text-sm text-lg text-gray-900">
                                        {{$preguntas[$c2-1]->inciso}}
                                    </label>
                                </div>
                            </fieldset>
                        </div>                        
                    @endif
                    @if ($p->tipo_pregunta == "seleccion")
                        @php $c2 = $c2 + 5 @endphp 
                        <div class="flex flex-col mt-3 ml-10">
                            <fieldset>
                                <div class="flex items-center mb-2">
                                    <input checked id="checkbox-1" type="checkbox" name="seleccion{{$nro}}[]" value="{{$preguntas[$c2-5]->inciso}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                                    <label for="inciso_1" id="inciso_1" name="inciso_1" class="block ml-2 text-sm text-lg text-gray-900">
                                        {{$preguntas[$c2-5]->inciso}}
                                    </label>
                                </div>
                                
                                <div class="flex items-center mb-2">
                                    <input id="checkbox-2" type="checkbox" value="{{$preguntas[$c2-4]->inciso}}" name="seleccion{{$nro}}[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inciso_2" id="inciso_2" name="inciso_2" class="block ml-2 text-sm text-lg text-gray-900">
                                        {{$preguntas[$c2-4]->inciso}}
                                    </label>
                                </div> 
                                    
                                <div class="flex items-center mb-2">
                                    <input id="checkbox-3" type="checkbox" value="{{$preguntas[$c2-3]->inciso}}" name="seleccion{{$nro}}[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inciso_3" id="inciso_3" name="inciso_3" class="block ml-2 text-sm text-lg text-gray-900">
                                        {{$preguntas[$c2-3]->inciso}}
                                    </label>
                                </div> 

                                <div class="flex items-center mb-2">
                                    <input id="checkbox-4" type="checkbox" value="{{$preguntas[$c2-2]->inciso}}" name="seleccion{{$nro}}[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inciso_4" id="inciso_4" name="inciso_4" class="block ml-2 text-sm text-lg text-gray-900">
                                        {{$preguntas[$c2-2]->inciso}}
                                    </label>
                                </div> 

                                <div class="flex items-center mb-2">
                                    <input id="checkbox-5" type="checkbox" value="{{$preguntas[$c2-1]->inciso}}" name="seleccion{{$nro}}[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inciso_5" id="inciso_5" name="inciso_5" class="block ml-2 text-sm text-lg text-gray-900">
                                        {{$preguntas[$c2-1]->inciso}}
                                    </label>
                                </div>                                         
                            </fieldset>
                        </div>                          
                    @endif 
                @endif                                                      
            @endforeach
            <div class="flex flex-col mt-2 ml-100 mr-100 mb-10" style="width: 300px">                            
                <button type="submit"  class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded mr-100">
                    Finalizar
                </button>                                                       
            </div>
        </form>
    </div>
</div>
@endsection