@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div>
                        <a href="/PaketSoal" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                style="font-size: 20px; color: black"></i>
                        </a>
                    </div>
                    <div>
                        <span class="card-title fw-semibold">Tambah Paket Soal</span>
                    </div>
                </div>

                <form action="{{ route('PaketSoal.update', ['PaketSoal' => $paket['id']]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4 col-lg-6">
                        {{-- <label for="paket" class="form-label">id</label> --}}
                        <input type="hidden" class="form-control" id="paket" name="paket"
                            aria-describedby="emailHelp" value="{{ $paket['id']}}">
                    </div>
                    <div class="mb-4 col-lg-6">
                        <label for="paket" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="paket" name="paket"
                            aria-describedby="emailHelp" value="{{ $paket['name']}}">
                    </div>
                    <button type="Update" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
