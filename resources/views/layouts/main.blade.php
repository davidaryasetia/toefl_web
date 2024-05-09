<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css')}}" />
</head>

<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->
        @include('partials.sidebar')
        <!-- Sidebar End -->

        <!-- Main Wrapper -->
        <div class="body-wrapper">

            <!-- Header Start -->
            @include('partials.navbar')
            <!-- Header End -->

            <div id="main" class="container-fluid">
                @yield('row')
            </main>

        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{ asset('assets/js/dashboard.js')}}"></script>
</body>

</html>