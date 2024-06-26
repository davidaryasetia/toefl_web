<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>TOEFL-PENS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/short-logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    @php
        use Carbon\Carbon;
    @endphp


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
            // T=======================  Table Test Toefl ===============================================
            $('#table_dashboard').DataTable({
                responsive: true,
                columns: [{
                        width: '6px'
                    },
                    null,
                    {
                        width: '12px'
                    },
                    {
                        width: '12px'
                    },
                    {
                        width: '12px'
                    },
                    {
                        width: '12px'
                    },

                    {
                        width: '24px'
                    },
                ]
            });
            $('#table_paket').DataTable({
                responsive: true,
                columns: [{
                        width: '6px'
                    },
                    null,
                    {
                        width: '12px'
                    },
                    {
                        width: '12px'
                    },
                    {
                        width: '12px'
                    },
                    {
                        width: '12px'
                    },
                ]
            });
            $('#table_synonym').DataTable({
                responsive: true,
                "scrollY": "500px",
                "pageLength": 10, // Set initial page length to 5
                "lengthMenu": [
                    [10, 15, 20],
                    [10, 15, 20]
                ],
                columns: [{
                        width: '6px'
                    },
                    {
                        width: '30px'
                    },
                    {
                        width: '30px'
                    },
                    {
                        width: '8px'
                    },
                    {
                        width: '8px'
                    },
                ]
            });
            $('#table_master').DataTable({
                responsive: true,
                "scrollY": "500px",
                "pageLength": 10, // Set initial page length to 5
                "lengthMenu": [
                    [10, 15, 20],
                    [10, 15, 20]
                ],
                autoWidth: false,
            });
            $(document).ready(function() {
                $('#table_history').DataTable({
                    responsive: true,
                    "scrollY": "500px",
                    "pageLength": 10, // Set initial page length to 5
                    "lengthMenu": [
                        [10, 15, 20],
                        [10, 15, 20]
                    ],
                    columns: [{
                            width: '6px'
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
                        {
                            width: '24px'
                        },
                    ]
                });
                $('#table_show_questions').DataTable({
                    responsive: true,
                    "scrollY": "500px",
                    "pageLength": 10, // Set initial page length to 5
                    "lengthMenu": [
                        [10, 15, 20],
                        [10, 15, 20]
                    ],
                    autoWidth: false,
                });

                // ===================== Table Learn Toefl ===================================
                $('#table_material').DataTable({
                    responsive: true,
                    "scrollY": "500px",
                    "pageLength": 10, // Set initial page length to 5
                    "lengthMenu": [
                        [10, 15, 20],
                        [10, 15, 20]
                    ],
                    columns: [{
                            width: '6px'
                        },
                        {
                            width: '32px'
                        },
                        {
                            width: '32px'
                        },
                        {
                            width: '32px'
                        },
                        {
                            width: '12px'
                        },
                        {
                            width: '12px'
                        },
                        {
                            width: '10px'
                        },
                    ]
                });

                // ===================== Tabel User ==========================================
                $('#table_user').DataTable({
                    responsive: true,
                    "scrollY": "500px",
                    "pageLength": 10, // Set initial page length to 5
                    "lengthMenu": [
                        [10, 15, 20],
                        [10, 15, 20]
                    ],
                    columns: [{
                            width: '6px'
                        },
                        null,
                        {
                            width: '128px'
                        },

                        {
                            width: '12px'
                        },
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
