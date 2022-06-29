<!DOCTYPE html>
    <html lang="es">
    <head>
        @include('frontoffice.layouts.includes.head')
    </head>
    <body class="" style="background: #edf2f7;">
    <div class="bg-gray-100">
        @include('frontoffice.layouts.includes.header')
        <!-- End of Navbar -->
        <div class="container mx-auto  p-5">
            <div class="md:flex no-wrap md:-mx-2 mt-12 p-8 ">
                <!-- Left Side -->
                @include('frontoffice.layouts.includes.left_sidebar')
                <!-- Right Side -->
                @yield('content')
            </div>
        </div>
    </div>
    @include('frontoffice.layouts.includes.foot')
    </body>
</html>
