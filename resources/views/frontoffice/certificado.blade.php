<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/storage/css/style.css" />
</head>
<body onload="window.print()">
    <table border="0" cellpadding="0" cellspacing="0">
        <tr class="">
            <td>
                <img src="/storage/certificado.jpg"/>
                <table class="tablas" width="1488px" border="0" cellpadding="0" cellspacing="0">
                    <tr class="estudiante" width="100%" height="110px">
                        <td class="texto-alumno">
                            {{$nombre_alumno}} {{$apellido_alumno}}
                        </td>
                    </tr>
                    <tr class="curso">
                        <td class="texto-curso">
                            {{$nombre_curso}}
                        </td>
                    </tr>
                    <tr width="100%">
                        <table class="firmas">
                            <tr class="texto-firma">
                                <td class="responsable" widht="50%">
                                    Sebastian Padilla
                                </td>                                    
                                <td class="profesor" widht="50%">
                                    {{$nombre_profesor}} {{$apellido_profesor}}
                                </td>
                            </tr>                
                        </table>            
                    </tr>
                </table>
            </td>            
        </tr>        
    </table>    
</body>
</html>