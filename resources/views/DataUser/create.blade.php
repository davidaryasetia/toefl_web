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
                        <span class="card-title fw-semibold">Add Data Admin</span>
                    </div>
                    <button type="button" class="btn rounded-pill btn-outline-primary" id="addQuestion">Add Row</button>
                </div>

                <form action="{{ route('DataSoal.store') }}" method="POST">
                    @csrf

                    <div class="question-fields">
                        <div class="question-template">
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                                        placeholder="Input Name......" />
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                        placeholder="Input Email......" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp"
                                        placeholder="Input Name......" />
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp"
                                        placeholder="Input Name......" />
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
