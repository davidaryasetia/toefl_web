{{-- Ambil data sesi paket --}}
@php
    $dataPaket = app('dataPaket');
    $dataTipe = app('dataTipe');
@endphp

{{-- testing --}}
{{-- @dd($dataTipe) --}}

@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div>
                        <a href="/DataSoal" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                style="font-size: 20px; color: black"></i>
                        </a>
                    </div>
                    <div>
                        <span class="card-title fw-semibold">Edit Question</span>
                    </div>
                </div>

                <form action="{{ route('DataSoal.update', ['DataSoal' => $DataSoal['id']]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="mb-4 col-lg-12">
                            <label for="paket" class="form-label">Input Question</label>
                            <textarea type="text" class="form-control" id="question" name="question" aria-describedby="emailHelp" rows="5"
                                placeholder="Input Question.....">{{ $DataSoal['question'] }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-lg-6">
                            <label for="paket" class="form-label">Packet Question</label>
                            <div class="">
                                <select id="packet_id" name="packet_id" class="form-select">
                                    <option>Choice Packet Question</option>
                                    @foreach ($dataPaket['data'] as $item)
                                        <option value="{{ $item['id'] }}"
                                            {{ $item['id'] == $DataSoal['packet_id'] ? 'selected' : '' }}>
                                            {{ $item['name'] }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="mb-4 col-lg-6">
                            <label for="paket" class="form-label">Type Question</label>
                            <div class="">
                                <select id="defaultSelect" id="type_id" name="type_id" class="form-select">
                                    <option>Type Question</option>
                                    @foreach ($dataTipe['dataTipe'] as $type)
                                        <option value="{{ $type['id'] }}"
                                            {{ $type['id'] == $DataSoal['type_id'] ? 'selected' : '' }}>
                                            {{ $type['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr style="color: black; font-weight: 500">

                    <?php $answer = 1; ?>
                    <?php foreach($DataAnswer as $data_answer): ?>
                    <div class="row">
                        <input type="hidden" value="{{$data_answer['id']}}" name="answer_id[]">
                        <div class="mb-4 col-lg-9">
                            <label for="paket" class="form-label">Answer {{ $answer++ }}</label>
                            <input type="text" class="form-control" id="answer[]" name="answer[]"
                                aria-describedby="emailHelp" placeholder="Input Answer 1....."
                                value="{{ $data_answer['answer'] }}" />
                        </div>
                        <div class="mb-4 col-lg-3">
                            <label for="paket" class="form-label">Is Correct</label>
                            <div class="">
                                <select id="defaultSelect" id="correct[]" name="correct[]" class="form-select">
                                    <option>Type Correct</option>
                                    <option value="true" {{$data_answer['is_correct'] === true ? 'selected' : ''}}>True</option>
                                    <option value="false" {{$data_answer['is_correct'] === false ? 'selected' : ''}}>False</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <hr style="color: black; font-weight: 500">

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
