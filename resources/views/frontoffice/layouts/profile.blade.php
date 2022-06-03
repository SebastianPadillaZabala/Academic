<!doctype html>
<html lang="es">
    <head>
        <title>Perfil</title>
         @include('frontoffice.layouts.includes.head')
    </head>
    <body  style="background: #edf2f7;">
        <div class=" flex items-center justify-center" >
            <div class="flex-1 flex flex-col ">
                <!-- Start Page Loading -->
                <!-- End Page Loading -->
                <!-- //////////////////////////////////////////////////////////////////////////// -->
                <!-- START HEADER -->
            @include('frontoffice.layouts.includes.header')
            <!-- END HEADER -->
                <!-- //////////////////////////////////////////////////////////////////////////// -->
                <!-- START MAIN -->
                <div id="main ">
                    <!-- START WRAPPER -->
                    <div class="wrapper">
                        <!-- START LEFT SIDEBAR NAV-->

                        <!-- END LEFT SIDEBAR NAV-->
                        <!-- //////////////////////////////////////////////////////////////////////////// -->
                        <!-- START CONTENT -->
                        <section id="content" >
                        <!--start container-->
                            <div class="container p-3">
                                <div class="w-full relative mt-4 shadow-2xl rounded my-24 overflow-hidden">
                                    @include('frontoffice.layouts.includes.cover_page')
                                    <div class="grid grid-cols-12 bg-white ">
                                        @include('frontoffice.layouts.includes.user_nav')
                                        <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end container-->
                        </section>
                        <!-- END CONTENT -->
                        <!-- START RIGHT SIDEBAR NAV-->
                        <!-- END RIGHT SIDEBAR NAV-->
                    </div>
                    <!-- END WRAPPER -->
                </div>
                <!-- END MAIN -->
            </div>
        </div>

    </body>
</html>
