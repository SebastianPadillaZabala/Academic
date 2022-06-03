<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla de {{$datos['modelo']}}</title>
</head>
<body>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h5 style="text-align: center">Tabla de {{$datos['modelo']}}</h5>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead>
                <tr>
                    @foreach ($datos['atributos'] as $atributo)
                    <th scope="col" class="px-6 py-3">
                        {{$atributo}}
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody> 
            @foreach ($query as $key => $tupla)               
                <tr>
                    
                        @foreach ($datos['atributos'] as $atributo)
                            <td class="px-6 py-4">
                                {{$tupla->$atributo}}
                            </td>                            
                        @endforeach
                                      
                </tr> 
                @endforeach                 
            </tbody>
        </table>
    </div>
</body>
</html>