@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <span class="card-title fw-semibold me-3">Tabel Synonym Matery</span>
                        </div>
                        <div>
                            <a href="Synonym/create" type="button" class="btn btn-primary"><i class="ti ti-plus me-1"></i>Add
                                Synonym Matery</a>
                        </div>
                    </div>

                    <div>
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

                <div class="table-material">
                    <table id="table_synonym" class="table table-hover table-bordered text-nowrap mb-0 align-middle">

                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0 text-center" style="width: 10px">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Word 1</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Word 2</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Edit</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Delete</h6>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($data as $data_synonym): ?>
                            <tr>
                                <td class="border-bottom-0 text-center">
                                    <h6 class="fw-semibold mb-0"> {{$no++}} </h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="p-1">
                                        <h6 class="fw-semibold mb-1 text-center"> {{$data_synonym['word1']}} </h6>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="p-1">
                                        <h6 class="fw-semibold mb-1 text-center"> {{$data_synonym['word1']}} </h6>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal text-center"><a
                                            href="{{ route('Synonym.edit', ['Synonym' => $data_synonym['id']]) }}"><i
                                                class="ti ti-pencil"></i></a></p>
                                </td>
                                <td class="border-bottom-0 text-center">
                                    <form action="{{ route('Synonym.destroy', ['Synonym' => $data_synonym['id']]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this Data Synonym ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger text-center">
                                            <i class="ti ti-trash "></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
