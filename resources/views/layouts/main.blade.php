<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>TOEFL-PENS</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/short-logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
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
        <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_history').DataTable({
                    responsive: true,
                    columns: [{
                            width: '10px'
                        },
                        null,
                        {
                            width: '36px'
                        },
                        {
                            width: '36px'
                        },
                        {
                            width: '36px'
                        },
                        {
                            width: '36px'
                        },
                        {
                            width: '12px'
                        },
                    ]
                });
                $('#table_paket').DataTable({
                    responsive: true,
                    columns: [{
                            width: '6rem'
                        },
                        null,
                        {
                            width: '12px'
                        },
                        {
                            width: '12px'
                        },
                    ]
                });
            });
        </script>
</body>

</html>
