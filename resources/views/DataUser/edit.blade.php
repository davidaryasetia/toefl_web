@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div>
                        <a href="/DataUser" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                style="font-size: 20px; color: black"></i>
                        </a>
                    </div>
                    <div class="me-2">
                        <span class="card-title fw-semibold">Edit Data Admin</span>
                    </div>
                </div>

                <form id="DataUserForm" action="{{route('DataUser.update', ['DataUser'=>$datauser[0]['id']])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="question-fields">
                        <div class="question-template">
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="emailHelp" placeholder="Input Name......" value="{{$datauser[0]['name']}}" required />
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        aria-describedby="emailHelp" placeholder="Input Email......" value="{{$datauser[0]['email']}}" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        aria-describedby="emailHelp" placeholder="Input New Password......" cq required />
                                    <span id="password_error" style="color: red; display: none">Password do not
                                        match.</span>
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" aria-describedby="emailHelp"
                                        placeholder="Input Confirm New Password......" required />
                                </div>

                            </div>

                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update Admin</button>
                    </div>
                </form>
                <script>
                    function validatePasswords() {
                        var password = document.getElementById('password').value;
                        var confirmPassword = document.getElementById('confirm_password').value;
                        var passwordError = document.getElementById('password_error');

                        if (password !== confirmPassword) {
                            passwordError.style.display = 'block';
                            document.getElementById('password').style.borderColor = 'red';
                            document.getElementById('confirm_password').style.borderColor = 'red';
                        } else {
                            passwordError.style.display = 'none';
                            document.getElementById('password').style.borderColor = '';
                            document.getElementById('confirm_password').style.borderColor = '';
                        }
                    }

                    document.getElementById('DataUserForm').addEventListener('submit', function(event) {
                        var password = document.getElementById('password').value;
                        var confirmPassword = document.getElementById('confirm_password').value;
                        var passwordError = document.getElementById('password_error');

                        if (password !== confirmPassword) {
                            passwordError.style.display = 'block';
                            document.getElementById('password').style.borderColor = 'red';
                            document.getElementById('confirm_password').style.borderColor = 'red';
                            event.preventDefault();
                        } else {
                            passwordError.style.display = 'none';
                            document.getElementById('password').style.borderColor = '';
                            document.getElementById('confirm_password').style.borderColor = '';
                        }
                    });

                    document.getElementById('password').addEventListener('input', validatePasswords);
                    document.getElementById('confirm_password').addEventListener('input', validatePasswords);
                </script>
            </div>
        </div>
    </div>
@endsection
