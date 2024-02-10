<!doctype html>
<html data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title', 'Page Title') | Pasca Sarjana UNSIQ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Multipurpose Admin & Dashboard Template" />
    <meta name="author" content="Themesbrand" />
    <!-- App favicon -->
    <link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon">
    @include('layouts._styles')

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts._topbar')
        <!-- ========== App Menu ========== -->
        @include('layouts._sidebar')
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">@yield('title', 'Page Title')</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layouts._footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button class="btn btn-danger btn-icon" id="back-to-top" onclick="topFunction()">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
    @include('layouts._scripts')
</body>

</html>
