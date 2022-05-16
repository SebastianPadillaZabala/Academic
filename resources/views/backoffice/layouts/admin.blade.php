<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        @include('backoffice.layouts.includes.head')
    </head>
    <body>
        <div class="flex h-screen bg-gray-200">
            @include('backoffice.layouts.includes.leftsidebar')
            <div class="flex-1 flex flex-col mx-auto overflow-y-auto">
                <!-- Start Page Loading -->
                <!-- End Page Loading -->
                <!-- //////////////////////////////////////////////////////////////////////////// -->
                <!-- START HEADER -->
                @include('backoffice.layouts.includes.header')
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
                            @include('backoffice.layouts.includes.breadcrumbs')
                            @include('backoffice.layouts.includes.dropdown')
                            <!--start container-->
                                <div class="container p-3">
                                    @yield('content')
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
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START FOOTER -->
        @include('backoffice.layouts.includes.footer')
        <!-- END FOOTER -->
        <!-- ================================================
        Scripts
        ================================================ -->
        <!-- jQuery Library -->
        @include('backoffice.layouts.includes.foot')
    </body>
</html>
