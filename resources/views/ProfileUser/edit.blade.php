@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div>
                        <a href="/Profile" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                style="font-size: 20px; color: black"></i>
                        </a>
                    </div>
                    <div>
                        <span class="card-title fw-semibold">Edit Profile</span>
                    </div>
                </div>

                {{-- Body --}}

                <section class="section profile">
                    <div class="row">
                        <div class="col-xl-4">

                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                    <div></div>
                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="Profile" width="86"
                                        class="rounded-circle mb-3">
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-8">

                            <div class="card">
                                <div class="card-body pt-3">
                                    <!-- Bordered Tabs -->
                                    <ul class="nav nav-tabs nav-tabs-bordered">
                                        <li class="nav-item">
                                            <button class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#profile-overview">Edit Profile</button>
                                        </li>
                                    </ul>


                                    <form action="{{ route('Profile.update', ['Profile' => $datauser['id']]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row mb-3 pt-4">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $datauser['name'] }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" name="email"
                                                    value="{{ $datauser['email'] }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Admin</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="admin" name="admin"
                                                    value="@if ($datauser['is_admin']) Ya
                                                             @else
                                                             Tidak @endif"
                                                    disabled />
                                            </div>
                                        </div>
                                        <button type="Update" class="btn btn-primary">Update</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
