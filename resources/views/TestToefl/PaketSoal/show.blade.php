@extends('layouts.main')

@section('row')
    @php
        $dataPaket = app('dataPaket');
        $dataTipe = app('dataTipe');
    @endphp
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="/PaketSoal" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                    style="font-size: 20px; color: black"></i>
                            </a>
                        </div>
                        <div class="me-2">
                            <span class="card-title fw-semibold me-3">List Question Packet : </span>
                        </div>
                        <div class="me-3">
                            <a href="DataSoal/create" type="button" class="btn btn-primary"><i class="ti ti-plus"></i> Add
                                Question</a>
                        </div>

                        <div class="d-flex justify-content-start">
                            <form action="" method="GET">
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        {{-- <label for="paket" class="form-label">Type Question</label> --}}
                                        <div class="">
                                            <select id="defaultSelect" id="type_id" name="type_id" class="form-select">
                                                <option value="">Filter Type</option>
                                                <option value="">Select All</option>
                                                @foreach ($dataTipe['dataTipe'] as $type)
                                                    <option value="{{ $type['id'] }}"
                                                        {{ request()->type_id == $type['id'] ? 'selected' : '' }}>
                                                        {{ $type['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-outline-info">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col-lg-4">
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

                    <script>
                        setTimeout(function() {
                            document.querySelectorAll('.alert').forEach(function(alert) {
                                alert.style.display = "none";
                            });
                        }, 5000);
                    </script>
                </div>


                <div class="table-responsive">
                    <table id="table_show_question" class="table table-hover table-bordered text-nowrap mb-0 align-middle">

                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0 text-center" style="width: 10px">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-left">Question</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Type Question</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Show</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Edit</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Delete</h6>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; ?>
                            <?php foreach($data as $question): ?>
                            <tr>
                                <td class="border-bottom-0 text-center" style="width: 12px">
                                    <h6 class="fw-semibold mb-0"> {{$number++}} </h6>
                                </td>
                                <td class=""
                                    style="width: 100%; white-space: pre-line; word-wrap: break-word; text-align: justify; color: black">
                                    <span class="d-flex align-items-center"
                                        style="text-align: justify"> {{$question['question']}} </span>
                                </td>
                                <td class="border-bottom-0" style="width: 12px">
                                    <h6 class="fw-semibold mb-1 text-center">{{$question['type']['name']}} </h6>
                                </td>
                                <td class="border-bottom-0" style="width: 12px">
                                    <h6 class="fw-semibold mb-1 text-center"></h6>
                                </td>

                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal text-center"><a
                                            href=""><i
                                                class="ti ti-pencil"></i></a></p>
                                </td>
                                <td class="border-bottom-0">
                                    <form action=""
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this data: ">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
