@extends('backoffice.layouts.admin')
@section('title','Panel de administracion')
@section('head')
@endsection
@section('header')
<h5 hidden class="text-2xl text-white font-medium lg:block">Bienvenido Administrador</h5>
@endsection
@section('breadcrumbs')

@endsection

@section('content')
@section('name')
<img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnN8ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
<h5 class="hidden mt-0 text-xl font-semibold text-white lg:block">
    {{auth()->user()->name}}
</h5>
<span class="hidden text-white lg:block">{{auth()->user()->tipo}}</span>
@endsection
<div class="container max-w-full mx-auto px-10 pb-0 grid grid-cols-3 gap-4">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js">
    </script>
    <div class="max-w-lg mx-auto px-10 col-span-1 gap-4  bg-white rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
        <h1 class="text-center text-2xl font-semibold">Categorias</h1>  
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <div class="max-w-md mx-auto px-10 col-span-2 gap-4 bg-white rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
        <h1 class="text-center text-2xl font-semibold">Cursos</h1>
        <p class="text-center">Los 2 cursos con mayor demanda</p>
        <canvas id="myChart3" width="400" height="400"></canvas>
    </div>
    <div class="max-w-lg mx-auto px-10 col-span-1 gap-4  bg-white rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
        <h1 class="text-center text-2xl font-semibold">Planes</h1>
        <canvas id="myChart2" width="400" height="400"></canvas>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    var categorias = [];
    var cant_cursos = [];
    var planes = [];
    var cant_sus = [];
    var cursos = [];
    var nalumnos = [];
    $(document).ready(function() {
        $.ajax({
            url: '/categoria/ajax',
            method: 'POST',
            data: {
                id: 1,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res) {
            var arreglo = JSON.parse(res);
            for (var x = 0; x < arreglo.length; x++) {
                cant_cursos.push(arreglo[x].cursos);
                categorias.push(arreglo[x].nombreCategoria);
            }
            generarGrafica();
        });
    });

    function generarGrafica() {
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categorias,
                datasets: [{
                    label: 'Cantidad de Cursos Por Categoria',
                    data: cant_cursos,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    ////Grafica Planes
    $(document).ready(function() {
        $.ajax({
            url: '/suscripciones/ajax',
            method: 'POST',
            data: {
                id: 1,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res) {
            var arreglo = JSON.parse(res);
            for (var x = 0; x < arreglo.length; x++) {
                planes.push(arreglo[x].nombreplan);
                cant_sus.push(arreglo[x].cantidad);
            }
            generarGrafica2();
        });
    });

    function generarGrafica2() {
        const ctx = document.getElementById('myChart2').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: planes,
                datasets: [{
                    label: 'Cantidad de Suscripciones por el Tipo de Plan',
                    data: cant_sus,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    ///Grafica Cursos
    $(document).ready(function() {
        $.ajax({
            url: '/cursos/ajax',
            method: 'POST',
            data: {
                id: 1,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res) {
            var arreglo = JSON.parse(res);
            for (var x = 0; x < arreglo.length; x++) {
                cursos.push(arreglo[x].nombreCurso);
                nalumnos.push(arreglo[x].cant_sus);
            }
            generarGrafica3();
        });
    });

    function generarGrafica3() {
        const ctx = document.getElementById('myChart3').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: cursos,
                datasets: [{
                    label: 'Los 3 cursos con menos alumnos',
                    data: nalumnos,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },
        });
    }
</script>
@endsection('content')
@section('foot')
@endsection
