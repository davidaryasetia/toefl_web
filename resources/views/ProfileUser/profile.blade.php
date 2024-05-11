@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <span class="card-title fw-semibold me-3">Profile User</span>
                        </div>
                        <div>
                            <a href="{{ route('Profile.edit', ['Profile' => $dataUser[0]['id']])}}" class=""><i class="ti ti-pencil me-1"></i><span>Edit</span>
                            </a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-primary" style role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" style role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                {{-- Body --}}

                <section class="section profile">
                    <div class="row">
                        <div class="col-xl-4">

                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                    <div></div>
                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="Profile" width="64"
                                        class="rounded-circle mb-3">
                                    <h4>{{ $dataUser[0]['name'] }}</h4>
                                    <h5>
                                        @if ($dataUser[0]['is_admin'])
                                            Admin
                                        @else
                                            Bukan
                                        @endif
                                    </h5>

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
                                                data-bs-target="#profile-overview">Profile Details</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-3">

                                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                            <div class="row mb-2">
                                                <div class="col-lg-3 col-md-4 label ">Name</div>
                                                <div class="col-lg-9 col-md-8">{{ $dataUser[0]['name'] }}</div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-lg-3 col-md-4 label ">Email</div>
                                                <div class="col-lg-9 col-md-8">{{ $dataUser[0]['email'] }}</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-3 col-md-4 label">Status Admin</div>
                                                <div class="col-lg-9 col-md-8">
                                                    @if ($dataUser[0]['is_admin'])
                                                        Ya
                                                    @else
                                                        Tidak
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div><!-- End Bordered Tabs -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
