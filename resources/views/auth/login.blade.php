<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Login - Toefl</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/short-logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
    {{-- alert --}}
    @if (session('error'))
        <script>
            alert("{{ session('error') }}")
        </script>
    @endif
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('assets/images/logos/long-logo.png') }}" width="180"
                                        alt="">
                                </a>
                                <p class="text-center">Hello Welcome To The Toefl - PENS</p>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            aria-describedby="emailHelp" placeholder="Masukkan Email....." required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="Password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukkan Password.....">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
