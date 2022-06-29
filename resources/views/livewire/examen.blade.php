
<div class="bg-indigo-500 h-screen w-screen">
<div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
    <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
        <div class="flex flex-col w-full md:w-1/2 p-4">
            <div class="flex flex-col flex-1 justify-center mb-8">
                <h1 class="text-4xl text-center font-thin">Pregunta</h1>
                <div class="w-full mt-4">
                    <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('pregunta.registrar') }}">
                       @csrf
                       <div class="flex flex-col mt-2">
                            <input id="pregunta" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="pregunta" value="" placeholder="Pregunta" required autofocus>
                        </div>
                        <div class="flex flex-col mt-2">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Tipo de
                                pregunta</label>
                            <select wire:model='tipo' name='tipo'
                                class="form-select appearance-none h-9 block w-full px-2 py-1 text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option value="falso" selected>Falso o Verdadero</option>
                                <option value="opcion">Opción Múltiple</option>
                                <option value="seleccion">Selección Múltiple</option>
                            </select>                
                            <x-jet-input-error for="tipo" />                            
                        </div>    
                        @if ($tipo == "falso")
                            <div class="flex flex-col mt-4">
                                <fieldset>                                                      
                                    <div class="flex items-center mb-4">
                                        <input id="falso" type="radio" name="respuesta" value="falso" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">                              
                                        <label for="falso" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Falso
                                        </label>
                                    </div>
                                
                                    <div class="flex items-center mb-4">
                                        <input id="verdadero" type="radio" name="respuesta" value="verdadero" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="verdadero" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Verdadero
                                        </label>
                                    </div>                        
                                </fieldset>
                            </div>                                                
                        @endif
                        @if ($tipo == "opcion")
                            <div class="flex flex-col mt-4">
                                <fieldset>                          
                                    <div class="flex items-center mb-2">
                                        <input id="opcion_1" type="radio" name="opciones" value="opcion_1" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                        <input for="opcion_1" name="opcion_1" type="text" class="flex-grow h-8 m-1 px-2 border rounded border-grey-400" name="inciso_1" value="" placeholder="Inciso 1">                              
                                    </div>
                                    
                                    <div class="flex items-center mb-2">
                                        <input id="opcion_2" type="radio" name="opciones" value="opcion_2" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                        <input for="opcion_2" name="opcion_2" type="text" class="flex-grow h-8 m-1 px-2 border rounded border-grey-400" name="inciso_1" value="" placeholder="Inciso 2">
                                    </div>
                                        
                                    <div class="flex items-center mb-2">
                                        <input id="opcion_3" type="radio" name="opciones" value="opcion_3" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                        <input for="opcion_3" name="opcion_3" type="text" class="flex-grow h-8 m-1 px-2 border rounded border-grey-400" name="inciso_1" value="" placeholder="Inciso 2">
                                    </div>

                                    <div class="flex items-center mb-2">
                                        <input id="opcion_4" type="radio" name="opciones" value="opcion_4" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                        <input for="opcion_4" name="opcion_4" type="text" class="flex-grow h-8 m-1 px-2 border rounded border-grey-400" name="inciso_1" value="" placeholder="Inciso 2">
                                    </div>
                                </fieldset>
                            </div>
                        @endif
                        @if($tipo == "seleccion")
                            <div class="flex flex-col mt-3">
                                <fieldset>
                                    <div class="flex items-center mb-2">
                                        <input checked id="checkbox-1" type="checkbox" name="seleccion[]" value="inciso_1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                                        <input for="inciso_1" id="inciso_1" name="inciso_1" type="text" class="flex-grow h-8 m-1 px-2 border rounded border-grey-400" name="inciso_1" value="" placeholder="Inciso 1">
                                    </div>
                                    
                                    <div class="flex items-center mb-2">
                                        <input id="checkbox-2" type="checkbox" value="inciso_2" name="seleccion[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <input for="inciso_2" id="inciso_2" name="inciso_2" type="text" class="flex-grow h-8 m-1 px-2 border rounded border-grey-400" name="inciso_2" value="" placeholder="Inciso 2">
                                    </div> 
                                        
                                    <div class="flex items-center mb-2">
                                        <input id="checkbox-3" type="checkbox" value="inciso_3" name="seleccion[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <input for="inciso_3" id="inciso_3" name="inciso_3" type="text" class="flex-grow h-8 m-1 px-2 border rounded border-grey-400" name="inciso_3" value="" placeholder="Inciso 3">
                                    </div> 

                                    <div class="flex items-center mb-2">
                                        <input id="checkbox-4" type="checkbox" value="inciso_4" name="seleccion[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <input for="inciso_4" id="inciso_4" name="inciso_4" type="text" class="flex-grow h-8 m-1 px-2 border rounded border-grey-400" name="inciso_4" value="" placeholder="Inciso 4">
                                    </div> 

                                    <div class="flex items-center mb-2">
                                        <input id="checkbox-5" type="checkbox" value="inciso_5" name="seleccion[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <input for="inciso_5" id="inciso_5" name="inciso_5" type="text" class="flex-grow h-8 m-1 px-2 border rounded border-grey-400" name="inciso_5" value="" placeholder="Inciso 5">
                                    </div>                                         
                                </fieldset>
                            </div>                                           
                        @endif                     
                        
                        <div class="flex flex-col mt-2">                            
                            <button type="submit"  class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                Aceptar
                            </button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://comaformacion.es/wp-content/uploads/2019/11/list-2389219_1280-1030x1030.png'); background-size: cover; background-position: center center;"></div>
    </div>
</div>
</div>
