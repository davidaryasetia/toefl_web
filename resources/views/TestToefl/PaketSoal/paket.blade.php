@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <span class="card-title fw-semibold me-3">Daftar Paket Soal</span>
                        </div>
                        <div>
                            <a href="PaketSoal/create" type="button" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah
                                Paket</a>
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

                <div class="table-responsive">
                    <table id="table_paket" class="table table-hover table-bordered text-nowrap mb-0 align-middle">

                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0 text-center" style="width: 10px">
                                    <h6 class="fw-semibold mb-0">Nomor</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Paket Soal</h6>
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
                            <?php foreach($data as $paket): ?>
                            <tr>
                                <td class="border-bottom-0 text-center">
                                    <h6 class="fw-semibold mb-0"><?php echo $paket['id']; ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="p-3">
                                        <h6 class="fw-semibold mb-1 text-center"><?php echo $paket['name']; ?></h6>
                                        <ul>
                                            <li style="list-style: disc">Listening</li>
                                            <li style="list-style: disc">Structure</li>
                                            <li style="list-style: disc">Reading</li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal text-center"><a
                                            href="{{ route('PaketSoal.edit', ['PaketSoal' => $paket['id']]) }}"><i
                                                class="ti ti-pencil"></i></a></p>
                                </td>
                                <td class="border-bottom-0">
                                    <form action="{{ route('PaketSoal.destroy', ['PaketSoal' => $paket['id']]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data <?php echo $paket['name']; ?> ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger">
                                            <i class="ti ti-trash"></i>
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
