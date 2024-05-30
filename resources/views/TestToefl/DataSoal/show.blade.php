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
                            <a href="{{ url()->previous() }}" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                    style="font-size: 20px; color: black"></i>
                            </a>
                        </div>
                        <div class="me-3">
                            <span class="card-title fw-semibold">Question - {{ $DataSoal[0]['test_packet']['name'] }} :
                                {{ $DataSoal[0]['type']['name'] }} </span>
                        </div>
                        <div class="me-3">
                            <a href="{{ route('DataSoal.edit', ['DataSoal' => $DataSoal[0]['id']]) }}" class="btn btn-primary"><i
                                    class="ti ti-pencil me-1"></i><span>Edit Data</span></a>
                        </div>
                        <div class="me-3">
                            <form action="{{ route('DataSoal.destroy', ['DataSoal' => $DataSoal[0]['id']]) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this data: <?php echo $DataSoal[0]['question']; ?> ?')">
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
                <div class="row">
                    <div class="mb-4 col-lg-12">
                        <label for="paket" class="form-label">Question</label>
                        <div class="" style="border: 0.5px solid black;border-radius: 8px; padding: 10px; ">
                            <span style="color: black">{{ $DataSoal[0]['question'] }}</span>
                        </div>
                    </div>
                </div>
                <?php $answer = 1; ?>
                <?php foreach($DataAnswer as $data_answer): ?>
                <?php $border = $data_answer['is_correct'] === true ? 'border: 0.5px solid green;' : 'border: 0.5px solid red;'; ?>
                <?php $font = $data_answer['is_correct'] === true ? 'color: green;' : 'color: red'; ?>
                <div class="row" style="">
                    <input type="hidden" value="{{ $data_answer['id'] }}" name="answer_id[]">
                    <div class="mb-3 col-lg-9 ">
                        <label for="paket" class="form-label d-block" style="{{ $font }}">Answer
                            {{ $answer++ }}</label>
                        <div class="" style="border-radius: 8px; padding: 10px; {{ $border . $font }}">
                            <span style="">{{ $data_answer['answer'] }}</span>
                        </div>

                    </div>
                    <div class="mb-4 col-lg-3">
                        <label for="paket" class="form-label" style="{{ $font }}">Is Correct</label>
                        <div class="" style="border-radius: 8px; padding: 10px; {{ $border . $font }}">
                            <span style="">{{ $data_answer['is_correct'] === true ? 'true' : 'false' }}</span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <hr style="color: black; font-weight: 500">

                {{-- END Content Here --}}
            </div>
        </div>
    </div>
@endsection
