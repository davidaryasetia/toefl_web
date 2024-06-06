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
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <a href="{{url()->previous()}}" class="d-flex alignitems-center"><i
                                    class="ti ti-arrow-left me-3" style="font-size: 20px; color: #5A6A85"></i>
                            </a>
                        </div>
                        <div class="me-3">
                            <span class="card-title fw-semibold">Matery - {{$data[0]['material']['title']}} </span>
                        </div>

                        <div class="me-3">
                            <a href=""
                                class="btn btn-primary"><i class="ti ti-pencil me-1"></i><span>Edit Data</span></a>
                        </div>
                        <div class="me-3">
                            <form action=""
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this data modul:  ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="ti ti-trash me-1"></i><span>Hapus Data</span>
                                </button>
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


                {{-- Content Here --}}
                <hr style="color:black; font-weight: bold">
                <?php $no = 1; ?>

                <div class="row">
                    <div class="mb-3 col-lg-12" style="">
                        <label for="paket" class="form-label d-block" style="">Question {{$no++}}
                        </label>
                        <pre style="border: 0.5px solid #5A6A85;border-radius: 8px; padding: 10px;"> {{$data[0]['question']}} </pre>
                    </div>
                </div>

                <?php $nomer=1;?>
                <?php foreach($data_answer as $dataAnswer): ?>
                {{-- jab --}}
                <?php $border = $dataAnswer['value'] === true ? 'border: 0.5px solid green;' : 'border: 0.5px solid red;'; ?>
                <?php $font = $dataAnswer['value'] === true ? 'color: green;' : 'color: red'; ?>
                <div class="row" style="">
                    <div class="mb-3 col-lg-9">
                        <label for="paket" class="form-label d-block" style="{{ $font }}">Answer {{$nomer++}}
                            <?php $no++; ?>
                        </label>
                        <div class=""
                            style="border-radius: 8px; padding: 10px; border: 0.1px solid #5A6A85; {{ $border . $font }}">
                            <span style="color: #5A6A85"> {{$dataAnswer['answer']}} </span>
                        </div>
                    </div>
                    <div class="mb-3 col-lg-3">
                        <label for="paket" class="form-label d-block" style="{{ $font }}">Value
                        </label>
                        <div class="" style="border-radius: 8px; padding: 10px; {{ $border . $font }}">
                            <span style="color: #5A6A85"> 
                                @if($dataAnswer['value'] === 1)
                                True
                                @else
                                False
                                @endif
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <div class="row">
                    <div class="mb-3 col-lg-12" style="">
                        <label for="paket" class="form-label d-block" style="">Dissussion Question 
                        </label>
                        <pre style="border: 0.5px solid #5A6A85;border-radius: 8px; padding: 10px;"> {{$data[0]['pembahasan']}} </pre>
                    </div>
                </div>
                <hr style="color:black; font-weight: bold">

              




                {{-- END Content Here --}}
            </div>
        </div>
    </div>
@endsection
