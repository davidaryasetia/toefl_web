@extends('layouts.main');

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <span class="card-title fw-semibold me-3">Daftar history test</span>
                        </div>
                    </div>

                    <div class="col-lg-3">
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
                    <table id="table_history" class="table-hover table-bordered text-nowrap mb-0 table align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0 text-center" style="width: 10px">
                                    <h6 class="fw-semibold mb-0">Nomor</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Nama</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Skor listening</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Skor structure</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Skor grammar</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Total skor</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Hapus</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $history)
                                <tr>
                                    <td class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">{{ $key + 1 }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1 text-center">{{ $history['users']['name'] }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1 text-center">{{ $history['listening_score'] }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1 text-center">{{ $history['structure_score'] }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1 text-center">{{ $history['reading_score'] }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1 text-center">
                                            {{ $history['reading_score'] + $history['reading_score'] + $history['reading_score'] }}
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <form action="{{ route('HistoryTest.destroy', $history['id']) }}" method="POST"
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus history milik {{ $history['users']['name'] }} ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
