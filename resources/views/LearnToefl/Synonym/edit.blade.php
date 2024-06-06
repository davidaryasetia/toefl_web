@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div>
                        <a href="/Synonym" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                style="font-size: 20px; color: black"></i>
                        </a>
                    </div>
                    <div>
                        <span class="card-title fw-semibold">Tambah Synonym Matery</span>
                    </div>
                </div>

                <form action="{{ route('Synonym.update', ['Synonym' => $data_synonym['id']]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="mb-4 col-lg-6">
                            <label for="paket" class="form-label">Word 1</label>
                            <input type="text" class="form-control" id="synonym" name="word1"
                                aria-describedby="emailHelp" placeholder="Masukkan Word 1....." value="{{$data_synonym['word1']}}">
                        </div>
                        <div class="mb-4 col-lg-6">
                            <label for="paket" class="form-label">Word 2</label>
                            <input type="text" class="form-control" id="paket" name="word2"
                                aria-describedby="emailHelp" placeholder="Masukkan Word 2....." value="{{$data_synonym['word2']}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
